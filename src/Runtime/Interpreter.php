<?php
/**
 * PESM - Interpreter
 * Main execution engine for AST
 */

namespace PESM\Runtime;

use PESM\Parser\AST\Node;

require_once __DIR__ . '/ExecutionContext.php';
require_once __DIR__ . '/Components.php';

class Interpreter {
    private CommandRegistry $commands;
    private FunctionRegistry $functions;
    private ?ExecutionState $checkpoint = null;
    
    public function __construct() {
        $this->commands = new CommandRegistry();
        $this->functions = new FunctionRegistry();
        $this->registerBuiltinCommands();
    }
    
    public function execute(Node $ast, array $variables = []): Result {
        $context = new ExecutionContext($variables);
        $flow = new ControlFlow();
        
        // Resume from checkpoint if exists
        if ($this->checkpoint) {
            return $this->resume($ast, $this->checkpoint);
        }
        
        try {
            $ast->execute($context, $flow, $this->functions);
            
            // Check for interruption (INPUT_MASK, etc.)
            if ($flow->needsInterrupt()) {
                $this->checkpoint = new ExecutionState(
                    nodeId: $ast->id,
                    variables: $context->getAll(),
                    callStack: $context->getCallStack(),
                    scopeStack: $context->getScopeStack(),
                    pendingAction: $flow->getPendingAction()
                );
                
                return new Result(
                    status: 'interrupted',
                    variables: $context->getAll(),
                    checkpoint: $this->checkpoint->serialize(),
                    action: $flow->getPendingAction()
                );
            }
            
            return new Result(
                status: 'success',
                variables: $context->getAll(),
                message: $context->getMessage(),
                action: $flow->getAction()
            );
            
        } catch (\Exception $e) {
            return new Result(
                status: 'error',
                error: $e->getMessage(),
                variables: $context->getAll()
            );
        }
    }
    
    private function resume(Node $ast, ExecutionState $state): Result {
        $context = new ExecutionContext($state->variables);
        $context->restoreCallStack($state->callStack);
        $context->restoreScopeStack($state->scopeStack);
        
        $resumeNode = $this->findNodeById($ast, $state->nodeId);
        
        if (!$resumeNode) {
            throw new \Exception("Cannot resume: node not found");
        }
        
        $flow = new ControlFlow();
        $this->checkpoint = null;
        
        return $this->execute($resumeNode, $context->getAll());
    }
    
    private function findNodeById(Node $node, int $id): ?Node {
        if ($node->id === $id) {
            return $node;
        }
        
        foreach ($node->getChildren() as $child) {
            $found = $this->findNodeById($child, $id);
            if ($found) return $found;
        }
        
        return null;
    }
    
    public function setCheckpoint(string $serialized): void {
        $this->checkpoint = ExecutionState::deserialize($serialized);
    }
    
    public function registerCommand(string $name, callable $handler): void {
        $this->commands->register($name, $handler);
    }
    
    public function registerFunction(string $name, callable $handler): void {
        $this->functions->register($name, $handler);
    }
    
    private function registerBuiltinCommands(): void {
        // MESSAGE is handled in AST node
        // ACCEPT is handled in AST node
        // REFUSE is handled in AST node
        
        // Custom commands can be registered here
    }
}
