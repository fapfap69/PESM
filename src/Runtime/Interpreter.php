<?php
/**
 * PESM - Interpreter
 * Main execution engine for AST
 */

namespace PESM\Runtime;

use PESM\Parser\AST\Node;

require_once __DIR__ . '/ExecutionContext.php';
require_once __DIR__ . '/Components.php';
require_once __DIR__ . '/ProgramCounter.php';

class Interpreter {
    private CommandRegistry $commands;
    private FunctionRegistry $functions;
    
    public function __construct() {
        $this->commands = new CommandRegistry();
        $this->functions = new FunctionRegistry();
        $this->registerBuiltinCommands();
    }
    
    public function execute(Node $ast, array $variables = [], ?int $resumeFromId = null): Result {
        $context = new ExecutionContext($variables);
        $flow = new ControlFlow();
        $pc = new ProgramCounter();
        
        if ($resumeFromId !== null) {
            $pc->setResumePoint($resumeFromId);
        }
        
        try {
            $ast->execute($context, $flow, $this->functions, $pc);
            
            // Check for interruption (MESSAGE, ACCEPT, REFUSE)
            if ($flow->needsInterrupt()) {
                $type = $flow->getPendingAction();
                $data = $flow->getActionData();
                
                return new Result(
                    status: 'interrupted',
                    variables: $context->getAll(),
                    action: $type,
                    message: $type === 'message' ? $data : null,
                    actionData: $data,
                    resumeFrom: $pc->getCurrentNodeId()
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
