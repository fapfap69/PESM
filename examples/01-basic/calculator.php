<?php
/**
 * PESM Example 02: Calculator
 * Demonstrates expressions, functions, and control flow
 */

require_once __DIR__ . '/../../vendor/autoload.php';

use PESM\ScriptEngine;

$engine = new ScriptEngine();

$script = '
    FUNCTION add(a, b)
        RETURN a + b
    END
    
    FUNCTION multiply(a, b)
        RETURN a * b
    END
    
    x = 10
    y = 20
    
    sum = add(x, y)
    product = multiply(x, y)
    
    MESSAGE "Sum: " + sum
    MESSAGE "Product: " + product
    
    IF sum > 25
        MESSAGE "Sum is greater than 25"
    END
';

$result = $engine->execute($script);

echo "=== Calculator Example ===\n\n";
echo "Status: {$result['status']}\n";
echo "Variables:\n";
print_r($result['variables']);
