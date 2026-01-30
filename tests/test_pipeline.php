<?php
/**
 * Test PESM Complete Pipeline
 */

require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../src/ScriptEngine.php';

echo "=== PESM Pipeline Test ===\n\n";

try {
    $engine = new \PESM\ScriptEngine();
    
    // Test 1: Simple assignment
    echo "Test 1: Simple assignment\n";
    $script1 = "x = 10";
    $result1 = $engine->execute($script1);
    echo "Script: $script1\n";
    echo "Result: " . json_encode($result1, JSON_PRETTY_PRINT) . "\n\n";
    
    // Test 2: Arithmetic
    echo "Test 2: Arithmetic\n";
    $script2 = "y = 5 + 3";
    $result2 = $engine->execute($script2);
    echo "Script: $script2\n";
    echo "Result: " . json_encode($result2, JSON_PRETTY_PRINT) . "\n\n";
    
    // Test 3: MESSAGE
    echo "Test 3: MESSAGE command\n";
    $script3 = 'MESSAGE "Hello PESM"';
    $result3 = $engine->execute($script3);
    echo "Script: $script3\n";
    echo "Result: " . json_encode($result3, JSON_PRETTY_PRINT) . "\n\n";
    
    echo "✓ All tests completed!\n";
    
} catch (Exception $e) {
    echo "✗ Error: " . $e->getMessage() . "\n";
    echo "Stack trace:\n" . $e->getTraceAsString() . "\n";
    exit(1);
}
