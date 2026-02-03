#!/usr/bin/env php
<?php
require_once __DIR__ . '/../../../vendor/autoload.php';
require_once __DIR__ . '/../../../src/Parser/GrammarAnalyzer.php';
require_once __DIR__ . '/../../../src/Parser/ConverterGenerator.php';

use PESM\Parser\GrammarAnalyzer;
use PESM\Parser\ConverterGenerator;

$lang = basename(__DIR__);
$langUpper = strtoupper($lang);
$pegFile = __DIR__ . "/{$lang}.peg";

if (!file_exists($pegFile)) {
    echo "❌ Grammar file not found: {$pegFile}\n";
    exit(1);
}

echo "Building {$langUpper} parser...\n";

$grammar = file_get_contents($pegFile);

// Generate parser
$compiler = new \hafriedlander\Peg\Compiler();
$parserCode = $compiler->compile($grammar);
$wrapped = "<?php\nnamespace " . $langUpper . ";\n\nclass GeneratedParser extends \\hafriedlander\\Peg\\Parser\\Packrat {\n" . $parserCode . "\n}\n";
file_put_contents(__DIR__ . "/{$langUpper}Parser.php", $wrapped);

// Generate converter
$analyzer = new GrammarAnalyzer($pegFile);
$metadata = $analyzer->analyze();
$generator = new ConverterGenerator($metadata);
$converter = $generator->generate();
$converter = str_replace('namespace PESM\\Parser;', "namespace {$langUpper};", $converter);
file_put_contents(__DIR__ . "/{$langUpper}Converter.php", $converter);

echo "✅ {$langUpper} parser generated!\n";
