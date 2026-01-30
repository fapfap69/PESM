<?php
require_once __DIR__ . '/src/ScriptEngine.php';

$engine = new PESM\ScriptEngine();

$result = $engine->execute('IF 1>0 x=5 END');
echo "Result:\n";
print_r($result);
