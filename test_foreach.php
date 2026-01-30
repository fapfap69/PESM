<?php
require_once __DIR__ . '/src/ScriptEngine.php';

$engine = new PESM\ScriptEngine();

echo "Test FOREACH:\n";
$result = $engine->execute('sum=0 FOREACH i=1 TO 5 sum=sum+i END');
echo "sum: " . ($result['variables']['sum'] ?? 'not set') . "\n";
echo "Expected: 15 (1+2+3+4+5)\n";
echo ($result['variables']['sum'] == 15 ? "✅ PASS" : "❌ FAIL") . "\n\n";
