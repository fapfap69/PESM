<?php
/**
 * PESM - Essential AST Nodes
 * Core nodes for the PESM language
 */

namespace PESM\Parser\AST;

// Literal Node
class LiteralNode extends Node {
    public function __construct(public mixed $value) {
        parent::__construct();
    }
    
    public function execute($context, $flow, $commands, $pc = null) {
        // Convert numeric strings to numbers
        if (is_string($this->value) && is_numeric($this->value)) {
            return strpos($this->value, '.') !== false ? (float)$this->value : (int)$this->value;
        }
        return $this->value;
    }
    
    public function toArray(): array {
        return array_merge(parent::toArray(), ['value' => $this->value]);
    }
}

// Variable Node
class VariableNode extends Node {
    public function __construct(public string $name) {
        parent::__construct();
    }
    
    public function execute($context, $flow, $commands, $pc = null) {
        return $context->get($this->name);
    }
    
    public function toArray(): array {
        return array_merge(parent::toArray(), ['name' => $this->name]);
    }
}

// Assignment Node
class AssignmentNode extends Node {
    public function __construct(
        public string|Node $target,
        public Node $expression
    ) {
        parent::__construct();
    }
    
    public function execute($context, $flow, $commands, $pc = null) {
        $value = $this->expression->execute($context, $flow, $commands, $pc);
        
        // Simple variable assignment
        if (is_string($this->target)) {
            $context->set($this->target, $value);
            return $value;
        }
        
        // Array access assignment: arr[idx] = value or arr[i][j] = value
        if ($this->target instanceof ArrayAccessNode) {
            $varName = $this->getBaseVariableName($this->target);
            if (!$varName) {
                throw new \Exception("Cannot assign to complex expression");
            }
            
            $arr = $context->get($varName);
            if (!is_array($arr)) {
                $arr = [];
            }
            
            // Build index chain
            $indices = $this->collectIndices($this->target, $context, $flow, $commands, $pc);
            
            // Navigate to target and assign
            $this->assignNested($arr, $indices, $value);
            $context->set($varName, $arr);
            return $value;
        }
        
        throw new \Exception("Invalid assignment target");
    }
    
    private function getBaseVariableName(Node $node): ?string {
        if ($node instanceof VariableNode) {
            return $node->name;
        }
        if ($node instanceof ArrayAccessNode) {
            return $this->getBaseVariableName($node->array);
        }
        return null;
    }
    
    private function collectIndices(ArrayAccessNode $node, $context, $flow, $commands, $pc): array {
        $indices = [];
        $current = $node;
        
        while ($current instanceof ArrayAccessNode) {
            array_unshift($indices, $current->index->execute($context, $flow, $commands, $pc));
            $current = $current->array;
        }
        
        return $indices;
    }
    
    private function assignNested(array &$arr, array $indices, $value): void {
        $ref = &$arr;
        $lastIdx = array_pop($indices);
        
        foreach ($indices as $idx) {
            if (!isset($ref[$idx]) || !is_array($ref[$idx])) {
                $ref[$idx] = [];
            }
            $ref = &$ref[$idx];
        }
        
        $ref[$lastIdx] = $value;
    }
    
    public function getChildren(): array {
        $children = [$this->expression];
        if ($this->target instanceof Node) {
            $children[] = $this->target;
        }
        return $children;
    }
}

// Binary Operation Node
class BinaryOpNode extends Node {
    public function __construct(
        public Node $left,
        public string $operator,
        public Node $right
    ) {
        parent::__construct();
    }
    
    public function execute($context, $flow, $commands, $pc = null) {
        $l = $this->left->execute($context, $flow, $commands, $pc);
        $r = $this->right->execute($context, $flow, $commands, $pc);
        
        // Special case for range
        if ($this->operator === 'range') {
            return range($l, $r);
        }
        
        return match($this->operator) {
            '+' => $l + $r,
            '-' => $l - $r,
            '*' => $l * $r,
            '/' => $l / $r,
            '%' => $l % $r,
            '=' => $l == $r,  // BASIC uses = for comparison
            '==' => $l == $r,
            '!=' => $l != $r,
            '<>' => $l != $r,  // BASIC uses <> for not equal
            '>' => $l > $r,
            '>=' => $l >= $r,
            '<' => $l < $r,
            '<=' => $l <= $r,
            'AND' => $l && $r,
            'OR' => $l || $r,
            default => throw new \Exception("Unknown operator: {$this->operator}")
        };
    }
    
