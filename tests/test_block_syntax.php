<?php

require_once __DIR__ . '/../src/ScriptEngine.php';

use PESM\ScriptEngine;

echo "=== PESM Block Syntax Tests ===\n\n";

$engine = new ScriptEngine();
$tests = [
    // Test 1: C-style braces
    [
        'name' => 'C-style IF with braces',
        'script' => '
            x = 15
            IF x > 10 {
                result = 1
            }
        ',
        'expected' => ['x' => 15, 'result' => 1]
    ],
    
    // Test 2: C-style IF/ELSE
    [
        'name' => 'C-style IF/ELSE with braces',
        'script' => '
            x = 5
            IF x > 10 {
                result = 1
            } ELSE {
                result = 0
            }
        ',
        'expected' => ['x' => 5, 'result' => 0]
    ],
    
    // Test 3: Pascal-style BEGIN/END
    [
        'name' => 'Pascal-style IF with BEGIN/END',
        'script' => '
            x = 15
            IF x > 10 BEGIN
                result = 1
            END
        ',
        'expected' => ['x' => 15, 'result' => 1]
    ],
    
    // Test 4: Pascal-style IF/ELSE
    [
        'name' => 'Pascal-style IF/ELSE',
        'script' => '
            x = 5
            IF x > 10 BEGIN
                result = 1
            END ELSE BEGIN
                result = 0
            END
        ',
        'expected' => ['x' => 5, 'result' => 0]
    ],
    
    // Test 5: PESM original style (still works!)
    [
        'name' => 'PESM original style',
        'script' => '
            x = 15
            IF x > 10
                result = 1
            ELSE
                result = 0
            END
        ',
        'expected' => ['x' => 15, 'result' => 1]
    ],
    
    // Test 6: Nested braces
    [
        'name' => 'Nested braces',
        'script' => '
            x = 15
            y = 20
            IF x > 10 {
                IF y > 15 {
                    result = 2
                } ELSE {
                    result = 1
                }
            }
        ',
        'expected' => ['x' => 15, 'y' => 20, 'result' => 2]
    ],
    
    // Test 7: Multiple statements in block
    [
        'name' => 'Multiple statements in braces',
        'script' => '
            x = 10
            IF x == 10 {
                a = 1
                b = 2
                c = 3
            }
        ',
        'expected' => ['x' => 10, 'a' => 1, 'b' => 2, 'c' => 3]
    ],
    
    // Test 8: Empty blocks
    [
        'name' => 'Empty block',
        'script' => '
            x = 10
            IF x > 5 {
            }
            result = 1
        ',
        'expected' => ['x' => 10, 'result' => 1]
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
