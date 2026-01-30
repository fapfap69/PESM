<?php
require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/src/Parser/GeneratedParser.php';

$parser = new PESM\Parser\GeneratedParser('x=42');
$result = $parser->match_Program();

echo json_encode($result, JSON_PRETTY_PRINT);
