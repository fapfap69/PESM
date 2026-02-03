<?php

require_once __DIR__ . '/../src/ScriptEngine.php';

use PESM\ScriptEngine;

$engine = new ScriptEngine();

$script = '
obj = {"x": 1}
obj["y"] = 2
obj["x"] = 10
';

echo "Script:\n$script\n\n";

try {
    $result = $engine->execute($script);
    echo "Status: {$result['status']}\n";
    echo "Variables:\n";
    print_r($result['variables']);
} catch (Exception $e) {
    echo "ERROR: " . $e->getMessage() . "\n";
    echo $e->getTraceAsString() . "\n";
}
