<?php

namespace PESM\Parser;

use PESM\Parser\AST\Node;

/**
 * ArrayToNodeConverter - Converts array-based AST to Node objects
 * 
 * This adapter allows the Compiler to work with AST built from parse trees
 */
class ArrayToNodeConverter
{
    /**
     * Convert array AST to Node object
     * 
     * @param array $ast Array-based AST
     * @return Node
     */
    public function convert(array $ast): Node
    {
        if (!isset($ast['_matchrule'])) {
            throw new \RuntimeException("Invalid AST: missing _matchrule");
        }

        $nodeType = $ast['_matchrule'];
        
        // Special mappings
        $mappings = [
            'Identifier' => 'VariableNode',
            'CommandDecl' => 'CommandDeclNode',
        ];
        
        if (isset($mappings[$nodeType])) {
            $nodeType = $mappings[$nodeType];
        } elseif (!str_ends_with($nodeType, 'Node')) {
            $nodeType .= 'Node';
        }
        
        $className = 'PESM\\Parser\\AST\\' . $nodeType;

        if (!class_exists($className)) {
            throw new \RuntimeException("Unknown node type: $nodeType (from {$ast['_matchrule']})");
        }

        // Create node instance based on type
        return $this->createNode($nodeType, $ast);
    }

    private function createNode(string $type, array $data): Node
    {
        $className = 'PESM\\Parser\\AST\\' . $type;
        
        // Special handling for CommandDeclNode
        if ($type === 'CommandDeclNode') {
            $commands = [];
            if (isset($data['head'])) {
                // head can be array with text or already converted node
                if (is_array($data['head']) && isset($data['head']['text'])) {
                    $commands[] = $data['head']['text'];
                } elseif (is_array($data['head'])) {
                    $headNode = $this->convert($data['head']);
                    $commands[] = $headNode->name;
                } else {
                    $commands[] = $data['head'];
                }
            }
            if (isset($data['tail']) && is_array($data['tail'])) {
                foreach ($data['tail'] as $cmd) {
                    if (is_array($cmd) && isset($cmd['text'])) {
                        $commands[] = $cmd['text'];
                    } elseif (is_array($cmd)) {
                        $cmdNode = $this->convert($cmd);
                        $commands[] = $cmdNode->name;
                    } else {
                        $commands[] = $cmd;
                    }
                }
            }
            return new $className($commands);
        }
        
        // Use reflection to create instance without constructor
        $reflection = new \ReflectionClass($className);
        $node = $reflection->newInstanceWithoutConstructor();

        // Set properties
        foreach ($data as $key => $value) {
            if ($key === '_matchrule') continue;

            // Special handling for MakeStructNode arguments
            if ($type === 'MakeStructNode' && $key === 'arguments') {
                $value = $this->convertArguments($value);
            }
            // Convert child arrays to nodes
            elseif (is_array($value)) {
                if (isset($value['_matchrule'])) {
                    $value = $this->convert($value);
                } elseif ($this->isArrayOfNodes($value)) {
                    $value = array_map([$this, 'convert'], $value);
                }
            }

            // Set property
            if ($reflection->hasProperty($key)) {
                $prop = $reflection->getProperty($key);
                $prop->setAccessible(true);
                $prop->setValue($node, $value);
            }
        }

        return $node;
    }
    
    private function convertArguments(array $args): array
    {
        $result = [];
        foreach ($args as $arg) {
            // Skip if it has _matchrule (it's a parse tree node, not our structure)
            if (isset($arg['_matchrule'])) {
                // Extract value from Argument node
                if ($arg['_matchrule'] === 'Argument') {
                    $result[] = [
                        'name' => $arg['name'] ?? null,
                        'value' => isset($arg['value']) && is_array($arg['value']) && isset($arg['value']['_matchrule']) 
                            ? $this->convert($arg['value']) 
                            : ($arg['value'] ?? null)
                    ];
                    continue;
                }
            }
            
            // arg is already a processed array with 'name' and 'value'
            if (isset($arg['value']) && is_array($arg['value']) && isset($arg['value']['_matchrule'])) {
                $result[] = [
                    'name' => $arg['name'],
                    'value' => $this->convert($arg['value'])
                ];
            } else {
                $result[] = $arg;
            }
        }
        return $result;
    }

    private function isArrayOfNodes(array $arr): bool
    {
        if (empty($arr)) return false;
        
        foreach ($arr as $item) {
            if (!is_array($item) || !isset($item['_matchrule'])) {
                return false;
            }
        }
        
        return true;
    }
}
