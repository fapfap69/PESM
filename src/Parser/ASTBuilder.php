<?php

namespace PESM\Parser;

class ASTBuilder
{
    public function build(array $parseTree): array
    {
        if (!isset($parseTree['_matchrule'])) {
            throw new \RuntimeException("Invalid parse tree: missing _matchrule");
        }

        $rule = $parseTree['_matchrule'];
        $method = 'build' . $rule;

        if (method_exists($this, $method)) {
            return $this->$method($parseTree);
        }

        return $parseTree;
    }

    protected function buildProgram(array $node): array
    {
        $statements = $this->extractMultiple($node, 'stmt');
        return [
            '_matchrule' => 'ProgramNode',
            'statements' => array_map([$this, 'build'], $statements)
        ];
    }

    protected function buildStatement(array $node): array
    {
        return isset($node['alt']) ? $this->build($node['alt']) : $node;
    }

    protected function buildAssignment(array $node): array
    {
        $var = $this->build($node['var']);
        $target = (isset($var['_matchrule']) && $var['_matchrule'] === 'VariableNode') ? $var['name'] : $var;
        
        return [
            '_matchrule' => 'AssignmentNode',
            'target' => $target,
            'expression' => $this->build($node['expr'])
        ];
    }

    protected function buildIfStatement(array $node): array
    {
        $thenBody = [];
        $elseBody = [];

        // Extract then body
        if (isset($node['then'])) {
            if (is_array($node['then'])) {
                // Could be a single Statement or array of Statements
                if (isset($node['then']['_matchrule'])) {
                    // Single statement
                    $thenBody = [$this->build($node['then'])];
                } else {
                    // Array of statements
                    $thenBody = array_map([$this, 'build'], $node['then']);
                }
            }
        } elseif (isset($node['stmt'])) {
            $thenBody = [$this->build($node['stmt'])];
        }

        // Extract else body
        if (isset($node['else'])) {
            if (is_array($node['else'])) {
                if (isset($node['else']['_matchrule'])) {
                    $elseBody = [$this->build($node['else'])];
                } else {
                    $elseBody = array_map([$this, 'build'], $node['else']);
                }
            }
        }

        return [
            '_matchrule' => 'IfNode',
            'condition' => $this->build($node['cond']),
            'thenBody' => $thenBody,
            'elseBody' => $elseBody
        ];
    }

    protected function buildWhileStatement(array $node): array
    {
        return [
            '_matchrule' => 'WhileNode',
            'condition' => $this->build($node['cond']),
            'body' => $this->extractMultipleBuilt($node, 'body')
        ];
    }

    protected function buildDoWhileStatement(array $node): array
    {
        return [
            '_matchrule' => 'DoWhileNode',
            'condition' => $this->build($node['cond']),
            'body' => $this->extractMultipleBuilt($node, 'body')
        ];
    }

    protected function buildRepeatUntilStatement(array $node): array
    {
        return [
            '_matchrule' => 'RepeatUntilNode',
            'condition' => $this->build($node['cond']),
            'body' => $this->extractMultipleBuilt($node, 'body')
        ];
    }

    protected function buildForeachInStmt(array $node): array
    {
        return [
            '_matchrule' => 'ForeachNode',
            'variable' => $node['var']['text'],
            'iterable' => $this->build($node['iter']),
            'body' => $this->extractMultipleBuilt($node, 'body')
        ];
    }

    protected function buildForeachRangeStmt(array $node): array
    {
        // Create RangeNode as iterable
        $iterable = [
            '_matchrule' => 'RangeNode',
            'start' => $this->build($node['from']),
            'end' => $this->build($node['to'])
        ];
        
        return [
            '_matchrule' => 'ForeachNode',
            'variable' => $node['var']['text'],
            'iterable' => $iterable,
            'body' => $this->extractMultipleBuilt($node, 'body')
        ];
    }

