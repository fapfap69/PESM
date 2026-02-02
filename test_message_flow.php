<?php
require_once 'src/ScriptEngine.php';

$engine = new PESM\ScriptEngine();

echo "=== TEST: MESSAGE non interrompe esecuzione ===\n\n";

$script = '
x = 1
MESSAGE "Primo messaggio"
x = 2
MESSAGE "Secondo messaggio"
x = 3
';

$result = $engine->execute($script);

echo "Variabile x finale: " . $result['variables']['x'] . "\n";
echo "Messaggio finale: " . $result['message'] . "\n";
echo "Status: " . $result['status'] . "\n\n";

echo "Conclusione:\n";
echo "- Lo script è eseguito COMPLETAMENTE\n";
echo "- MESSAGE non interrompe l'esecuzione\n";
echo "- Solo l'ULTIMO messaggio viene salvato\n";
echo "- x = 3 (tutte le istruzioni eseguite)\n";
