<?php
/**
 * Esempio: Gestione Workflow con Interruzioni
 * 
 * Mostra come gestire l'esecuzione di script PESM
 * e reagire ai comandi workflow (MESSAGE, ACCEPT, REFUSE)
 */

require_once __DIR__ . '/../src/ScriptEngine.php';

class WorkflowHandler
{
    private PESM\ScriptEngine $engine;
    private array $logs = [];
    private ?string $currentScript = null;
    
    public function __construct()
    {
        $this->engine = new PESM\ScriptEngine();
    }
    
    /**
     * Esegue uno script e gestisce interruzioni con resume automatico
     */
    public function executeWorkflow(string $script, array $variables = []): array
    {
        $this->currentScript = $script;
        $this->log("Inizio esecuzione workflow");
        
        try {
            $result = $this->engine->execute($script, $variables);
            
            while ($result['status'] === 'interrupted') {
                $action = $result['action'];
                
                // MESSAGE: gestisci e continua
                if ($action === 'message') {
                    $this->handleMessage($result['actionData']);
                    $result = $this->engine->resume(
                        $script,
                        $result['variables'],
                        $result['resumeFrom']
                    );
                    continue;
                }
                
                // ACCEPT: gestisci e termina
                if ($action === 'accept') {
                    return $this->handleAccept($result['actionData'], $result);
                }
                
                // REFUSE: gestisci e termina
                if ($action === 'refuse') {
                    return $this->handleRefuse($result['actionData'], $result);
                }
                
                break;
            }
            
            // Completato normalmente
            return [
                'success' => true,
                'status' => 'completed',
                'variables' => $result['variables'],
                'logs' => $this->logs
            ];
            
        } catch (Exception $e) {
            $this->log("ERRORE: " . $e->getMessage());
            return [
                'success' => false,
                'error' => $e->getMessage(),
                'logs' => $this->logs
            ];
        }
    }
    
    /**
     * Gestisce comando MESSAGE
     */
    private function handleMessage(string $message): void
    {
        $this->log("MESSAGE: $message");
    }
    
    /**
     * Gestisce ACCEPT - Workflow approvato
     */
    private function handleAccept($data, array $result): array
    {
        $this->log("✓ Workflow APPROVATO: $data");
        
        return [
            'success' => true,
            'status' => 'accepted',
            'data' => $data,
            'variables' => $result['variables'],
            'logs' => $this->logs,
            'next_action' => 'proceed'
        ];
    }
    
    /**
     * Gestisce REFUSE - Workflow rifiutato
     */
    private function handleRefuse($data, array $result): array
    {
        $this->log("✗ Workflow RIFIUTATO: $data");
        
        return [
            'success' => true,
            'status' => 'refused',
            'data' => $data,
            'variables' => $result['variables'],
            'logs' => $this->logs,
            'next_action' => 'stop'
        ];
    }
    
    /**
     * Log interno
     */
    private function log(string $message): void
    {
        $this->logs[] = date('H:i:s') . " - " . $message;
    }
    
    /**
     * Ottieni logs
     */
    public function getLogs(): array
    {
        return $this->logs;
    }
}

// ============================================
// ESEMPI DI USO
// ============================================

$handler = new WorkflowHandler();

echo "=== ESEMPIO 1: Approvazione Automatica ===\n";
$script1 = '
amount = 500
IF amount <= 1000
  MESSAGE "Importo approvato automaticamente"
  ACCEPT "auto_approved"
ELSE
  MESSAGE "Richiede approvazione manuale"
END
';

$result1 = $handler->executeWorkflow($script1);
echo "Status: " . $result1['status'] . "\n";
echo "Next action: " . ($result1['next_action'] ?? 'none') . "\n";
echo "Logs:\n";
foreach ($result1['logs'] as $log) {
    echo "  $log\n";
}
echo "\n";

// ============================================

echo "=== ESEMPIO 2: Rifiuto con Condizione ===\n";
$script2 = '
score = 45
IF score >= 60
  MESSAGE "Esame superato"
  ACCEPT "passed"
ELSE
  MESSAGE "Esame non superato"
  REFUSE "failed"
END
';

$result2 = $handler->executeWorkflow($script2);
echo "Status: " . $result2['status'] . "\n";
echo "Message: " . ($result2['message'] ?? 'none') . "\n";
echo "Next action: " . ($result2['next_action'] ?? 'none') . "\n\n";

// ============================================

echo "=== ESEMPIO 3: Workflow Multi-Step ===\n";
$script3 = '
step = 1
amount = 2500

IF step == 1
  IF amount <= 1000
    MESSAGE "Step 1: Auto-approvato"
    ACCEPT "step1_approved"
  ELSE
    MESSAGE "Step 1: Richiede manager"
  END
END
';

$result3 = $handler->executeWorkflow($script3);
echo "Status: " . $result3['status'] . "\n";
echo "Variables: " . json_encode($result3['variables']) . "\n\n";

// ============================================

echo "=== ESEMPIO 4: Gestione Errori ===\n";
$script4 = '
x = undefined_function()
';

$result4 = $handler->executeWorkflow($script4);
echo "Success: " . ($result4['success'] ? 'true' : 'false') . "\n";
echo "Error: " . ($result4['error'] ?? 'none') . "\n";
