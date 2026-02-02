<?php
require_once __DIR__ . '/../src/ScriptEngine.php';

$engine = new PESM\ScriptEngine();

echo "Test 1: Array vuoto\n";
try {
    $r = $engine->execute('items = []');
    echo "  OK: " . json_encode($r['variables']['items']) . "\n";
} catch (Exception $e) {
    echo "  ERRORE: " . $e->getMessage() . "\n";
}

echo "\nTest 2: Array con numeri\n";
try {
    $r = $engine->execute('items = [1, 2, 3]');
    echo "  OK: " . json_encode($r['variables']['items']) . "\n";
} catch (Exception $e) {
    echo "  ERRORE: " . $e->getMessage() . "\n";
}

echo "\nTest 3: Array con stringhe\n";
try {
    $r = $engine->execute('items = ["a", "b"]');
    echo "  OK: " . json_encode($r['variables']['items']) . "\n";
} catch (Exception $e) {
    echo "  ERRORE: " . $e->getMessage() . "\n";
}

echo "\nTest 4: Variabile esistente\n";
try {
    $r = $engine->execute('x = 1');
    echo "  OK: x = " . $r['variables']['x'] . "\n";
} catch (Exception $e) {
    echo "  ERRORE: " . $e->getMessage() . "\n";
}
