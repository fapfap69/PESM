<?php
require_once __DIR__ . '/../../vendor/autoload.php';
require_once __DIR__ . '/../../src/ScriptEngine.php';

$script = '
name = "Mario"
age = 25

MESSAGE "Inizio validazione"

IF age >= 18
    status = "adult"
    MESSAGE "Utente maggiorenne"
ELSE
    status = "minor"
    REFUSE "underage"
END

MESSAGE "Validazione completata"
';

echo "=== Test PESM IF/ELSE ===\n\n";

$engine = new PESM\ScriptEngine();
$result = $engine->execute($script);

$iteration = 0;
$messages = [];
while ($result['status'] === 'interrupted' && $iteration < 10) {
    $messages[] = $result['message'] ?? $result['actionData'];
    echo "Iteration $iteration: action=" . ($result['action'] ?? '?') . ", message=\"" . ($result['message'] ?? $result['actionData']) . "\", status=" . ($result['variables']['status'] ?? '?') . "\n";
    $result = $engine->resume($script, $result['variables'], $result['resumeFrom']);
    $iteration++;
}

echo "\nMessages: " . implode(", ", $messages) . "\n";
echo "Expected: Inizio validazione, Utente maggiorenne, Validazione completata\n";
echo "Final status = " . ($result['variables']['status'] ?? '?') . "\n";
