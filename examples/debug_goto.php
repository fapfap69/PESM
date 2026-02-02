<?php

require_once __DIR__ . '/../src/ScriptEngine.php';

use PESM\ScriptEngine;

$engine = new ScriptEngine();

$script = '
x = 0
loop:
x = x + 1
IF x < 5 GOTO loop
result = x
';

echo "Script:\n$script\n\n";

try {
    $result = $engine->execute($script);
    echo "Status: {$result['status']}\n";
    echo "Variables: " . json_encode($result['variables']) . "\n";
    if (isset($result['error'])) {
        echo "Error: {$result['error']}\n";
    }
} catch (Exception $e) {
    echo "Exception: " . $e->getMessage() . "\n";
    echo $e->getTraceAsString() . "\n";
}
