<?php
require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/src/Parser/GeneratedParser.php';

$parser = new PESM\Parser\GeneratedParser('10+5');
$result = $parser->match_Expression();

echo json_encode($result, JSON_PRETTY_PRINT);
