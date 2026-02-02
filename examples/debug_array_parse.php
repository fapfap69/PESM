<?php
require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../src/Parser/GeneratedParser.php';

$parser = new PESM\Parser\GeneratedParser('[1, 2, 3]');
$result = $parser->match_ArrayLiteral();

echo "Parse result:\n";
print_r($result);
