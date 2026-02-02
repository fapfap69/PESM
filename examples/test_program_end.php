<?php
require_once __DIR__ . '/../src/ScriptEngine.php';

$engine = new PESM\ScriptEngine();

echo "=== TEST 1: Fine programma senza interrupt ===\n";
$script1 = '
x = 1
y = 2
z = x + y
';

$r1 = $engine->execute($script1);
echo "Status: " . $r1['status'] . "\n";
echo "Variables: " . json_encode($r1['variables']) . "\n";
echo "Action: " . ($r1['action'] ?? 'none') . "\n";
echo "Message: " . ($r1['message'] ?? 'none') . "\n";
echo "\n";

echo "=== TEST 2: Programma con MESSAGE finale ===\n";
$script2 = '
x = 10
MESSAGE "Done"
';

$r2 = $engine->execute($script2);
echo "Status: " . $r2['status'] . "\n";
echo "Action: " . $r2['action'] . "\n";
echo "Message: " . $r2['message'] . "\n";
echo "\n";

echo "=== TEST 3: Programma con ACCEPT finale ===\n";
$script3 = '
x = 20
ACCEPT "completed"
';

$r3 = $engine->execute($script3);
echo "Status: " . $r3['status'] . "\n";
echo "Action: " . $r3['action'] . "\n";
echo "ActionData: " . $r3['actionData'] . "\n";
echo "\n";

echo "=== TEST 4: MESSAGE poi codice poi fine ===\n";
$script4 = '
x = 1
MESSAGE "Step 1"
x = 2
';

$r4a = $engine->execute($script4);
echo "Prima esecuzione:\n";
echo "  Status: " . $r4a['status'] . "\n";
echo "  x: " . $r4a['variables']['x'] . "\n";

$r4b = $engine->resume($script4, $r4a['variables'], $r4a['resumeFrom']);
echo "Dopo resume:\n";
echo "  Status: " . $r4b['status'] . "\n";
echo "  x: " . $r4b['variables']['x'] . "\n";
echo "  Action: " . ($r4b['action'] ?? 'none') . "\n";
