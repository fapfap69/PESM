<?php
require_once __DIR__ . '/src/ScriptEngine.php';

$engine = new PESM\ScriptEngine();

$tests = [
    'x=10>5' => true,
    'x=10<5' => false,
    'x=10==10' => true,
    'x=10!=5' => true,
    'x=10>=10' => true,
    'x=5<=10' => true,
];

foreach ($tests as $script => $expected) {
    echo "Test: $script\n";
    $result = $engine->execute($script);
    $actual = $result['variables']['x'] ?? null;
    $match = ($actual == $expected) || ($actual === 1 && $expected === true) || ($actual === 0 && $expected === false);
    echo "Expected: " . ($expected ? 'true' : 'false') . ", Got: $actual\n";
    echo ($match ? "✅ PASS" : "❌ FAIL") . "\n\n";
}
