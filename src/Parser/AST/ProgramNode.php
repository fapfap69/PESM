<?php
/**
 * PESM - Program Node (Bytecode-based)
 * Root AST node that compiles to bytecode and executes via VM
 */

namespace PESM\Parser\AST;

require_once __DIR__ . '/../../Bytecode/Compiler.php';
require_once __DIR__ . '/../../Bytecode/VM.php';

use PESM\Bytecode\Compiler;
use PESM\Bytecode\VM;
use PESM\Runtime\Result;

class ProgramNode extends Node {
    public array $statements = [];
    private ?array $bytecode = null;
    
    public function __construct(array $statements = []) {
        parent::__construct();
        $this->statements = $statements;
    }
    
    /**
     * Execute program using bytecode VM
     */
    public function execute($context, $flow, $commands, $pc = null): Result {
        // Compile AST to bytecode (cache)
        if ($this->bytecode === null) {
            $compiler = new Compiler();
            $this->bytecode = $compiler->compile($this);
        }
        
        // Execute via VM
        $vm = new VM();
        
        // Extract state for resume
        $state = $pc ? $pc->getState() : null;
        $resumeFrom = $pc ? $pc->getResumeFrom() : null;
        $returnValue = $pc ? $pc->getReturnValue() : null;
        
        return $vm->execute($this->bytecode, $state, $resumeFrom, $returnValue);
    }
    
    public function getChildren(): array {
        return $this->statements;
    }
}
