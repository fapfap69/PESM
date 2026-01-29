<?php
/**
 * PESM - PHP Embedded Scripts Manager
 * Main Script Engine Facade
 * 
 * @author Antonio Franco <antonio.franco@ba.infn.it>
 * @version 1.0.0
 */

namespace PESM;

require_once __DIR__ . '/Runtime/Interpreter.php';
require_once __DIR__ . '/Parser/AST/Node.php';
require_once __DIR__ . '/Parser/AST/ProgramNode.php';
require_once __DIR__ . '/Parser/AST/Nodes.php';

class ScriptEngine {
    private Runtime\Interpreter $interpreter;
    private array $astCache = [];
    
    public function __construct() {
        $this->interpreter = new Runtime\Interpreter();
    }
    
    /**
     * Execute a script with given variables
     * 
     * @param string $script The script to execute
     * @param array $variables Initial variables
     * @return array Execution result with status, variables, message
     */
    public function execute(string $script, array $variables = []): array {
        // TODO: Parse script to AST
        // For now, return placeholder
        $ast = $this->parse($script);
        
        $result = $this->interpreter->execute($ast, $variables);
        
        return $result->toArray();
    }
    
    /**
     * Resume execution from checkpoint
     * 
     * @param string $checkpointData Serialized checkpoint
     * @return array Execution result
     */
    public function resume(string $checkpointData): array {
        $this->interpreter->setCheckpoint($checkpointData);
        
        // Get cached AST
        $ast = $this->getCachedAST();
        
        $result = $this->interpreter->execute($ast);
        
        return $result->toArray();
    }
    
    /**
     * Register a custom command handler
     * 
     * @param string $command Command name (e.g., 'MESSAGE', 'CUSTOM_ACTION')
     * @param callable $handler Handler function
     */
    public function registerCommand(string $command, callable $handler): void {
        $this->interpreter->registerCommand($command, $handler);
    }
    
    /**
     * Register a custom function
     * 
     * @param string $name Function name
     * @param callable $handler Handler function
     */
    public function registerFunction(string $name, callable $handler): void {
        $this->interpreter->registerFunction($name, $handler);
    }
    
    /**
     * Parse script to AST (placeholder - needs real parser)
     * 
     * @param string $script
     * @return Parser\AST\Node
     */
    private function parse(string $script): Parser\AST\Node {
        // TODO: Implement real parser
        // For now, create simple test AST
        
        // Example: x = 5; MESSAGE "Hello"
        return new Parser\AST\ProgramNode([
            new Parser\AST\AssignmentNode(
                'x',
                new Parser\AST\LiteralNode(5)
            ),
            new Parser\AST\MessageNode(
                new Parser\AST\LiteralNode("Hello from PESM!")
            )
        ]);
    }
    
    private function getCachedAST(): Parser\AST\Node {
        // TODO: Implement AST caching
        throw new \Exception("No cached AST available");
    }
}
