<?php
/**
 * PESM - PHP Embedded Scripts Manager
 * Main Script Engine Facade
 * 
 * @author Antonio Franco <antonio.franco@ba.infn.it>
 * @version 1.0.0
 */

namespace PESM;

require_once __DIR__ . '/Bytecode/Compiler.php';
require_once __DIR__ . '/Bytecode/VM.php';
require_once __DIR__ . '/Runtime/Result.php';
require_once __DIR__ . '/Runtime/GlobalContext.php';
require_once __DIR__ . '/Runtime/Commands.php';
require_once __DIR__ . '/Parser/AST/Node.php';
require_once __DIR__ . '/Parser/AST/ProgramNode.php';
require_once __DIR__ . '/Parser/AST/Nodes.php';
require_once __DIR__ . '/Parser/AST/AdditionalNodes.php';

class ScriptEngine {
    private $parser = null;
    private $converter = null;
    private ?Parser\AST\Node $cachedAst = null;
    private ?string $cachedScript = null;
    private ?array $cachedBytecode = null;
    private Runtime\GlobalContext $globalContext;
    private Runtime\Commands $commands;
    
    public function __construct(
        $parser = null, 
        $converter = null,
        ?Runtime\GlobalContext $context = null,
        string $persistenceMode = 'none'
    ) {
        $this->parser = $parser;
        $this->converter = $converter;
        $this->globalContext = $context ?? new Runtime\GlobalContext(null, $persistenceMode);
        $this->commands = new Runtime\Commands();
    }
    
    public function __destruct() {
        // Auto-save on destroy
        $this->globalContext->save();
    }
    
    /**
     * Execute a script with given variables
     * 
     * @param string $script The script to execute
     * @param array $variables Initial variables (merged into globalContext)
     * @param array|null $state VM state for resume
     * @param int|null $resumeFrom PC to resume from (deprecated)
     * @param mixed $returnValue Return value from interrupt
     * @return array Execution result with status, variables, message
     */
    public function execute(
        string $script, 
        array $variables = [], 
        ?array $state = null,
        ?int $resumeFrom = null,
        mixed $returnValue = null
    ): array {
        $oldLevel = error_reporting(E_ERROR | E_PARSE);
        
        // Parse and compile (cache)
        if ($this->cachedScript !== $script) {
            $ast = $this->parse($script);
            $compiler = new Bytecode\Compiler();
            $this->cachedBytecode = $compiler->compile($ast);
            $this->cachedScript = $script;
        }
        
        // Merge variables into globalContext
        $this->globalContext->variables = array_merge(
            $this->globalContext->variables,
            $variables
        );
        
        // State now only contains stack
        if (!$state) {
            $state = ['stack' => [-1, 0]];  // [framePointer, returnAddr]
        }
        
        // Execute via VM
        $vm = new Bytecode\VM();
        $result = $vm->execute($this->cachedBytecode, $this->globalContext, $state, $resumeFrom, $returnValue, $this->commands);
        
        error_reporting($oldLevel);
        return $result->toArray();
    }
    
    /**
     * Resume execution from checkpoint
     * 
     * @param string $script Original script
     * @param array $state VM state from previous interrupt
     * @param mixed $returnValue Return value from interrupt (for INT_VALUE)
     * @param string|null $targetVar Target variable for INPUT
     * @return array Execution result
     */
    public function resume(
        string $script, 
        array $state,
        mixed $returnValue = null,
        ?string $targetVar = null
    ): array {
        // Auto-store per INPUT: se targetVar presente, salva returnValue in globalContext
        if ($returnValue !== null && $targetVar) {
            $this->globalContext->variables[$targetVar] = $returnValue;
        }
        
        // Resume: NO resumeFrom! PC è nello stack
        return $this->execute($script, [], $state, null, $returnValue);
    }
    
    /**
     * Compile script to bytecode without executing
     * Useful for caching compiled scripts
     * 
     * @param string $script Script to compile
     * @return array Compiled bytecode
     */
    public function compile(string $script): array {
        $ast = $this->parse($script);
        $compiler = new Bytecode\Compiler();
        return $compiler->compile($ast);
    }
    
    /**
     * Execute pre-compiled bytecode
     * Skips parsing/compilation for performance
     * 
     * @param array $bytecode Pre-compiled bytecode
     * @param array $variables Initial variables
     * @param array|null $state VM state for resume
     * @param int|null $resumeFrom PC to resume from (deprecated)
     * @param mixed $returnValue Return value from interrupt
     * @return array Execution result
     */
    public function executeFromBytecode(
        array $bytecode,
        array $variables = [],
        ?array $state = null,
        ?int $resumeFrom = null,
        mixed $returnValue = null
    ): array {
        $oldLevel = error_reporting(E_ERROR | E_PARSE);
        
        // Merge variables into globalContext
        $this->globalContext->variables = array_merge(
            $this->globalContext->variables,
            $variables
        );
        
        // State now only contains stack
        if (!$state) {
            $state = ['stack' => [-1, 0]];  // [framePointer, returnAddr]
        }
        
        // Execute via VM
        $vm = new Bytecode\VM();
        $result = $vm->execute($bytecode, $this->globalContext, $state, $resumeFrom, $returnValue, $this->commands);
        
        error_reporting($oldLevel);
        return $result->toArray();
    }
    
    /**
     * Get global context
     * 
     * @return Runtime\GlobalContext
     */
    public function getContext(): Runtime\GlobalContext {
        return $this->globalContext;
    }
    
    /**
     * Register a custom command/function
     * 
     * @param string $name Function name (case-insensitive)
     * @param callable $handler Function handler: fn($args, $context) => mixed
     */
    public function registerCommand(string $name, callable $handler): void {
        $this->commands->register($name, $handler);
    }
    
    /**
     * Parse script to AST using generated parser
     * 
     * @param string $script
     * @return Parser\AST\Node
     */
    private function parse(string $script): Parser\AST\Node {
        // Use custom parser if provided
        if ($this->parser && $this->converter) {
            // Create new parser instance with script
            $parserClass = get_class($this->parser);
            $parser = new $parserClass($script);
            
            // Parse to array
            $result = $parser->match_Program();
            
            if ($result === false) {
                throw new \Exception("Parse error in script");
            }
            
            // Convert array to AST
            return $this->converter->convert($result);
        }
        
        // Load generated parser, ASTBuilder and converter
        $parserFile = __DIR__ . '/Parser/GeneratedParser.php';
        $builderFile = __DIR__ . '/Parser/ASTBuilder.php';
        $converterFile = __DIR__ . '/Parser/ArrayToNodeConverter.php';
        
        if (!file_exists($parserFile)) {
            throw new \Exception(
                "Parser not generated. Run: php bin/build-parser.php"
            );
        }
        
        require_once __DIR__ . '/../vendor/autoload.php';
        require_once $parserFile;
        require_once $builderFile;
        require_once $converterFile;
        
        $parser = new \PESM\Parser\GeneratedParser($script);
        
        // Parse to array
        $result = $parser->match_Program();
        
        if ($result === false) {
            throw new \Exception("Parse error in script");
        }
        
        // Build AST array using ASTBuilder
        $builder = new \PESM\Parser\ASTBuilder();
        $astArray = $builder->build($result);
        
        // Convert array AST to Node objects
        $converter = new \PESM\Parser\ArrayToNodeConverter();
        return $converter->convert($astArray);
    }
}