    protected function buildSwitchStatement(array $node): array
    {
        $cases = [];
        foreach ($this->extractMultiple($node, 'cases') as $case) {
            $cases[] = $this->buildCaseClause($case);
        }

        $defaultBody = [];
        if (isset($node['def'])) {
            $defaultBody = $this->extractMultipleBuilt($node['def'], 'body');
        }

        return [
            '_matchrule' => 'SwitchNode',
            'expression' => $this->build($node['expr']),
            'cases' => $cases,
            'defaultBody' => $defaultBody
        ];
    }

    protected function buildCaseClause(array $node): array
    {
        return [
            'value' => $this->build($node['val']),
            'caseBody' => $this->extractMultipleBuilt($node, 'body')
        ];
    }

    protected function buildFunctionDef(array $node): array
    {
        $params = [];
        if (isset($node['params'])) {
            $params = $this->extractIdentifierNames($node['params']);
        }

        return [
            '_matchrule' => 'FunctionDefNode',
            'name' => $node['funcName']['text'],
            'parameters' => $params,
            'body' => $this->extractMultipleBuilt($node, 'body')
        ];
    }
    
    protected function buildArgument(array $node): array
    {
        // Argument può essere: argName:Identifier ":" value:Expression | value:Expression
        if (isset($node['argName'])) {
            // Named argument (per STRUCT)
            return [
                '_matchrule' => 'Argument',
                'name' => $node['argName']['text'],
                'value' => $this->build($node['value'])
            ];
        } else {
            // Positional argument (per funzioni normali)
            // Ritorna direttamente l'espressione, non un nodo Argument
            return $this->build($node['value']);
        }
    }

    protected function buildIdentifierOrCall(array $node): array
    {
        if (isset($node['id'])) {
            $args = [];
            if (isset($node['args'])) {
                $args = $this->extractListBuilt($node['args']);
            }
            return [
                '_matchrule' => 'FunctionCallNode',
                'name' => $node['id']['text'],
                'arguments' => $args
            ];
        }
        
        return isset($node['val']) ? $this->build($node['val']) : $node;
    }

    protected function buildInterruptSimpleStmt(array $node): array
    {
        $type = 'message';
        if (isset($node['type']['text'])) {
            $type = strtolower($node['type']['text']);
        }

        return [
            '_matchrule' => 'InterruptSimpleNode',
            'type' => $type,
            'expression' => $this->build($node['expr'])
        ];
    }

    protected function buildInterruptWithVarStmt(array $node): array
    {
        $expr = isset($node['expr']) ? $this->build($node['expr']) : ['_matchrule' => 'LiteralNode', 'value' => ''];
        
        return [
            '_matchrule' => 'InterruptInputNode',
            'type' => 'input',
            'expression' => $expr,
            'targetVar' => $node['var']['text']
        ];
    }

    protected function buildReturnStmt(array $node): array
    {
        return [
            '_matchrule' => 'ReturnNode',
            'expression' => isset($node['expr']) ? $this->build($node['expr']) : null
        ];
    }

    protected function buildBreakStmt(array $node): array
    {
        return ['_matchrule' => 'BreakNode'];
    }

    protected function buildContinueStmt(array $node): array
    {
        return ['_matchrule' => 'ContinueNode'];
    }

    protected function buildGotoStmt(array $node): array
    {
        return [
            '_matchrule' => 'GotoNode',
            'label' => $node['label']['text']
        ];
    }

    protected function buildLabelStmt(array $node): array
    {
        return [
            '_matchrule' => 'LabelNode',
            'name' => $node['label']['text']
        ];
    }

    protected function buildLabel(array $node): array
    {
        if (isset($node['val'])) {
            $val = $this->build($node['val']);
            if (isset($val['_matchrule']) && $val['_matchrule'] === 'LiteralNode') {
                return [
                    '_matchrule' => 'Identifier',
                    'text' => (string)$val['value']
                ];
            }
            return $val;
        }
        return $node;
    }

