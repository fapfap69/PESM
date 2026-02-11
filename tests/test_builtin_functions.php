<?php
/**
 * Test Built-in Functions
 */

require_once __DIR__ . '/../src/ScriptEngine.php';

use PESM\ScriptEngine;

echo "=== PESM Built-in Functions Test ===\n\n";

$engine = new ScriptEngine();

// Test 1: String functions
echo "Test 1: String functions\n";
$result = $engine->execute('
    text = "hello world"
    len = LEN(text)
    upper = UPPER(text)
    lower = LOWER("HELLO")
    sub = SUBSTR(text, 0, 5)
');

if ($result['status'] === 'success') {
    echo "  len = " . $result['variables']['len'] . " (expected: 11)\n";
    echo "  upper = " . $result['variables']['upper'] . " (expected: HELLO WORLD)\n";
    echo "  lower = " . $result['variables']['lower'] . " (expected: hello)\n";
    echo "  sub = " . $result['variables']['sub'] . " (expected: hello)\n";
    echo "  ✓ PASSED\n\n";
} else {
    echo "  ✗ FAILED: " . ($result['error'] ?? 'Unknown error') . "\n\n";
}

// Test 2: Math functions
echo "Test 2: Math functions\n";
$result = $engine->execute('
    x = -5
    abs_x = ABS(x)
    sqrt_val = SQRT(16)
    pow_val = POW(2, 3)
    min_val = MIN(5, 3, 8, 1)
    max_val = MAX(5, 3, 8, 1)
');

if ($result['status'] === 'success') {
    echo "  abs(-5) = " . $result['variables']['abs_x'] . " (expected: 5)\n";
    echo "  sqrt(16) = " . $result['variables']['sqrt_val'] . " (expected: 4)\n";
    echo "  pow(2,3) = " . $result['variables']['pow_val'] . " (expected: 8)\n";
    echo "  min = " . $result['variables']['min_val'] . " (expected: 1)\n";
    echo "  max = " . $result['variables']['max_val'] . " (expected: 8)\n";
    echo "  ✓ PASSED\n\n";
} else {
    echo "  ✗ FAILED: " . ($result['error'] ?? 'Unknown error') . "\n\n";
}

// Test 3: Array functions
echo "Test 3: Array functions\n";
$result = $engine->execute('
    arr = [1, 2, 3, 4, 5]
    cnt = COUNT(arr)
    sum = SUM(arr)
    joined = JOIN(arr, "-")
');

if ($result['status'] === 'success') {
    echo "  count = " . $result['variables']['cnt'] . " (expected: 5)\n";
    echo "  sum = " . $result['variables']['sum'] . " (expected: 15)\n";
    echo "  joined = " . $result['variables']['joined'] . " (expected: 1-2-3-4-5)\n";
    echo "  ✓ PASSED\n\n";
} else {
    echo "  ✗ FAILED: " . ($result['error'] ?? 'Unknown error') . "\n\n";
}

// Test 4: Custom command with COMMAND declaration
echo "Test 4: Custom command (with registerCommand)\n";
$engine->registerCommand('DOUBLE', function($args) {
    return $args[0] * 2;
});

$result = $engine->execute('
    COMMAND DOUBLE
    
    x = 21
    doubled = DOUBLE(x)
');

if ($result['status'] === 'success') {
    echo "  DOUBLE(21) = " . $result['variables']['doubled'] . " (expected: 42)\n";
    echo "  ✓ PASSED\n\n";
} else {
    echo "  ✗ FAILED: " . ($result['error'] ?? 'Unknown error') . "\n\n";
}

// Test 5: Type conversion
echo "Test 5: Type conversion\n";
$result = $engine->execute('
    str_val = STR(123)
    int_val = INT("456")
    float_val = FLOAT("3.14")
');

if ($result['status'] === 'success') {
    echo "  STR(123) = '" . $result['variables']['str_val'] . "' (expected: '123')\n";
    echo "  INT('456') = " . $result['variables']['int_val'] . " (expected: 456)\n";
    echo "  FLOAT('3.14') = " . $result['variables']['float_val'] . " (expected: 3.14)\n";
    echo "  ✓ PASSED\n\n";
} else {
    echo "  ✗ FAILED: " . ($result['error'] ?? 'Unknown error') . "\n\n";
}

// Test 6: TIME and TIMESTAMP
echo "Test 6: TIME and TIMESTAMP\n";
$result = $engine->execute('
    t = TIME()
    ts = TIMESTAMP()
');

if ($result['status'] === 'success') {
    echo "  TIME() = " . $result['variables']['t'] . " (Unix timestamp)\n";
    echo "  TIMESTAMP() = " . $result['variables']['ts'] . " (formatted)\n";
    echo "  ✓ PASSED\n\n";
} else {
    echo "  ✗ FAILED: " . ($result['error'] ?? 'Unknown error') . "\n\n";
}

echo "=== All Tests Completed ===\n";
