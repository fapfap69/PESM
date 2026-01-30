<?php
require_once __DIR__ . '/src/ScriptEngine.php';

$engine = new PESM\ScriptEngine();

$tests = [
    'x=10+5' => 15,
    'x=20-8' => 12,
    'x=3*4' => 12,
    'x=20/4' => 5,
];

foreach ($tests as $script => $expected) {
    echo "Test: $script\n";
    $result = $engine->execute($script);
    $actual = $result['variables']['x'] ?? null;
    echo "Expected: $expected, Got: $actual\n";
    echo ($actual == $expected ? "✅ PASS" : "❌ FAIL") . "\n\n";
}