    protected function buildForBody(array $node): array
    {
        return isset($node['alt']) ? $this->build($node['alt']) : $node;
    }

    protected function buildExpression(array $node): array
    {
        return isset($node['val']) ? $this->build($node['val']) : $node;
    }

    protected function buildLogical(array $node): array
    {
        return $this->buildBinaryOp($node);
    }

    protected function buildComparison(array $node): array
    {
        return $this->buildBinaryOp($node);
    }

    protected function buildAdditive(array $node): array
    {
        return $this->buildBinaryOp($node);
    }

    protected function buildMultiplicative(array $node): array
    {
        return $this->buildBinaryOp($node);
    }

    protected function buildBinaryOp(array $node): array
    {
        if (!isset($node['left'])) {
            return $node;
        }
        
        $operators = $this->extractMultiple($node, 'op');
        $rights = $this->extractMultiple($node, 'right');

        if (empty($operators)) {
            return $this->build($node['left']);
        }

        $left = $this->build($node['left']);
        for ($i = 0; $i < count($operators); $i++) {
            $left = [
                '_matchrule' => 'BinaryOpNode',
                'operator' => $operators[$i]['text'],
                'left' => $left,
                'right' => $this->build($rights[$i])
            ];
        }

        return $left;
    }

    protected function buildPostfix(array $node): array
    {
        if (!isset($node['base'])) {
            return $node;
        }
        
        $base = $this->build($node['base']);
        $indices = $this->extractMultiple($node, 'index');
        $props = $this->extractMultiple($node, 'prop');

        // Handle array access
        foreach ($indices as $index) {
            $base = [
                '_matchrule' => 'ArrayAccessNode',
                'array' => $base,
                'index' => $this->build($index)
            ];
        }
        
        // Handle property access
        foreach ($props as $prop) {
            $base = [
                '_matchrule' => 'PropertyAccessNode',
                'object' => $base,
                'property' => $prop['text']
            ];
        }

        return $base;
    }

    protected function buildUnary(array $node): array
    {
        if (isset($node['op'])) {
            return [
                '_matchrule' => 'UnaryOpNode',
                'operator' => $node['op']['text'],
                'operand' => $this->build($node['expr'])
            ];
        }

        return isset($node['val']) ? $this->build($node['val']) : $node;
    }

    protected function buildPrimary(array $node): array
    {
        return isset($node['val']) ? $this->build($node['val']) : $node;
    }

    protected function buildArrayLiteral(array $node): array
    {
        $elements = [];
        if (isset($node['elems'])) {
            $elements = $this->extractListBuilt($node['elems']);
        }

        return [
            '_matchrule' => 'ArrayLiteralNode',
            'elements' => $elements
        ];
    }

    protected function buildObjectLiteral(array $node): array
    {
        $pairs = [];
        if (isset($node['pairs'])) {
            foreach ($this->extractList($node['pairs']) as $pair) {
                $pairs[] = [
                    'key' => $this->build($pair['key']),
                    'value' => $this->build($pair['value'])
                ];
            }
        }

        return [
            '_matchrule' => 'ObjectLiteralNode',
            'pairs' => $pairs
        ];
    }

    protected function buildString(array $node): array
    {
        $value = '';
        
        // Check for 'content' field (BASIC style)
        if (isset($node['content']['text'])) {
            $value = $node['content']['text'];
        } elseif (isset($node['text'])) {
            // Standard style with quotes
            $value = $node['text'];
            if (strlen($value) >= 2 && $value[0] === '"' && $value[strlen($value)-1] === '"') {
                $value = substr($value, 1, -1);
            }
        }

        return [
            '_matchrule' => 'LiteralNode',
            'value' => $value
        ];
    }

    protected function buildNumber(array $node): array
    {
        return [
            '_matchrule' => 'LiteralNode',
            'value' => $node['text']
        ];
    }

