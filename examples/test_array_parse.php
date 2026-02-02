<?php
require_once __DIR__ . '/../src/ScriptEngine.php';

$engine = new PESM\ScriptEngine();

$script = '
items = [1, 2, 3]
MESSAGE "Before modify"
items = [4, 5, 6]
';

try {
    $r = $engine->execute($script);
    echo "Success: items = " . json_encode($r['variables']['items']) . "\n";
} catch (Exception $e) {
    echo "Error: " . $e->getMessage() . "\n";
}
