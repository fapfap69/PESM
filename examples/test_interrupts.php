<?php
/**
 * Test: Verifica comportamento interrupt (MESSAGE, ACCEPT, REFUSE)
 */

require_once __DIR__ . '/../src/ScriptEngine.php';

$engine = new PESM\ScriptEngine();

echo "=== TEST 1: Due MESSAGE consecutivi ===\n";
$script1 = '
x = 1
MESSAGE "Step 1"
x = 2
MESSAGE "Step 2"
x = 3
';

$result1 = $engine->execute($script1);
echo "Status: " . $result1['status'] . "\n";
echo "Action: " . ($result1['action'] ?? 'none') . "\n";
echo "Message: " . ($result1['message'] ?? 'none') . "\n";
echo "Variable x: " . ($result1['variables']['x'] ?? 'none') . "\n";
echo "\n";

// ============================================

echo "=== TEST 2: MESSAGE poi ACCEPT ===\n";
$script2 = '
status = "pending"
MESSAGE "Richiesta in attesa"
status = "approved"
ACCEPT "approved"
';

$result2 = $engine->execute($script2);
echo "Status: " . $result2['status'] . "\n";
echo "Action: " . ($result2['action'] ?? 'none') . "\n";
echo "Message: " . ($result2['message'] ?? 'none') . "\n";
echo "Variable status: " . ($result2['variables']['status'] ?? 'none') . "\n";
echo "\n";

// ============================================

echo "=== TEST 3: ACCEPT in IF ===\n";
$script3 = '
amount = 500
IF amount <= 1000
  MESSAGE "Auto-approvato"
  ACCEPT "auto"
ELSE
  MESSAGE "Richiede manager"
END
final = "done"
';

$result3 = $engine->execute($script3);
echo "Status: " . $result3['status'] . "\n";
echo "Action: " . ($result3['action'] ?? 'none') . "\n";
echo "Message: " . ($result3['message'] ?? 'none') . "\n";
echo "Variable final: " . ($result3['variables']['final'] ?? 'not set') . "\n";
echo "\n";

// ============================================

echo "=== TEST 4: REFUSE ===\n";
$script4 = '
score = 45
IF score >= 60
  ACCEPT "passed"
ELSE
  REFUSE "failed"
END
';

$result4 = $engine->execute($script4);
echo "Status: " . $result4['status'] . "\n";
echo "Action: " . ($result4['action'] ?? 'none') . "\n";
echo "ActionData: " . ($result4['actionData'] ?? 'none') . "\n";
echo "\n";
