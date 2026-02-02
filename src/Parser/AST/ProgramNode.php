<?php
/**
 * PESM - Program Node (Root)
 * Represents the entire program
 */

namespace PESM\Parser\AST;

class ProgramNode extends Node {
    /**
     * @param Node[] $statements
     */
    public function __construct(
        public array $statements = []
    ) {
        parent::__construct();
    }
    
    public function execute($context, $flow, $commands, $pc = null) {
        foreach ($this->statements as $stmt) {
            // Skip se in resume mode
            if ($pc && $pc->shouldSkip($stmt->id)) {
                continue;
            }
            
            if ($pc) $pc->setCurrentNode($stmt->id);
            
            $stmt->execute($context, $flow, $commands, $pc);
            
            // Check for early termination
            if ($flow->hasReturnValue() || $flow->getAction() || $flow->needsInterrupt()) {
                break;
            }
        }
        
        return null;
    }
    
    public function getChildren(): array {
        return $this->statements;
    }
    
    public function toArray(): array {
        return array_merge(parent::toArray(), [
            'statements' => array_map(fn($s) => $s->toArray(), $this->statements)
        ]);
    }
}
