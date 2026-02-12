#!/usr/bin/env php
<?php
/**
 * PESM Parser Builder
 * 
 * Validates BNF grammar, converts to PEG, generates parser
 * 
 * Usage: php bin/build-parser.php [--test]
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

// Main execution
try {
    Console::info("PESM Parser Builder v1.0");
    echo PHP_EOL;
    
    $builder = new ParserBuilder(__DIR__ . '/..');
    $testMode = in_array('--test', $argv);
    $editorMode = in_array('--editor', $argv);
    
    // Step 1: Validate PEG
    Console::info("Validating PEG grammar...");
    if (!$builder->validatePEG()) {
        Console::error("PEG validation failed");
        exit(1);
    }
    Console::success("PEG grammar is valid");
    
    // Step 2: Generate parser from PEG
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
    
    // Step 4: Test parser (optional)
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
    Console::info("  - src/Parser/GeneratedParser.php");
    Console::info("  - src/Parser/GeneratedConverter.php");

    if ($editorMode) {
        Console::info('Generating editor artifacts...');
        // generate Monarch + editor scaffold
        $grammar = __DIR__ . '/../grammar/pesm.peg';
        $out = __DIR__ . '/../examples/editor';
        try {
            $gen = new PESM\Parser\MonarchGenerator($grammar);
            $gen->generate($out);
            Console::success('Editor artifacts generated in examples/editor/');
        } catch (Exception $e) {
            Console::warning('Failed to generate editor artifacts: ' . $e->getMessage());
        }
    }
    
} catch (Exception $e) {
    echo PHP_EOL;
    Console::error("Build failed: " . $e->getMessage());
    exit(1);
}
