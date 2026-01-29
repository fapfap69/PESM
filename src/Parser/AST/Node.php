<?php
/**
 * PESM - Base AST Node
 * All AST nodes extend this base class
 */

namespace PESM\Parser\AST;

abstract class Node {
    private static int $nextId = 0;
    public readonly int $id;
    
    public function __construct() {
        $this->id = self::$nextId++;
    }
    
    /**
     * Execute this node
     * 
     * @param \PESM\Runtime\ExecutionContext $context
     * @param \PESM\Runtime\ControlFlow $flow
     * @param \PESM\Runtime\CommandRegistry $commands
     * @return mixed
     */
    abstract public function execute($context, $flow, $commands);
    
    /**
     * Get child nodes (for traversal)
     * 
     * @return Node[]
     */
    public function getChildren(): array {
        return [];
    }
    
    /**
     * Convert to array for serialization
     * 
     * @return array
     */
    public function toArray(): array {
        return [
            'id' => $this->id,
            'type' => $this->getType()
        ];
    }
    
    /**
     * Get node type name
     * 
     * @return string
     */
    public function getType(): string {
        $class = get_class($this);
        return substr($class, strrpos($class, '\\') + 1);
    }
}
