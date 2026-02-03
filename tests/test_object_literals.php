<?php

require_once __DIR__ . '/../src/ScriptEngine.php';

use PESM\ScriptEngine;

echo "=== PESM Object Literals Tests ===\n\n";

$engine = new ScriptEngine();
$tests = [
    // Test 1: Empty object
    [
        'name' => 'Empty object',
        'script' => 'obj = {}',
        'expected' => ['obj' => []]
    ],
    
    // Test 2: Simple object
    [
        'name' => 'Simple object',
        'script' => '
            person = {"name": "Mario", "age": 30}
            name = person["name"]
            age = person["age"]
        ',
        'expected' => [
            'person' => ['name' => 'Mario', 'age' => 30],
            'name' => 'Mario',
            'age' => 30
        ]
    ],
    
    // Test 3: Nested objects
    [
        'name' => 'Nested objects',
        'script' => '
            config = {"db": {"host": "localhost", "port": 3306}}
            host = config["db"]["host"]
            port = config["db"]["port"]
        ',
        'expected' => [
            'config' => ['db' => ['host' => 'localhost', 'port' => 3306]],
            'host' => 'localhost',
            'port' => 3306
        ]
    ],
    
    // Test 4: Object with expressions
    [
        'name' => 'Object with expressions',
        'script' => '
            x = 10
            obj = {"sum": 5 + 5, "product": 2 * 3, "var": x}
        ',
        'expected' => [
            'x' => 10,
            'obj' => ['sum' => 10, 'product' => 6, 'var' => 10]
        ]
    ],
    
    // Test 5: Array of objects
    [
        'name' => 'Array of objects',
        'script' => '
            users = [
                {"id": 1, "name": "Mario"},
                {"id": 2, "name": "Luigi"}
            ]
            first = users[0]["name"]
            second = users[1]["name"]
        ',
        'expected' => [
            'users' => [
                ['id' => 1, 'name' => 'Mario'],
                ['id' => 2, 'name' => 'Luigi']
            ],
            'first' => 'Mario',
            'second' => 'Luigi'
        ]
    ],
    
    // Test 6: Object modification
    [
        'name' => 'Object modification',
        'script' => '
            obj = {"x": 1}
            obj["y"] = 2
            obj["x"] = 10
        ',
        'expected' => [
            'obj' => ['x' => 10, 'y' => 2]
        ]
    ],
    
    // Test 7: Object in IF
    [
        'name' => 'Object in IF',
        'script' => '
            user = {"role": "admin", "active": 1}
            IF user["role"] == "admin" {
                status = "allowed"
            }
        ',
        'expected' => [
            'user' => ['role' => 'admin', 'active' => 1],
            'status' => 'allowed'
        ]
    ],
    
    // Test 8: Complex nested structure
    [
        'name' => 'Complex nested structure',
        'script' => '
            data = {
                "users": [
                    {"name": "Mario", "scores": [10, 20, 30]},
                    {"name": "Luigi", "scores": [15, 25, 35]}
                ]
            }
            name = data["users"][0]["name"]
            score = data["users"][0]["scores"][1]
        ',
        'expected' => [
            'data' => [
                'users' => [
                    ['name' => 'Mario', 'scores' => [10, 20, 30]],
                    ['name' => 'Luigi', 'scores' => [15, 25, 35]]
                ]
            ],
            'name' => 'Mario',
            'score' => 20
        ]
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
                if (!isset($result['variables'][$key])) {
                    $match = false;
                    echo "   ❌ FAILED: Variable $key not found\n";
                    break;
                }
                
                if ($result['variables'][$key] !== $expectedValue) {
                    $match = false;
                    echo "   ❌ FAILED: Expected $key = " . json_encode($expectedValue) . 
                         ", got " . json_encode($result['variables'][$key]) . "\n";
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
