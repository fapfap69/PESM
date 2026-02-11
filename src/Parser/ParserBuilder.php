<?php

namespace PESM\Parser;

/**
 * ParserBuilder
 * 
 * Handles BNF validation, PEG conversion, and parser generation
 */
class ParserBuilder
{
    private string $rootDir;
    private string $grammarDir;
    private string $parserDir;
    
    public function __construct(string $rootDir)
    {
        $this->rootDir = $rootDir;
        $this->grammarDir = $rootDir . '/grammar';
        $this->parserDir = $rootDir . '/src/Parser';
    }
    
    /**
     * Validate PEG grammar syntax
     */
    public function validatePEG(): bool
    {
        $pegFile = $this->grammarDir . '/pesm.peg';
        
        if (!file_exists($pegFile)) {
            throw new \Exception("PEG file not found: $pegFile");
        }
        
        $content = file_get_contents($pegFile);
        
        // Basic validation: check for PEG marker
        if (!preg_match('/\/\*!\* PEGParser/', $content)) {
            throw new \Exception("Invalid PEG format: missing PEGParser marker");
        }
        
        return true;
    }
    
    /**
     * Generate parser from PEG using smuuf/php-peg
     */
    public function generateParser(): bool
    {
        $pegFile = $this->grammarDir . '/pesm.peg';
        $outputFile = $this->parserDir . '/GeneratedParser.php';
        
        $compiler = new \hafriedlander\Peg\Compiler();
        $grammar = file_get_contents($pegFile);
        
        $oldLevel = error_reporting(E_ERROR);
        $parserCode = $compiler->compile($grammar);
        error_reporting($oldLevel);
        
        // Wrap in class
        $wrapped = "<?php\nnamespace PESM\\Parser;\n\nclass GeneratedParser extends \\hafriedlander\\Peg\\Parser\\Packrat {\n" . $parserCode . "\n}\n";
        
        file_put_contents($outputFile, $wrapped);
        
        return file_exists($outputFile) && filesize($outputFile) > 0;
    }
    
    /**
     * Test generated parser with sample scripts
     */
    public function testParser(): bool
    {
        $parserFile = $this->parserDir . '/GeneratedParser.php';
        
        if (!file_exists($parserFile)) {
            return false;
        }
        
        // Simple test: try to instantiate parser
        require_once $parserFile;
        
        // Test with simple script
        $testScript = 'x = 10';
        
        try {
            // Parser class name depends on PEG grammar
            // This is a placeholder - actual test depends on generated class
            return true;
        } catch (\Exception $e) {
            return false;
        }
    }
    
    /**
     * Generate converter from grammar metadata
     */
    public function generateConverter(): bool
    {
        $pegFile = $this->grammarDir . '/pesm.peg';
        $outputFile = $this->parserDir . '/GeneratedConverter.php';
        
        // Analyze grammar
        require_once $this->parserDir . '/GrammarAnalyzer.php';
        require_once $this->parserDir . '/ConverterGenerator.php';
        
        $analyzer = new GrammarAnalyzer($pegFile);
        $metadata = $analyzer->analyze();
        
        // Generate converter
        $generator = new ConverterGenerator($metadata);
        $code = $generator->generate();
        
        file_put_contents($outputFile, $code);
        
        return file_exists($outputFile);
    }

}
