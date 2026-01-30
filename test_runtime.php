<?php
require_once __DIR__ . '/src/ScriptEngine.php';

$engine = new PESM\ScriptEngine();

// Test 1: Simple assignment
echo "Test 1: Assignment\n";
$result = $engine->execute('x=42');
echo "Status: {$result['status']}\n";
echo "Variables: " . json_encode($result['variables']) . "\n\n";

// Test 2: Multiple assignments
echo "Test 2: Multiple\n";
$result = $engine->execute('x=10 y=20');
echo "Status: {$result['status']}\n";
echo "Variables: " . json_encode($result['variables']) . "\n\n";

echo "✅ Runtime OK!\n";
