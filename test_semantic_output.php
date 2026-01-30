<?php
require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/src/Parser/GeneratedParser.php';

$tests = [
    'x=42',
    'x=10 y=20',
];

foreach ($tests as $test) {
    echo "Testing: '$test'\n";
    $parser = new PESM\Parser\GeneratedParser($test);
    $result = $parser->match_Program();
    echo json_encode($result, JSON_PRETTY_PRINT) . "\n\n";
}