    public function getChildren(): array {
        return [$this->left, $this->right];
    }
}

// Array Access Node
class ArrayAccessNode extends Node {
    public function __construct(
        public Node $array,
        public Node $index
    ) {
        parent::__construct();
    }
    
    public function execute($context, $flow, $commands, $pc = null) {
        $arr = $this->array->execute($context, $flow, $commands, $pc);
        $idx = $this->index->execute($context, $flow, $commands, $pc);
        return $arr[$idx] ?? null;
    }
    
    public function getChildren(): array {
        return [$this->array, $this->index];
    }
}

// Array Literal Node
class ArrayLiteralNode extends Node {
    public function __construct(
        public array $elements = []
    ) {
        parent::__construct();
    }
    
    public function execute($context, $flow, $commands, $pc = null) {
        $result = [];
        foreach ($this->elements as $elem) {
            $result[] = $elem->execute($context, $flow, $commands, $pc);
        }
        return $result;
    }
    
    public function getChildren(): array {
        return $this->elements;
    }
}

// Object Literal Node
class ObjectLiteralNode extends Node {
    public function __construct(
        public array $pairs = []  // [['key' => Node, 'value' => Node], ...]
    ) {
        parent::__construct();
    }
    
    public function execute($context, $flow, $commands, $pc = null) {
        $result = [];
        foreach ($this->pairs as $pair) {
            $key = $pair['key']->execute($context, $flow, $commands, $pc);
            $value = $pair['value']->execute($context, $flow, $commands, $pc);
            $result[$key] = $value;
        }
        return $result;
    }
    
    public function getChildren(): array {
        $children = [];
        foreach ($this->pairs as $pair) {
            $children[] = $pair['key'];
            $children[] = $pair['value'];
        }
        return $children;
    }
}

// Block Node - Generic statement container for {}, BEGIN/END
class BlockNode extends Node {
    public function __construct(
        public array $statements = []
    ) {
        parent::__construct();
    }
    
    public function execute($context, $flow, $commands, $pc = null) {
        foreach ($this->statements as $stmt) {
            if ($pc && $pc->shouldSkip($stmt->id)) {
                continue;
            }
            
            if ($pc) $pc->setCurrentNode($stmt->id);
            
            $stmt->execute($context, $flow, $commands, $pc);
            if ($flow->hasReturnValue() || $flow->getAction() || $flow->needsInterrupt() || $flow->hasGoto()) {
                break;
            }
        }
    }
    
    public function getChildren(): array {
        return $this->statements;
    }
}

// Label Node - Marks a position in code
class LabelNode extends Node {
    public function __construct(
        public string $name
    ) {
        parent::__construct();
    }
    
    public function execute($context, $flow, $commands, $pc = null) {
        // Labels don't execute, they just mark positions
    }
}

// Goto Node - Jumps to a label
class GotoNode extends Node {
    public function __construct(
        public string $label
    ) {
        parent::__construct();
    }
    
    public function execute($context, $flow, $commands, $pc = null) {
        $flow->setGoto($this->label);
    }
}

// IF Node
class IfNode extends Node {
    public function __construct(
        public Node $condition,
        public array $thenBody,
        public array $elseBody = []
    ) {
        parent::__construct();
    }
    
    public function execute($context, $flow, $commands, $pc = null) {
        $condValue = $this->condition->execute($context, $flow, $commands, $pc);
        
        $body = $condValue ? $this->thenBody : $this->elseBody;
        
        foreach ($body as $stmt) {
            // Skip se in resume mode
            if ($pc && $pc->shouldSkip($stmt->id)) {
                continue;
            }
            
            if ($pc) $pc->setCurrentNode($stmt->id);
            
            $stmt->execute($context, $flow, $commands, $pc);
            if ($flow->hasReturnValue() || $flow->getAction() || $flow->needsInterrupt() || $flow->hasGoto()) {
                break;
            }
        }
    }
    
    public function getChildren(): array {
        return array_merge([$this->condition], $this->thenBody, $this->elseBody);
    }
}

// FOREACH Node
class ForeachNode extends Node {
    public function __construct(
        public string $variable,
        public Node $iterable,
        public array $body
    ) {
        parent::__construct();
    }
    
