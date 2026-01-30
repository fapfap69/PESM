<?php
require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/src/Parser/GeneratedParser.php';

$parser = new PESM\Parser\GeneratedParser('x=42');
$result = $parser->match_Assignment();

echo "Keys: " . implode(', ', array_keys($result)) . "\n\n";
foreach ($result as $k => $v) {
    echo "$k: " . (is_array($v) ? json_encode($v) : $v) . "\n";
}
