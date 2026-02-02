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
        // Build label map on first execution
        $labels = [];
        foreach ($this->statements as $i => $stmt) {
            if ($stmt instanceof LabelNode) {
                $labels[$stmt->name] = $i;
            }
        }
        
        $i = 0;
        $iterations = 0;
        while ($i < count($this->statements)) {
            $iterations++;
            if ($iterations > 10000) {
                throw new \Exception("Infinite loop detected (>10000 iterations)");
            }
            
            $stmt = $this->statements[$i];
            
            // Skip se in resume mode
            if ($pc && $pc->shouldSkip($stmt->id)) {
                $i++;
                continue;
            }
            
            if ($pc) $pc->setCurrentNode($stmt->id);
            
            $stmt->execute($context, $flow, $commands, $pc);
            
            // Handle GOTO
            if ($flow->hasGoto()) {
                $label = $flow->getGotoLabel();
                $flow->clearGoto();
                
                if (!isset($labels[$label])) {
                    throw new \Exception("Undefined label: $label");
                }
                
                $i = $labels[$label];
                continue;
            }
            
            // Check for early termination
            if ($flow->hasReturnValue() || $flow->getAction() || $flow->needsInterrupt()) {
                break;
            }
            
            $i++;
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