    public function execute($context, $flow, $commands, $pc = null) {
        $items = $this->iterable->execute($context, $flow, $commands, $pc);
        
        if (!is_array($items)) {
            throw new \Exception("FOREACH requires an array");
        }
        
        foreach ($items as $item) {
            $context->set($this->variable, $item);
            
            foreach ($this->body as $stmt) {
                // Skip se in resume mode
                if ($pc && $pc->shouldSkip($stmt->id)) {
                    continue;
                }
                
                if ($pc) $pc->setCurrentNode($stmt->id);
                
                $stmt->execute($context, $flow, $commands, $pc);
                
                if ($flow->shouldBreak()) {
                    $flow->reset();
                    return;
                }
                if ($flow->shouldContinue()) {
                    $flow->reset();
                    break;
                }
                if ($flow->hasGoto()) {
                    return;
                }
                if ($flow->hasReturnValue() || $flow->getAction() || $flow->needsInterrupt()) {
                    return;
                }
            }
        }
    }
    
    public function getChildren(): array {
        return array_merge([$this->iterable], $this->body);
    }
}

// WHILE Node
class WhileNode extends Node {
    public function __construct(
        public Node $condition,
        public array $body
    ) {
        parent::__construct();
    }
    
    public function execute($context, $flow, $commands, $pc = null) {
        while (true) {
            $condValue = $this->condition->execute($context, $flow, $commands, $pc);
            
            if (!$condValue) {
                break;
            }
            
            foreach ($this->body as $stmt) {
                if ($pc && $pc->shouldSkip($stmt->id)) {
                    continue;
                }
                
                if ($pc) $pc->setCurrentNode($stmt->id);
                
                $stmt->execute($context, $flow, $commands, $pc);
                
                if ($flow->shouldBreak()) {
                    $flow->reset();
                    return;
                }
                if ($flow->shouldContinue()) {
                    $flow->reset();
                    break;
                }
                if ($flow->hasGoto()) {
                    return;
                }
                if ($flow->hasReturnValue() || $flow->getAction() || $flow->needsInterrupt()) {
                    return;
                }
            }
        }
    }
    
    public function getChildren(): array {
        return array_merge([$this->condition], $this->body);
    }
}

// Function Call Node
class FunctionCallNode extends Node {
    public function __construct(
        public string $name,
        public array $arguments
    ) {
        parent::__construct();
    }
    
    public function execute($context, $flow, $commands, $pc = null) {
        // Evaluate arguments
        $args = array_map(
            fn($arg) => $arg->execute($context, $flow, $commands, $pc),
            $this->arguments
        );
        
        // Check user-defined functions
        if ($context->hasFunction($this->name)) {
            return $this->executeUserFunction($context, $flow, $commands, $args);
        }
        
        // Check built-in functions
        if ($commands->has($this->name)) {
            return $commands->execute($this->name, $args, $context);
        }
        
        throw new \Exception("Function not found: {$this->name}");
    }
    
    private function executeUserFunction($context, $flow, $commands, $args) {
        $funcDef = $context->getFunction($this->name);
        
        $context->pushScope();
        
        foreach ($funcDef->parameters as $i => $param) {
            $context->set($param, $args[$i] ?? null);
        }
        
        $returnValue = null;
        foreach ($funcDef->body as $stmt) {
            $stmt->execute($context, $flow, $commands, $pc);
            
            if ($flow->hasReturnValue()) {
                $returnValue = $flow->getReturnValue();
                $flow->clearReturn();
                break;
            }
        }
        
        $context->popScope();
        
        return $returnValue;
    }
    
    public function getChildren(): array {
        return $this->arguments;
    }
}

// Interrupt Command Node (MESSAGE, ACCEPT, REFUSE, INPUT, PROMPT)
class InterruptNode extends Node {
    public function __construct(
        public string $type,
        public ?Node $expression = null,
        public ?string $targetVar = null  // For INPUT
    ) {
        parent::__construct();
    }
    
    public function execute($context, $flow, $commands, $pc = null) {
        $data = $this->expression 
            ? $this->expression->execute($context, $flow, $commands, $pc)
            : null;
        $flow->setInterrupt($this->type, $data, $this->targetVar);
    }
    
    public function getChildren(): array {
        return $this->expression ? [$this->expression] : [];
    }
}

// Interrupt Simple Node (MESSAGE, ACCEPT, REFUSE)
class InterruptSimpleNode extends Node {
    public function __construct(
        public string $type,
        public Node $expression
    ) {
        parent::__construct();
    }
    
