<?php
/**
 * PESM Script Executor - Backend API
 */

header('Content-Type: application/json');
session_start();

require_once __DIR__ . '/../../src/ScriptEngine.php';

use PESM\ScriptEngine;

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode(['error' => 'Method not allowed']);
    exit;
}

$script = $_POST['script'] ?? '';
$action = $_POST['action'] ?? 'execute';
$userInput = $_POST['userInput'] ?? null;

if (empty($script)) {
    echo json_encode(['error' => 'No script provided']);
    exit;
}

try {
    $engine = new ScriptEngine();
    
    if ($action === 'resume' && isset($_SESSION['pesm_state'])) {
        // Resume from interruption
        $state = $_SESSION['pesm_state'];
        
        // Set user input if provided
        if ($userInput !== null && isset($state['waitingFor'])) {
            $state['variables'][$state['waitingFor']] = $userInput;
        }
        
        $result = $engine->resume(
            $state['script'],
            $state['variables'],
            $state['resumeFrom']
        );
    } else {
        // New execution
        $result = $engine->execute($script);
    }
    
    // Save state if interrupted
    if ($result['status'] === 'interrupted') {
        $_SESSION['pesm_state'] = [
            'script' => $script,
            'resumeFrom' => $result['resumeFrom'] ?? null,
            'variables' => $result['variables'] ?? [],
            'message' => $result['message'] ?? null,
            'action' => $result['action'] ?? null,
            'actionData' => $result['actionData'] ?? null,
            'waitingFor' => $result['waitingFor'] ?? null
        ];
    } else {
        // Clear state on completion
        unset($_SESSION['pesm_state']);
    }
    
    echo json_encode($result);
    
} catch (Exception $e) {
    echo json_encode([
        'status' => 'error',
        'error' => $e->getMessage()
    ]);
}
