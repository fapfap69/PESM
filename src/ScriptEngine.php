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
require_once __DIR__ . '/Parser/AST/AdditionalNodes.php';

class ScriptEngine {
    private Runtime\Interpreter $interpreter;
    private $parser = null;
    
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
        $oldLevel = error_reporting(E_ERROR | E_PARSE);
        
        // Parse script to AST using generated parser
        $ast = $this->parse($script);
        
        $result = $this->interpreter->execute($ast, $variables);
        
        error_reporting($oldLevel);
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
     * Parse script to AST using generated parser
     * 
     * @param string $script
     * @return Parser\AST\Node
     */
    private function parse(string $script): Parser\AST\Node {
        // Load generated parser and converter
        if (!$this->parser) {
            $parserFile = __DIR__ . '/Parser/GeneratedParser.php';
            $converterFile = __DIR__ . '/Parser/GeneratedConverter.php';
            
            if (!file_exists($parserFile)) {
                throw new \Exception(
                    "Parser not generated. Run: php bin/build-parser.php"
                );
            }
            if (!file_exists($converterFile)) {
                throw new \Exception(
                    "Converter not generated. Run: php bin/build-parser.php"
                );
            }
            
            require_once __DIR__ . '/../vendor/autoload.php';
            require_once $parserFile;
            require_once $converterFile;
        }
        
        $parser = new \PESM\Parser\GeneratedParser($script);
        
        // Parse to array
        $result = $parser->match_Program();
        
        if ($result === false) {
            throw new \Exception("Parse error in script");
        }
        
        // Convert array to AST
        $converter = new \PESM\Parser\GeneratedConverter();
        return $converter->convert($result);
    }
}
