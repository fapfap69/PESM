<?php
/**
 * PESM Example 03: Arrays and Loops
 * Demonstrates arrays, FOREACH, WHILE, and STRUCT
 */

require_once __DIR__ . '/../../vendor/autoload.php';

use PESM\ScriptEngine;

$engine = new ScriptEngine();

$script = '
    // Arrays
    numbers = [1, 2, 3, 4, 5]
    matrix = [[10, 20], [30, 40]]
    
    // FOREACH with array
    sum = 0
    FOREACH num IN numbers
        sum = sum + num
    END
    MESSAGE "Sum of numbers: " + sum
    
    // FOREACH with range
    factorial = 1
    FOREACH i = 1 TO 5
        factorial = factorial * i
    END
    MESSAGE "Factorial of 5: " + factorial
    
    // WHILE loop
    counter = 0
    WHILE counter < 3
        counter = counter + 1
        MESSAGE "Counter: " + counter
    END
    
    // STRUCT
    STRUCT Person name age
    END
    
    person = MAKE Person("Mario", 30)
    MESSAGE "Person: " + person.name + ", age " + person.age
    
    // Nested array access
    value = matrix[1][0]
    MESSAGE "Matrix[1][0]: " + value
';

$result = $engine->execute($script);

echo "=== Arrays and Loops Example ===\n\n";
echo "Status: {$result['status']}\n";
echo "Final Variables:\n";
print_r($result['variables']);
