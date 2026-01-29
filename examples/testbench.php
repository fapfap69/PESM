<?php
/**
 * PESM Test Bench - Backend API
 */

header('Content-Type: application/json');

require_once __DIR__ . '/../src/ScriptEngine.php';

// Get JSON input
$input = json_decode(file_get_contents('php://input'), true);

if (!$input || !isset($input['script'])) {
    echo json_encode([
        'status' => 'error',
        'error' => 'Missing script parameter'
    ]);
    exit;
}

$script = $input['script'];
$variables = $input['variables'] ?? [];

try {
    $engine = new PESM\ScriptEngine();
    $result = $engine->execute($script, $variables);
    
    echo json_encode([
        'status' => 'success',
        'message' => $result['message'] ?? null,
        'variables' => $result['variables'] ?? [],
        'action' => $result['action'] ?? 'continue',
        'log' => 'Execution completed successfully'
    ]);
    
} catch (Exception $e) {
    echo json_encode([
        'status' => 'error',
        'error' => $e->getMessage(),
        'variables' => $variables,
        'log' => 'Error: ' . $e->getMessage()
    ]);
}
