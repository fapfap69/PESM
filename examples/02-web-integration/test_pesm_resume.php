<?php
require_once __DIR__ . '/../../vendor/autoload.php';
require_once __DIR__ . '/../../src/ScriptEngine.php';

$script = '
x = 1
MESSAGE "First"
x = x + 1
MESSAGE "Second"
x = x + 1
MESSAGE "Third"
';

echo "=== Test PESM Interrupt/Resume ===\n\n";

$engine = new PESM\ScriptEngine();
$result = $engine->execute($script);

echo "Iteration 0: status=" . $result['status'] . ", message=" . ($result['message'] ?? 'null') . ", x=" . ($result['variables']['x'] ?? '?') . "\n";

$iteration = 1;
while ($result['status'] === 'interrupted' && $iteration < 10) {
    $result = $engine->resume($script, $result['variables'], $result['resumeFrom']);
    echo "Iteration $iteration: status=" . $result['status'] . ", message=" . ($result['message'] ?? 'null') . ", x=" . ($result['variables']['x'] ?? '?') . "\n";
    $iteration++;
}

echo "\nExpected: First (x=1), Second (x=2), Third (x=3)\n";
echo "Final x = " . ($result['variables']['x'] ?? '?') . "\n";