    public function execute($context, $flow, $commands, $pc = null) {
        $data = $this->expression->execute($context, $flow, $commands, $pc);
        $flow->setInterrupt($this->type, $data, null);
    }
    
    public function getChildren(): array {
        return [$this->expression];
    }
}

// Interrupt Input Node (INPUT, PROMPT)
class InterruptInputNode extends Node {
    public function __construct(
        public string $type,
        public Node $expression,
        public string $targetVar
    ) {
        parent::__construct();
    }
    
    public function execute($context, $flow, $commands, $pc = null) {
        $data = $this->expression->execute($context, $flow, $commands, $pc);
        $flow->setInterrupt($this->type, $data, $this->targetVar);
    }
    
    public function getChildren(): array {
        return [$this->expression];
    }
}

// RETURN Statement Node
class ReturnNode extends Node {
    public function __construct(public ?Node $expression = null) {
        parent::__construct();
    }
    
    public function execute($context, $flow, $commands, $pc = null) {
        $value = $this->expression 
            ? $this->expression->execute($context, $flow, $commands, $pc)
            : null;
        $flow->setReturn($value);
    }
}

// Function Definition Node
class FunctionDefNode extends Node {
    public function __construct(
        public string $name,
        public array $parameters,
        public array $body
    ) {
        parent::__construct();
    }
    
    public function execute($context, $flow, $commands, $pc = null) {
        $context->defineFunction($this->name, $this);
    }
    
    public function getChildren(): array {
        return $this->body;
    }
}

// Unary Operation Node
class UnaryOpNode extends Node {
    public function __construct(
        public string $operator,
        public Node $operand
    ) {
        parent::__construct();
    }
    
    public function execute($context, $flow, $commands, $pc = null) {
        $val = $this->operand->execute($context, $flow, $commands, $pc);
        
        return match($this->operator) {
            '-' => -$val,
            '+' => +$val,
            'NOT' => !$val,
            default => throw new \Exception("Unknown unary operator: {$this->operator}")
        };
    }
    
    public function getChildren(): array {
        return [$this->operand];
    }
}

// DO-WHILE Node
class DoWhileNode extends Node {
    public function __construct(
        public Node $condition,
        public array $body
    ) {
        parent::__construct();
    }
    
    public function execute($context, $flow, $commands, $pc = null) {
        do {
            foreach ($this->body as $stmt) {
                if ($pc && $pc->shouldSkip($stmt->id)) continue;
                if ($pc) $pc->setCurrentNode($stmt->id);
                $stmt->execute($context, $flow, $commands, $pc);
                if ($flow->shouldBreak() || $flow->shouldContinue() || $flow->hasGoto() || 
                    $flow->hasReturnValue() || $flow->getAction() || $flow->needsInterrupt()) {
                    return;
                }
            }
            $condValue = $this->condition->execute($context, $flow, $commands, $pc);
        } while ($condValue);
    }
    
    public function getChildren(): array {
        return array_merge([$this->condition], $this->body);
    }
}

// REPEAT-UNTIL Node
class RepeatUntilNode extends Node {
    public function __construct(
        public Node $condition,
        public array $body
    ) {
        parent::__construct();
    }
    
    public function execute($context, $flow, $commands, $pc = null) {
        do {
            foreach ($this->body as $stmt) {
                if ($pc && $pc->shouldSkip($stmt->id)) continue;
                if ($pc) $pc->setCurrentNode($stmt->id);
                $stmt->execute($context, $flow, $commands, $pc);
                if ($flow->shouldBreak() || $flow->shouldContinue() || $flow->hasGoto() || 
                    $flow->hasReturnValue() || $flow->getAction() || $flow->needsInterrupt()) {
                    return;
                }
            }
            $condValue = $this->condition->execute($context, $flow, $commands, $pc);
        } while (!$condValue);  // Inverted!
    }
    
    public function getChildren(): array {
        return array_merge([$this->condition], $this->body);
    }
}

// BREAK Node
class BreakNode extends Node {
    public function execute($context, $flow, $commands, $pc = null) {
        $flow->setBreak();
    }
}

// CONTINUE Node
class ContinueNode extends Node {
    public function execute($context, $flow, $commands, $pc = null) {
        $flow->setContinue();
    }
}

