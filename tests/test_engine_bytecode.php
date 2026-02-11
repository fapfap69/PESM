<?php
/**
 * Test ScriptEngine with Bytecode VM
 */

require_once __DIR__ . '/../src/ScriptEngine.php';

echo "=== PESM Bytecode VM Integration Test ===\n\n";

$engine = new PESM\ScriptEngine();

// Test 1: Simple execution
echo "Test 1: Simple execution\n";
$result = $engine->execute('
    x = 10
    y = 20
    z = x + y
');
echo "Status: {$result['status']}\n";
echo "Variables: " . json_encode($result['variables']) . "\n\n";

// Test 2: IF statement
echo "Test 2: IF statement\n";
$result = $engine->execute('
    age = 25
    IF age >= 18
        status = "adult"
    ELSE
        status = "minor"
    END
');
echo "Status: {$result['status']}\n";
echo "Variables: " . json_encode($result['variables']) . "\n\n";

// Test 3: FOREACH loop
echo "Test 3: FOREACH loop\n";
$result = $engine->execute('
    items = [1, 2, 3, 4, 5]
    sum = 0
    FOREACH item IN items
        sum = sum + item
    END
');
echo "Status: {$result['status']}\n";
echo "Variables: " . json_encode($result['variables']) . "\n\n";

// Test 4: WHILE loop
echo "Test 4: WHILE loop\n";
$result = $engine->execute('
    counter = 0
    WHILE counter < 5
        counter = counter + 1
    END
');
echo "Status: {$result['status']}\n";
echo "Variables: " . json_encode($result['variables']) . "\n\n";

// Test 5: Interrupt (MESSAGE)
echo "Test 5: Interrupt (MESSAGE)\n";
$result = $engine->execute('
    name = "Mario"
    MESSAGE "Hello " + name
    age = 30
');
echo "Status: {$result['status']}\n";
echo "Action: {$result['action']}\n";
echo "ActionData: {$result['actionData']}\n";
echo "ResumeFrom: {$result['resumeFrom']}\n";
echo "ExpectsReturn: " . ($result['expectsReturn'] ? 'true' : 'false') . "\n\n";

// Test 6: Resume after interrupt
echo "Test 6: Resume after interrupt\n";
$result2 = $engine->resume(
    'name = "Mario"
    MESSAGE "Hello " + name
    age = 30',
    $result['state'],
    null  // No returnValue
);
echo "Status: {$result2['status']}\n";
echo "Variables: " . json_encode($result2['variables']) . "\n\n";

// Test 7: Array access
echo "Test 7: Array access\n";
$result = $engine->execute('
    matrix = [[1, 2], [3, 4]]
    value = matrix[0][1]
');
echo "Status: {$result['status']}\n";
echo "Variables: " . json_encode($result['variables']) . "\n\n";

// Test 8: GOTO
echo "Test 8: GOTO\n";
$result = $engine->execute('
    x = 1
    GOTO skip
    x = 999
    skip:
    x = x + 10
');
echo "Status: {$result['status']}\n";
echo "Variables: " . json_encode($result['variables']) . "\n\n";

echo "=== All Tests Completed ===\n";
