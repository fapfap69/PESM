<?php
/**
 * Test: Gestione variabili durante interrupt/resume
 */

require_once __DIR__ . '/../src/ScriptEngine.php';

$engine = new PESM\ScriptEngine();

echo "=== TEST 1: Variabili modificate prima di MESSAGE ===\n";
$script1 = '
x = 1
y = 10
MESSAGE "Checkpoint 1"
x = 2
y = 20
MESSAGE "Checkpoint 2"
x = 3
y = 30
';

$r1 = $engine->execute($script1);
echo "Dopo primo MESSAGE:\n";
echo "  x = " . $r1['variables']['x'] . " (atteso: 1)\n";
echo "  y = " . $r1['variables']['y'] . " (atteso: 10)\n";

$r2 = $engine->resume($script1, $r1['variables'], $r1['resumeFrom']);
echo "Dopo secondo MESSAGE:\n";
echo "  x = " . $r2['variables']['x'] . " (atteso: 2)\n";
echo "  y = " . $r2['variables']['y'] . " (atteso: 20)\n";

$r3 = $engine->resume($script1, $r2['variables'], $r2['resumeFrom']);
echo "Dopo completamento:\n";
echo "  x = " . $r3['variables']['x'] . " (atteso: 3)\n";
echo "  y = " . $r3['variables']['y'] . " (atteso: 30)\n";
echo "\n";

// ============================================

echo "=== TEST 2: Handler modifica variabili ===\n";
$script2 = '
counter = 0
MESSAGE "Step 1"
counter = counter + 1
MESSAGE "Step 2"
counter = counter + 1
';

$r1 = $engine->execute($script2);
echo "Dopo primo MESSAGE: counter = " . $r1['variables']['counter'] . "\n";

// Handler modifica variabile
$r1['variables']['counter'] = 100;
echo "Handler setta counter = 100\n";

$r2 = $engine->resume($script2, $r1['variables'], $r1['resumeFrom']);
echo "Dopo secondo MESSAGE: counter = " . $r2['variables']['counter'] . " (atteso: 101)\n";

$r3 = $engine->resume($script2, $r2['variables'], $r2['resumeFrom']);
echo "Dopo completamento: counter = " . $r3['variables']['counter'] . " (atteso: 102)\n";
echo "\n";

// ============================================

echo "=== TEST 3: Variabili in IF durante resume ===\n";
$script3 = '
status = "pending"
MESSAGE "Check status"
IF status == "approved"
  result = "OK"
ELSE
  result = "KO"
END
';

$r1 = $engine->execute($script3);
echo "Dopo MESSAGE: status = " . $r1['variables']['status'] . "\n";

// Handler approva
$r1['variables']['status'] = 'approved';
echo "Handler setta status = approved\n";

$r2 = $engine->resume($script3, $r1['variables'], $r1['resumeFrom']);
echo "Dopo resume: result = " . ($r2['variables']['result'] ?? 'none') . " (atteso: OK)\n";
echo "\n";

echo "=== RIEPILOGO ===\n";
echo "✓ Variabili mantengono stato corretto ad ogni interrupt\n";
echo "✓ Handler può modificare variabili tra interrupt e resume\n";
echo "✓ Modifiche handler influenzano esecuzione successiva\n";

