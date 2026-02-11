<?php
/**
 * PESM - Bytecode Instruction
 */

namespace PESM\Bytecode;

class Instruction {
    public function __construct(
        public string $opcode,
        public mixed $operand = null
    ) {}
    
    public function __toString(): string {
        if ($this->operand === null) {
            return $this->opcode;
        }
        
        if (is_array($this->operand)) {
            return $this->opcode . ' ' . json_encode($this->operand);
        }
        
        if (is_string($this->operand)) {
            return $this->opcode . ' "' . $this->operand . '"';
        }
        
        return $this->opcode . ' ' . $this->operand;
    }
}
