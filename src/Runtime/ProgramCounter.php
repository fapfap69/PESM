<?php
/**
 * PESM - Program Counter
 * Tracks execution position for resume capability
 */

namespace PESM\Runtime;

class ProgramCounter {
    private int $currentNodeId = 0;
    private ?int $resumeFromId = null;
    private bool $skipMode = false;
    
    public function setCurrentNode(int $nodeId): void {
        $this->currentNodeId = $nodeId;
    }
    
    public function getCurrentNodeId(): int {
        return $this->currentNodeId;
    }
    
    public function setResumePoint(int $nodeId): void {
        $this->resumeFromId = $nodeId;
    }
    
    public function getResumePoint(): ?int {
        return $this->resumeFromId;
    }
    
    public function shouldSkip(int $nodeId): bool {
        if ($this->resumeFromId === null) {
            return false;
        }
        
        // Skip nodi già eseguiti (ID <= resumeFromId)
        return $nodeId <= $this->resumeFromId;
    }
    
    public function clearResumePoint(): void {
        $this->resumeFromId = null;
    }
    
    public function reset(): void {
        $this->currentNodeId = 0;
        $this->resumeFromId = null;
        $this->skipMode = false;
    }
}
