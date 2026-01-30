<?php
require_once __DIR__ . '/src/ScriptEngine.php';

$engine = new PESM\ScriptEngine();

echo "Test 1: IF true\n";
$result = $engine->execute('age=25 IF age>=18 status=1 END');
echo "status: " . ($result['variables']['status'] ?? 'not set') . "\n";
echo ($result['variables']['status'] == 1 ? "✅ PASS" : "❌ FAIL") . "\n\n";

echo "Test 2: IF false\n";
$result = $engine->execute('age=15 IF age>=18 status=1 END');
echo "status: " . ($result['variables']['status'] ?? 'not set') . "\n";
echo (!isset($result['variables']['status']) ? "✅ PASS" : "❌ FAIL") . "\n\n";

echo "Test 3: IF/ELSE true\n";
$result = $engine->execute('age=25 IF age>=18 status=1 ELSE status=0 END');
echo "status: " . ($result['variables']['status'] ?? 'not set') . "\n";
echo ($result['variables']['status'] == 1 ? "✅ PASS" : "❌ FAIL") . "\n\n";

echo "Test 4: IF/ELSE false\n";
$result = $engine->execute('age=15 IF age>=18 status=1 ELSE status=0 END');
echo "status: " . ($result['variables']['status'] ?? 'not set') . "\n";
echo ($result['variables']['status'] == 0 ? "✅ PASS" : "❌ FAIL") . "\n\n";
