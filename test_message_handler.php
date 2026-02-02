<?php
require_once __DIR__ . '/src/ScriptEngine.php';

class WorkflowHandlerDebug
{
    private PESM\ScriptEngine $engine;
    private int $messageCallCount = 0;
    
    public function __construct()
    {
        $this->engine = new PESM\ScriptEngine();
    }
    
    public function executeWorkflow(string $script): array
    {
        echo "▶ Inizio esecuzione script\n\n";
        
        $result = $this->engine->execute($script);
        
        echo "\n▶ Script completato, gestisco result\n";
        echo "Result message: " . ($result['message'] ?? 'null') . "\n\n";
        
        if (!empty($result['message'])) {
            $this->handleMessage($result['message']);
        }
        
        echo "\n▶ handleMessage chiamato " . $this->messageCallCount . " volta/e\n";
        
        return $result;
    }
    
    private function handleMessage(string $message): void
    {
        $this->messageCallCount++;
        echo "  → handleMessage() chiamata #" . $this->messageCallCount . ": '$message'\n";
    }
}

// ============================================
// TEST
// ============================================

$handler = new WorkflowHandlerDebug();

echo "=== TEST: Due MESSAGE nello script ===\n\n";

$script = '
x = 1
MESSAGE "Primo messaggio"
x = 2
MESSAGE "Secondo messaggio"
x = 3
';

$result = $handler->executeWorkflow($script);

echo "\n=== RISULTATO ===\n";
echo "x finale: " . $result['variables']['x'] . "\n";
echo "message in result: " . $result['message'] . "\n";

echo "\n=== CONCLUSIONE ===\n";
echo "❌ handleMessage() viene chiamato SOLO 1 volta\n";
echo "❌ Solo l'ULTIMO MESSAGE viene gestito\n";
echo "❌ Il primo MESSAGE viene perso\n";
