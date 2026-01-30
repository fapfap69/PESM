<?php
require_once __DIR__ . '/src/ScriptEngine.php';

$engine = new PESM\ScriptEngine();

echo "=== Math Functions ===\n";
$tests = [
    'x=5 y=ABS(x)' => 5,
    'x=ROUND(3.7)' => 4,
    'x=FLOOR(3.7)' => 3,
    'x=CEIL(3.2)' => 4,
    'x=SQRT(16)' => 4,
];

foreach ($tests as $script => $expected) {
    $result = $engine->execute($script);
    $actual = $result['variables']['x'] ?? $result['variables']['y'] ?? null;
    echo "$script => $actual ";
    echo ($actual == $expected ? "✅" : "❌") . "\n";
}

echo "\n=== Multi-argument (not yet supported) ===\n";
echo "ROUND(3.7, 2) - requires 2 args support\n";
