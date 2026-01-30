<?php
require_once __DIR__ . '/src/ScriptEngine.php';

$engine = new PESM\ScriptEngine();

$tests = [
    'x=ABS(-5)' => 5,
    'x=ROUND(3.7)' => 4,
    'x=FLOOR(3.7)' => 3,
    'x=CEIL(3.2)' => 4,
];

foreach ($tests as $script => $expected) {
    echo "Test: $script\n";
    $result = $engine->execute($script);
    $actual = $result['variables']['x'] ?? null;
    echo "Expected: $expected, Got: $actual\n";
    echo ($actual == $expected ? "✅ PASS" : "❌ FAIL") . "\n\n";
}
