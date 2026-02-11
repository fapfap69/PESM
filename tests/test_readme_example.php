<?php
/**
 * Test README Quick Start example
 */

require_once __DIR__ . '/../src/ScriptEngine.php';

use PESM\ScriptEngine;

echo "=== Testing README Quick Start Example ===\n\n";

$engine = new ScriptEngine();

// Test: Register custom PHP functions (as shown in README)
echo "Test: Custom command with single parameter\n";

$engine->registerCommand('DOUBLE', function($args) {
    return $args[0] * 2;
});

$result = $engine->execute('
    COMMAND DOUBLE
    
    x = 21
    result = DOUBLE(x)
');

if ($result['status'] === 'success' && $result['variables']['result'] == 42) {
    echo "  ✓ PASSED: DOUBLE(21) = " . $result['variables']['result'] . "\n\n";
} else {
    echo "  ✗ FAILED\n";
    if (isset($result['error'])) {
        echo "  Error: " . $result['error'] . "\n";
    }
    echo "\n";
}

echo "=== Test Completed ===\n";
