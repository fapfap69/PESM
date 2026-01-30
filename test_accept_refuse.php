<?php
require_once __DIR__ . '/src/ScriptEngine.php';

$engine = new PESM\ScriptEngine();

echo "Test ACCEPT:\n";
$result = $engine->execute('ACCEPT "approved"');
echo "action: " . ($result['action'] ?? 'not set') . "\n";
echo ($result['action'] === 'accept' ? "✅ PASS" : "❌ FAIL") . "\n\n";

echo "Test REFUSE:\n";
$result = $engine->execute('REFUSE "rejected"');
echo "action: " . ($result['action'] ?? 'not set') . "\n";
echo ($result['action'] === 'refuse' ? "✅ PASS" : "❌ FAIL") . "\n\n";
