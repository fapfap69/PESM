#!/usr/bin/env php
<?php
require_once __DIR__ . '/../../../vendor/autoload.php';

$pegFile = __DIR__ . '/fortran.peg';
$grammar = file_get_contents($pegFile);

$compiler = new \hafriedlander\Peg\Compiler();
$parserCode = $compiler->compile($grammar);
$wrapped = "<?php\nnamespace FORTRAN;\n\nclass FORTRANParser extends \\hafriedlander\\Peg\\Parser\\Packrat {\n" . $parserCode . "\n}\n";
file_put_contents(__DIR__ . '/FORTRANParser.php', $wrapped);

echo "✅ FORTRAN parser generated!\n";
