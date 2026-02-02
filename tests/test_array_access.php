<?php

require_once __DIR__ . '/../src/ScriptEngine.php';

use PESM\ScriptEngine;

echo "=== PESM Array Access Tests ===\n\n";

$engine = new ScriptEngine();
$tests = [
    // Test 1: Simple array access
    [
        'name' => 'Simple array access',
        'script' => '
            arr = [10, 20, 30]
            value = arr[0]
        ',
        'expected' => ['arr' => [10, 20, 30], 'value' => 10]
    ],
    
    // Test 2: Access middle element
    [
        'name' => 'Access middle element',
        'script' => '
            arr = [10, 20, 30]
            value = arr[1]
        ',
        'expected' => ['arr' => [10, 20, 30], 'value' => 20]
    ],
    
    // Test 3: Access last element
    [
        'name' => 'Access last element',
        'script' => '
            arr = [10, 20, 30]
            value = arr[2]
        ',
        'expected' => ['arr' => [10, 20, 30], 'value' => 30]
    ],
    
    // Test 4: Nested array access (matrix)
    [
        'name' => 'Nested array access',
        'script' => '
            matrix = [[1, 2], [3, 4]]
            value = matrix[0][1]
        ',
        'expected' => ['matrix' => [[1, 2], [3, 4]], 'value' => 2]
    ],
    
    // Test 5: Access with variable index
    [
        'name' => 'Variable index',
        'script' => '
            arr = [10, 20, 30]
            i = 1
            value = arr[i]
        ',
        'expected' => ['arr' => [10, 20, 30], 'i' => 1, 'value' => 20]
    ],
    
    // Test 6: Access with expression index
    [
        'name' => 'Expression index',
        'script' => '
            arr = [10, 20, 30, 40]
            value = arr[1 + 1]
        ',
        'expected' => ['arr' => [10, 20, 30, 40], 'value' => 30]
    ],
    
    // Test 7: Array access in expression
    [
        'name' => 'Array access in expression',
        'script' => '
            arr = [10, 20, 30]
            result = arr[0] + arr[1]
        ',
        'expected' => ['arr' => [10, 20, 30], 'result' => 30]
    ],
    
    // Test 8: String array access
    [
        'name' => 'String array access',
        'script' => '
            names = ["Mario", "Luigi", "Peach"]
            name = names[1]
        ',
        'expected' => ['names' => ["Mario", "Luigi", "Peach"], 'name' => "Luigi"]
    ],
    
    // Test 9: 3D array access
    [
        'name' => '3D array access',
        'script' => '
            cube = [[[1, 2], [3, 4]], [[5, 6], [7, 8]]]
            value = cube[1][0][1]
        ',
        'expected' => ['cube' => [[[1, 2], [3, 4]], [[5, 6], [7, 8]]], 'value' => 6]
    ],
    
    // Test 10: Array access in loop
    [
        'name' => 'Array access in loop',
        'script' => '
            arr = [10, 20, 30]
            sum = 0
            FOREACH i = 0 TO 2
                sum = sum + arr[i]
            END
        ',
        'expected' => ['arr' => [10, 20, 30], 'sum' => 60, 'i' => 2]
    ],
];

$passed = 0;
$failed = 0;

foreach ($tests as $i => $test) {
    echo ($i + 1) . ". {$test['name']}\n";
    
    try {
        $result = $engine->execute($test['script']);
        
        if ($result['status'] === 'completed' || $result['status'] === 'success') {
            $match = true;
            foreach ($test['expected'] as $key => $expectedValue) {
                if (!isset($result['variables'][$key]) || $result['variables'][$key] !== $expectedValue) {
                    $match = false;
                    echo "   ❌ FAILED: Expected $key = " . json_encode($expectedValue) . 
                         ", got " . json_encode($result['variables'][$key] ?? 'undefined') . "\n";
                    break;
                }
            }
            
            if ($match) {
                echo "   ✅ PASSED\n";
                $passed++;
            } else {
                $failed++;
            }
        } else {
            echo "   ❌ FAILED: Status = {$result['status']}\n";
            if (isset($result['error'])) {
                echo "   Error: {$result['error']}\n";
            }
            $failed++;
        }
    } catch (Exception $e) {
        echo "   ❌ EXCEPTION: " . $e->getMessage() . "\n";
        $failed++;
    }
    
    echo "\n";
}

echo "=== Results ===\n";
echo "Passed: $passed\n";
echo "Failed: $failed\n";
echo "Total:  " . ($passed + $failed) . "\n";
