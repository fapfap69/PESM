#!/usr/bin/env php
<?php
/**
 * PESM Parser Builder
 * 
 * Validates PEG grammar, generates parser and editor artifacts
 * 
 * Usage: 
 *   php bin/build-parser.php [--source-path=path/to/grammar.peg] [--install] [--test]
 * 
 * Options:
 *   --source-path=PATH   Path to PEG grammar file (default: grammar/pesm.peg)
 *   --install            Install generated parser files to src/Parser/ (for component development)
 *   --test               Run parser tests after generation
 * 
 * Output:
 *   Always generates in grammar directory:
 *     - parser/GeneratedParser.php
 *     - parser/GeneratedConverter.php  
 *     - editor/monarch.generated.js
 *     - editor/validate.php
 *     - editor/index.html
 *     - editor/editor.js
 * 
 *   With --install flag:
 *     - Copies parser files to src/Parser/ (for PESM component itself)
 */

error_reporting(E_ERROR | E_PARSE);

require_once __DIR__ . '/../vendor/autoload.php';

use PESM\Parser\ParserBuilder;

// Colors for terminal output
class Console {
    const GREEN = "\033[32m";
    const RED = "\033[31m";
    const YELLOW = "\033[33m";
    const BLUE = "\033[34m";
    const RESET = "\033[0m";
    
    public static function success(string $msg): void {
        echo self::GREEN . "✓ " . $msg . self::RESET . PHP_EOL;
    }
    
    public static function error(string $msg): void {
        echo self::RED . "✗ " . $msg . self::RESET . PHP_EOL;
    }
    
    public static function info(string $msg): void {
        echo self::BLUE . "ℹ " . $msg . self::RESET . PHP_EOL;
    }
    
    public static function warning(string $msg): void {
        echo self::YELLOW . "⚠ " . $msg . self::RESET . PHP_EOL;
    }
}

// Parse command line arguments
$sourcePath = null;
$installMode = false;
$testMode = false;

foreach ($argv as $arg) {
    if (strpos($arg, '--source-path=') === 0) {
        $sourcePath = substr($arg, strlen('--source-path='));
    } elseif ($arg === '--install') {
        $installMode = true;
    } elseif ($arg === '--test') {
        $testMode = true;
    }
}

// Default source path
if (!$sourcePath) {
    $sourcePath = __DIR__ . '/../grammar/pesm.peg';
}

// Validate source path
if (!file_exists($sourcePath)) {
    Console::error("Grammar file not found: $sourcePath");
    exit(1);
}

$grammarDir = dirname($sourcePath);
$parserOutDir = $grammarDir . '/parser';
$editorOutDir = $grammarDir . '/editor';

// Main execution
try {
    Console::info("PESM Parser Builder v1.0");
    Console::info("Source: $sourcePath");
    echo PHP_EOL;
    
    $builder = new ParserBuilder(__DIR__ . '/..');
    
    // Step 1: Validate PEG
    Console::info("Validating PEG grammar...");
    if (!$builder->validatePEG()) {
        Console::error("PEG validation failed");
        exit(1);
    }
    Console::success("PEG grammar is valid");
    
    // Step 2: Generate parser from PEG (to src/Parser/ temporarily)
    Console::info("Generating parser from PEG...");
    if (!$builder->generateParser()) {
        Console::error("Parser generation failed");
        exit(1);
    }
    Console::success("Parser generated successfully");
    
    // Step 3: Analyze grammar and generate converter
    Console::info("Analyzing grammar metadata...");
    if (!$builder->generateConverter()) {
        Console::error("Converter generation failed");
        exit(1);
    }
    Console::success("Converter generated successfully");
    
    // Step 4: Copy parser files to grammar/parser/
    Console::info("Copying parser files to grammar/parser/...");
    if (!is_dir($parserOutDir)) {
        mkdir($parserOutDir, 0755, true);
    }
    
    $srcParser = __DIR__ . '/../src/Parser/GeneratedParser.php';
    $srcConverter = __DIR__ . '/../src/Parser/GeneratedConverter.php';
    $dstParser = $parserOutDir . '/GeneratedParser.php';
    $dstConverter = $parserOutDir . '/GeneratedConverter.php';
    
    if (file_exists($srcParser)) {
        copy($srcParser, $dstParser);
    }
    if (file_exists($srcConverter)) {
        copy($srcConverter, $dstConverter);
    }
    Console::success("Parser files copied to grammar/parser/");
    
    // Step 5: Generate editor artifacts
    Console::info('Generating editor artifacts...');
    try {
        $gen = new PESM\Parser\MonarchGenerator($sourcePath);
        $gen->generate($editorOutDir);
        Console::success('Editor artifacts generated in grammar/editor/');
    } catch (Exception $e) {
        Console::warning('Failed to generate editor artifacts: ' . $e->getMessage());
    }
    
    // Step 5.5: Generate test script
    Console::info('Generating comprehensive test script...');
    try {
        $testGen = new PESM\Parser\TestScriptGenerator($sourcePath);
        $testScript = $testGen->generate();
        
        // Determine file extension from grammar filename
        $grammarName = pathinfo($sourcePath, PATHINFO_FILENAME);
        $testFile = $grammarDir . '/comprehensive_test.' . $grammarName;
        
        file_put_contents($testFile, $testScript);
        Console::success("Test script generated: $testFile");
    } catch (Exception $e) {
        Console::warning('Failed to generate test script: ' . $e->getMessage());
    }
    
    // Step 6: Install to src/Parser/ if --install flag
    if (!$installMode) {
        // Remove from src/Parser/ if not installing
        if (file_exists($srcParser)) {
            unlink($srcParser);
        }
        if (file_exists($srcConverter)) {
            unlink($srcConverter);
        }
        Console::info("Parser files NOT installed to src/Parser/ (use --install to install)");
    } else {
        Console::success("Parser files installed to src/Parser/");
    }
    
    // Step 7: Test parser (optional)
    if ($testMode) {
        Console::info("Testing generated parser...");
        if (!$builder->testParser()) {
            Console::warning("Parser tests failed (parser may still work)");
        } else {
            Console::success("Parser tests passed");
        }
    }
    
    echo PHP_EOL;
    Console::success("Build completed!");
    Console::info("Generated files:");
    Console::info("  - $parserOutDir/GeneratedParser.php");
    Console::info("  - $parserOutDir/GeneratedConverter.php");
    Console::info("  - $editorOutDir/monarch.generated.js");
    Console::info("  - $editorOutDir/validate.php");
    Console::info("  - $editorOutDir/index.html");
    Console::info("  - $editorOutDir/editor.js");
    
    $grammarName = pathinfo($sourcePath, PATHINFO_FILENAME);
    Console::info("  - $grammarDir/comprehensive_test.$grammarName");
    
    if ($installMode) {
        Console::info("  - src/Parser/GeneratedParser.php (installed)");
        Console::info("  - src/Parser/GeneratedConverter.php (installed)");
    }
    
} catch (Exception $e) {
    echo PHP_EOL;
    Console::error("Build failed: " . $e->getMessage());
    exit(1);
}
