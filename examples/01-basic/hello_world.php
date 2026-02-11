<?php
/**
 * PESM Example 01: Hello World
 * Basic script execution
 */

require_once __DIR__ . '/../../vendor/autoload.php';

use PESM\ScriptEngine;

$engine = new ScriptEngine();

$script = '
    name = "World"
    MESSAGE "Hello " + name + "!"
';

$result = $engine->execute($script);

echo "Status: {$result['status']}\n";
echo "Variables: " . json_encode($result['variables']) . "\n";

if ($result['status'] === 'interrupted') {
    echo "Action: {$result['action']}\n";
    echo "Message: {$result['actionData']}\n";
}
