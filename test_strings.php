<?php
require_once __DIR__ . '/src/ScriptEngine.php';

$engine = new PESM\ScriptEngine();

$tests = [
    'MESSAGE "Hello"' => 'Hello',
    'MESSAGE "Hello World"' => 'Hello World',
    'MESSAGE ""' => '',
];

foreach ($tests as $script => $expected) {
    echo "Test: $script\n";
    $result = $engine->execute($script);
    $actual = $result['message'] ?? null;
    echo "Expected: '$expected', Got: '$actual'\n";
    echo ($actual === $expected ? "✅ PASS" : "❌ FAIL") . "\n\n";
}
