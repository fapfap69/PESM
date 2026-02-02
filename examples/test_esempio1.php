<?php
require_once __DIR__ . '/../src/ScriptEngine.php';

$engine = new PESM\ScriptEngine();

$script = '
amount = 500
IF amount <= 1000
  MESSAGE "Importo approvato automaticamente"
  ACCEPT "auto_approved"
ELSE
  MESSAGE "Richiede approvazione manuale"
END
';

echo "=== Prima esecuzione ===\n";
$r1 = $engine->execute($script);
echo "Status: " . $r1['status'] . "\n";
echo "Action: " . ($r1['action'] ?? 'none') . "\n";
echo "Message: " . ($r1['message'] ?? 'none') . "\n";
echo "ResumeFrom: " . ($r1['resumeFrom'] ?? 'none') . "\n";
echo "\n";

if ($r1['status'] === 'interrupted' && $r1['action'] === 'message') {
    echo "=== Resume dopo MESSAGE ===\n";
    $r2 = $engine->resume($script, $r1['variables'], $r1['resumeFrom']);
    echo "Status: " . $r2['status'] . "\n";
    echo "Action: " . ($r2['action'] ?? 'none') . "\n";
    echo "ActionData: " . ($r2['actionData'] ?? 'none') . "\n";
}
