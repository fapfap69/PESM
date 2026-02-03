<?php
require_once __DIR__ . '/../../vendor/autoload.php';
require_once __DIR__ . '/../languages/basic/BASICParser.php';

$script = "SUM = 0";

$parser = new BASIC\GeneratedParser($script);
$parseResult = $parser->match_Program();

$stmt = $parseResult['statements'][0];
echo "Statement _matchrule: " . ($stmt['_matchrule'] ?? '?') . "\n";
echo "Statement has node: " . (isset($stmt['node']) ? 'YES' : 'NO') . "\n";
if (isset($stmt['node'])) {
    $node = $stmt['node'];
    echo "Node _matchrule: " . ($node['_matchrule'] ?? '?') . "\n";
    echo "Node keys: " . implode(', ', array_keys($node)) . "\n";
}
