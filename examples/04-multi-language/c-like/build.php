#!/usr/bin/env php
<?php
require_once __DIR__ . '/../../../vendor/autoload.php';

$pegFile = __DIR__ . '/c-like.peg';
$grammar = file_get_contents($pegFile);

$compiler = new \hafriedlander\Peg\Compiler();
$parserCode = $compiler->compile($grammar);
$wrapped = "<?php\nnamespace CLIKE;\n\nclass CLIKEParser extends \\hafriedlander\\Peg\\Parser\\Packrat {\n" . $parserCode . "\n}\n";
file_put_contents(__DIR__ . '/CLIKEParser.php', $wrapped);

echo "✅ C-LIKE parser generated!\n";
