<?php
/**
 * BASIC Script Executor - Backend API
 */

header('Content-Type: application/json');
session_start();

require_once __DIR__ . '/../../vendor/autoload.php';
require_once __DIR__ . '/../../src/Runtime/Interpreter.php';
require_once __DIR__ . '/../../src/Parser/AST/Node.php';
require_once __DIR__ . '/../../src/Parser/AST/ProgramNode.php';
require_once __DIR__ . '/../../src/Parser/AST/Nodes.php';
require_once __DIR__ . '/../languages/basic/BasicParser.php';
require_once __DIR__ . '/../languages/basic/BasicConverter.php';

use PESM\Runtime\Interpreter;

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode(['error' => 'Method not allowed']);
    exit;
}

$script = $_POST['script'] ?? '';

if (empty($script)) {
    echo json_encode(['error' => 'No script provided']);
    exit;
}

try {
    // Parse BASIC script
    $parser = new BASIC\GeneratedParser($script);
    $result = $parser->match_Program();
    
    if ($result === false) {
        throw new \Exception("Parse error in BASIC script");
    }
    
    $converter = new BASIC\GeneratedConverter();
    $ast = $converter->convert($result);
    
    // Execute
    $interpreter = new Interpreter();
    $execResult = $interpreter->execute($ast);
    
    echo json_encode($execResult->toArray());
    
} catch (Exception $e) {
    echo json_encode([
        'status' => 'error',
        'error' => $e->getMessage()
    ]);
}
