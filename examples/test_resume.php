<?php
/**
 * Test: Resume dopo interrupt
 */

require_once __DIR__ . '/../src/ScriptEngine.php';

$engine = new PESM\ScriptEngine();

echo "=== TEST 1: MESSAGE con Resume ===\n";
$script1 = '
x = 1
MESSAGE "Step 1"
x = 2
MESSAGE "Step 2"
x = 3
';

// Prima esecuzione
$result1 = $engine->execute($script1);
echo "Prima esecuzione:\n";
echo "  Status: " . $result1['status'] . "\n";
echo "  Message: " . $result1['message'] . "\n";
echo "  x = " . $result1['variables']['x'] . "\n";
echo "  ResumeFrom: " . $result1['resumeFrom'] . "\n";

// Resume
$result2 = $engine->resume($script1, $result1['variables'], $result1['resumeFrom']);
echo "Dopo resume:\n";
echo "  Status: " . $result2['status'] . "\n";
echo "  Message: " . ($result2['message'] ?? 'none') . "\n";
echo "  x = " . $result2['variables']['x'] . "\n";
echo "  ResumeFrom: " . ($result2['resumeFrom'] ?? 'none') . "\n";

// Resume finale
if ($result2['status'] === 'interrupted') {
    $result3 = $engine->resume($script1, $result2['variables'], $result2['resumeFrom']);
    echo "Dopo secondo resume:\n";
    echo "  Status: " . $result3['status'] . "\n";
    echo "  x = " . $result3['variables']['x'] . "\n";
}
echo "\n";

// ============================================

echo "=== TEST 2: MESSAGE poi ACCEPT (no resume) ===\n";
$script2 = '
status = "pending"
MESSAGE "In attesa"
status = "processing"
ACCEPT "approved"
status = "done"
';

// Prima esecuzione - MESSAGE
$r1 = $engine->execute($script2);
echo "Prima esecuzione (MESSAGE):\n";
echo "  Status: " . $r1['status'] . "\n";
echo "  Message: " . $r1['message'] . "\n";
echo "  status = " . $r1['variables']['status'] . "\n";

// Resume - ACCEPT
$r2 = $engine->resume($script2, $r1['variables'], $r1['resumeFrom']);
echo "Dopo resume (ACCEPT):\n";
echo "  Status: " . $r2['status'] . "\n";
echo "  Action: " . $r2['action'] . "\n";
echo "  ActionData: " . $r2['actionData'] . "\n";
echo "  status = " . $r2['variables']['status'] . "\n";
echo "  (status='done' NON deve essere settato)\n";
echo "\n";

// ============================================

echo "=== TEST 3: ACCEPT immediato (no resume) ===\n";
$script3 = '
x = 100
ACCEPT "immediate"
x = 200
';

$r = $engine->execute($script3);
echo "Status: " . $r['status'] . "\n";
echo "Action: " . $r['action'] . "\n";
echo "x = " . $r['variables']['x'] . " (deve essere 100)\n";
echo "\n";

// ============================================

echo "=== TEST 4: REFUSE immediato (no resume) ===\n";
$script4 = '
score = 30
REFUSE "too_low"
score = 100
';

$r = $engine->execute($script4);
echo "Status: " . $r['status'] . "\n";
echo "Action: " . $r['action'] . "\n";
echo "score = " . $r['variables']['score'] . " (deve essere 30)\n";