// SWITCH Node
class SwitchNode extends Node {
    public function __construct(
        public Node $expression,
        public array $cases,  // [['value' => Node, 'body' => [Node]], ...]
        public array $defaultBody = []
    ) {
        parent::__construct();
    }
    
    public function execute($context, $flow, $commands, $pc = null) {
        $switchValue = $this->expression->execute($context, $flow, $commands, $pc);
        
        // Try each case
        foreach ($this->cases as $case) {
            $caseValue = $case['value']->execute($context, $flow, $commands, $pc);
            
            if ($switchValue == $caseValue) {
                foreach ($case['body'] as $stmt) {
                    if ($pc && $pc->shouldSkip($stmt->id)) continue;
                    if ($pc) $pc->setCurrentNode($stmt->id);
                    $stmt->execute($context, $flow, $commands, $pc);
                    
                    if ($flow->shouldBreak()) {
                        $flow->reset();
                        return;
                    }
                    if ($flow->hasGoto() || $flow->hasReturnValue() || $flow->getAction() || $flow->needsInterrupt()) {
                        return;
                    }
                }
                return;  // Exit after matching case
            }
        }
        
        // Execute default if no match
        foreach ($this->defaultBody as $stmt) {
            if ($pc && $pc->shouldSkip($stmt->id)) continue;
            if ($pc) $pc->setCurrentNode($stmt->id);
            $stmt->execute($context, $flow, $commands, $pc);
            
            if ($flow->shouldBreak()) {
                $flow->reset();
                return;
            }
            if ($flow->hasGoto() || $flow->hasReturnValue() || $flow->getAction() || $flow->needsInterrupt()) {
                return;
            }
        }
    }
    
    public function getChildren(): array {
        $children = [$this->expression];
        foreach ($this->cases as $case) {
            $children[] = $case['value'];
            $children = array_merge($children, $case['body']);
        }
        return array_merge($children, $this->defaultBody);
    }
}

// STRUCT Definition Node
class StructDefNode extends Node {
    public function __construct(
        public string $name,
        public array $fields
    ) {
        parent::__construct();
    }
    
    public function execute($context, $flow, $commands, $pc = null) {
        $context->defineStruct($this->name, $this->fields);
    }
}

// COMMAND Declaration Node
class CommandDeclNode extends Node {
    public function __construct(
        public array $commands  // ['SEND_EMAIL', 'LOG', 'VALIDATE']
    ) {
        parent::__construct();
    }
    
    public function execute($context, $flow, $commands, $pc = null) {
        // No-op at runtime, used only by compiler
    }
}

// MAKE Struct Node (instantiation)
class MakeStructNode extends Node {
    public function __construct(
        public string $structName,
        public array $arguments  // [['name' => string|null, 'value' => Node], ...]
    ) {
        parent::__construct();
    }
    
    public function execute($context, $flow, $commands, $pc = null) {
        $structDef = $context->getStruct($this->structName);
        if (!$structDef) {
            throw new \Exception("Struct not defined: {$this->structName}");
        }
        
        $instance = [];
        
        // Handle named arguments
        $hasNamedArgs = !empty($this->arguments) && isset($this->arguments[0]['name']);
        
        if ($hasNamedArgs) {
            // Named arguments: MAKE Person(name: "Mario", age: 30)
            foreach ($this->arguments as $arg) {
                $name = $arg['name'];
                $value = $arg['value']->execute($context, $flow, $commands, $pc);
                $instance[$name] = $value;
            }
        } else {
            // Positional arguments: MAKE Person("Mario", 30)
            foreach ($structDef as $i => $field) {
                $value = isset($this->arguments[$i]) 
                    ? $this->arguments[$i]['value']->execute($context, $flow, $commands, $pc)
                    : null;
                $instance[$field] = $value;
            }
        }
        
        return $instance;
    }
    
    public function getChildren(): array {
        return array_map(fn($arg) => $arg['value'], $this->arguments);
    }
}

// Property Access Node (dot notation)
class PropertyAccessNode extends Node {
    public function __construct(
        public Node $object,
        public string $property
    ) {
        parent::__construct();
    }
    
    public function execute($context, $flow, $commands, $pc = null) {
        $obj = $this->object->execute($context, $flow, $commands, $pc);
        
        if (!is_array($obj)) {
            throw new \Exception("Cannot access property on non-object");
        }
        
        return $obj[$this->property] ?? null;
    }
    
    public function getChildren(): array {
        return [$this->object];
    }
}
