<?php

require_once __DIR__ . '/../src/ScriptEngine.php';

use PESM\ScriptEngine;

echo "=== PESM GOTO/LABEL Tests ===\n\n";

$engine = new ScriptEngine();
$tests = [
    // Test 1: Simple loop with GOTO
    [
        'name' => 'Simple GOTO loop',
        'script' => '
            x = 0
            loop:
            x = x + 1
            IF x < 5 GOTO loop
            result = x
        ',
        'expected' => ['x' => 5, 'result' => 5]
    ],
    
    // Test 2: Forward jump (skip code)
    [
        'name' => 'Forward GOTO (skip)',
        'script' => '
            x = 1
            GOTO skip
            x = 999
            skip:
            result = x
        ',
        'expected' => ['x' => 1, 'result' => 1]
    ],
    
    // Test 3: Conditional jump
    [
        'name' => 'Conditional GOTO',
        'script' => '
            x = 10
            IF x > 5 GOTO big
            result = 0
            GOTO end
            big:
            result = 1
            end:
        ',
        'expected' => ['x' => 10, 'result' => 1]
    ],
    
    // Test 4: BASIC-style counter
    [
        'name' => 'BASIC-style counter',
        'script' => '
            i = 1
            sum = 0
            start:
            sum = sum + i
            i = i + 1
            IF i <= 10 GOTO start
        ',
        'expected' => ['i' => 11, 'sum' => 55]
    ],
    
    // Test 5: Multiple labels
    [
        'name' => 'Multiple labels',
        'script' => '
            x = 1
            GOTO second
            first:
            x = x + 10
            GOTO end
            second:
            x = x + 100
            GOTO first
            end:
        ',
        'expected' => ['x' => 111]
    ],
    
    // Test 6: Factorial with GOTO
    [
        'name' => 'Factorial with GOTO',
        'script' => '
            n = 5
            result = 1
            i = 1
            loop:
            result = result * i
            i = i + 1
            IF i <= n GOTO loop
        ',
        'expected' => ['n' => 5, 'result' => 120, 'i' => 6]
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
