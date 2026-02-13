<?php
header('Content-Type: application/json');
require __DIR__ . '/../../vendor/autoload.php';

use PESM\ScriptEngine;

try {
    if (empty($_POST) && $_SERVER['REQUEST_METHOD'] !== 'POST') {
        echo json_encode(['markers' => []]);
        exit;
    }

    $code = $_POST['code'] ?? file_get_contents('php://input');

    if (empty(trim($code))) {
        echo json_encode(['markers' => []]);
        exit;
    }

    $engine = new ScriptEngine();

    try {
        $bytecode = $engine->compile($code);
        echo json_encode(['markers' => []]);
        exit;
        
    } catch (\Exception $e) {
        $msg = $e->getMessage();
        
        // Try to get line from error message
        $line = 1;
        if (preg_match('/line (\d+)/i', $msg, $m)) {
            $line = (int)$m[1];
        } elseif (preg_match('/Undefined function: func_(\w+)/i', $msg, $m)) {
            // For undefined function errors, find the line where it's called
            $funcName = $m[1];
            $lines = explode("\n", $code);
            foreach ($lines as $i => $lineContent) {
                if (preg_match('/\b' . preg_quote($funcName, '/') . '\s*\(/i', $lineContent)) {
                    $line = $i + 1;
                    break;
                }
            }
        }
        // Note: For parse errors without line info, we mark line 1
        // PESM parser doesn't provide detailed position information
        
        $lines = explode("\n", $code);
        $lineContent = $lines[$line - 1] ?? '';
        $endCol = strlen($lineContent) + 1;
        
        $marker = [
            'startLineNumber' => $line,
            'startColumn' => 1,
            'endLineNumber' => $line,
            'endColumn' => $endCol,
            'message' => $msg,
            'severity' => 'error'
        ];
        echo json_encode(['markers' => [$marker]]);
        exit;
    }

} catch (\Throwable $t) {
  echo json_encode(['markers' => [[
    'startLineNumber' => 1,
    'startColumn' => 1,
    'endLineNumber' => 1,
    'endColumn' => 100,
    'message' => $t->getMessage(),
    'severity' => 'error'
  ]]]);
}