    protected function buildIdentifier(array $node): array
    {
        return [
            '_matchrule' => 'VariableNode',
            'name' => $node['text']
        ];
    }

    // Helper methods

    protected function extractStatements(array $node): array
    {
        if (isset($node['stmt'])) {
            return array_map([$this, 'build'], $this->extractMultiple($node, 'stmt'));
        }
        return [];
    }

    protected function extractMultiple(array $node, string $key): array
    {
        $results = [];
        foreach ($node as $k => $v) {
            if ($k === $key && is_array($v)) {
                if (isset($v['_matchrule'])) {
                    $results[] = $v;
                } else {
                    foreach ($v as $item) {
                        if (is_array($item) && isset($item['_matchrule'])) {
                            $results[] = $item;
                        }
                    }
                }
            }
        }
        return $results;
    }

    protected function extractMultipleBuilt(array $node, string $key): array
    {
        return array_map([$this, 'build'], $this->extractMultiple($node, $key));
    }

    protected function extractList(array $node): array
    {
        $results = [];
        if (isset($node['head'])) {
            $results[] = $node['head'];
        }
        if (isset($node['tail'])) {
            // Check if tail is a single element or array of elements
            if (isset($node['tail']['_matchrule'])) {
                // Single element
                $results[] = $node['tail'];
            } else {
                // Array of elements
                foreach ($node['tail'] as $tail) {
                    if (is_array($tail) && isset($tail['_matchrule'])) {
                        $results[] = $tail;
                    }
                }
            }
        }
        return $results;
    }

    protected function extractListBuilt(array $node): array
    {
        return array_map([$this, 'build'], $this->extractList($node));
    }

    protected function extractIdentifierNames(array $node): array
    {
        $names = [];
        foreach ($this->extractList($node) as $id) {
            $names[] = $id['text'];
        }
        return $names;
    }
    
    protected function buildStructDef(array $node): array
    {
        $fields = [];
        if (isset($node['field'])) {
            $fieldNodes = is_array($node['field']) ? $node['field'] : [$node['field']];
            foreach ($fieldNodes as $f) {
                if (is_array($f) && isset($f['text'])) {
                    $fields[] = $f['text'];
                }
            }
        }
        
        return [
            '_matchrule' => 'StructDefNode',
            'name' => $node['structName']['text'],
            'fields' => $fields
        ];
    }
    
    protected function buildMakeStruct(array $node): array
    {
        $args = [];
        if (isset($node['args'])) {
            $argList = $this->extractList($node['args']);
            foreach ($argList as $arg) {
                if (!is_array($arg)) continue;
                
                // Check if it's an Argument node from grammar
                if (isset($arg['_matchrule']) && $arg['_matchrule'] === 'Argument') {
                    if (isset($arg['argName']) && is_array($arg['argName']) && isset($arg['argName']['text'])) {
                        // Named argument
                        $args[] = [
                            'name' => $arg['argName']['text'],
                            'value' => $this->build($arg['value'])
                        ];
                    } else {
                        // Positional argument
                        $args[] = [
                            'name' => null,
                            'value' => $this->build($arg['value'])
                        ];
                    }
                } elseif (isset($arg['argName']) && is_array($arg['argName']) && isset($arg['argName']['text'])) {
                    // Named argument (old format)
                    $args[] = [
                        'name' => $arg['argName']['text'],
                        'value' => $this->build($arg['value'])
                    ];
                } else {
                    // Positional argument - directly an Expression
                    $args[] = [
                        'name' => null,
                        'value' => $this->build($arg)
                    ];
                }
            }
        }
        
        return [
            '_matchrule' => 'MakeStructNode',
            'structName' => $node['structName']['text'],
            'arguments' => $args
        ];
    }
    
    protected function buildFieldList(array $node): array
    {
        return $this->extractIdentifierNames($node);
    }
}
