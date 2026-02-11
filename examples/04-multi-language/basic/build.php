#!/usr/bin/env php
<?php
require_once __DIR__ . '/../../../vendor/autoload.php';

echo "Building BASIC parser...\n";

$grammarFile = __DIR__ . '/basic.peg';
$outputFile = __DIR__ . '/BASICParser.php';

if (!file_exists($grammarFile)) {
    die("Error: Grammar file not found: $grammarFile\n");
}

$grammar = file_get_contents($grammarFile);

$compiler = new \hafriedlander\Peg\Compiler();
$parserCode = $compiler->compile($grammar);
$wrapped = "<?php\nnamespace BASIC;\n\nclass BASICParser extends \\hafriedlander\\Peg\\Parser\\Packrat {\n" . $parserCode . "\n}\n";
file_put_contents($outputFile, $wrapped);

echo "✅ BASIC parser generated: $outputFile\n";
