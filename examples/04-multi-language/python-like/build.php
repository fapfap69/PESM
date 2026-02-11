#!/usr/bin/env php
<?php
require_once __DIR__ . '/../../../vendor/autoload.php';

$pegFile = __DIR__ . '/python-like.peg';
$grammar = file_get_contents($pegFile);

$compiler = new \hafriedlander\Peg\Compiler();
$parserCode = $compiler->compile($grammar);
$wrapped = "<?php\nnamespace PYTHONLIKE;\n\nclass PYTHONLIKEParser extends \\hafriedlander\\Peg\\Parser\\Packrat {\n" . $parserCode . "\n}\n";
file_put_contents(__DIR__ . '/PYTHONLIKEParser.php', $wrapped);

echo "✅ PYTHON-LIKE parser generated!\n";
