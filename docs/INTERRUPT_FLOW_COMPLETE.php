<?php
/**
 * SLICE: Gestione Completa Interrupt in PESM
 * Mostra il flusso da Grammatica → AST → Runtime → Handler
 */

// ============================================
// 1. GRAMMATICA (pesm.peg)
// ============================================
/*
#node(InterruptNode)
MessageStmt: "MESSAGE" _ msg:Expression

#node(InterruptNode)
AcceptStmt: "ACCEPT" _ state:Expression

#node(InterruptNode)
RefuseStmt: "REFUSE" _ state:Expression
*/

// ============================================
// 2. AST NODE (Nodes.php)
// ============================================
namespace PESM\Parser\AST;

class InterruptNode extends Node {
    public function __construct(
        public string $type,        // 'message' | 'accept' | 'refuse'
        public ?Node $expression    // Parametro opzionale
    ) {
        parent::__construct();
    }
    
    public function execute($context, $flow, $commands, $pc = null) {
        // Valuta espressione
        $data = $this->expression 
            ? $this->expression->execute($context, $flow, $commands, $pc)
            : null;
        
        // Segnala interrupt al ControlFlow
        $flow->setInterrupt($this->type, $data);
    }
}

// ============================================
// 3. CONTROL FLOW (Components.php)
// ============================================
namespace PESM\Runtime;

class ControlFlow {
    private bool $interrupt = false;
    private ?string $interruptType = null;
    private $actionData = null;
    
    public function setInterrupt(string $type, $data = null): void {
        $this->interrupt = true;
        $this->interruptType = $type;
        $this->actionData = $data;
    }
    
    public function needsInterrupt(): bool {
        return $this->interrupt;
    }
    
    public function getPendingAction(): ?string {
        return $this->interruptType;
    }
    
    public function getActionData() {
        return $this->actionData;
    }
}

// ============================================
// 4. PROGRAM COUNTER (ProgramCounter.php)
// ============================================
class ProgramCounter {
    private int $currentNodeId = 0;
    private ?int $resumeFromId = null;
    
    public function setCurrentNode(int $nodeId): void {
        $this->currentNodeId = $nodeId;
    }
    
    public function getCurrentNodeId(): int {
        return $this->currentNodeId;
    }
    
    public function setResumePoint(int $nodeId): void {
        $this->resumeFromId = $nodeId;
    }
    
    public function shouldSkip(int $nodeId): bool {
        if ($this->resumeFromId === null) {
            return false;
        }
        // Skip nodi già eseguiti
        return $nodeId <= $this->resumeFromId;
    }
}

// ============================================
// 5. PROGRAM NODE - Gestione Skip (ProgramNode.php)
// ============================================
class ProgramNode extends Node {
    public function execute($context, $flow, $commands, $pc = null) {
        foreach ($this->statements as $stmt) {
            // Skip se in resume mode
            if ($pc && $pc->shouldSkip($stmt->id)) {
                continue;
            }
            
            // Aggiorna PC
            if ($pc) $pc->setCurrentNode($stmt->id);
            
            // Esegui statement
            $stmt->execute($context, $flow, $commands, $pc);
            
            // Check interrupt
            if ($flow->needsInterrupt()) {
                break;  // STOP esecuzione
            }
        }
    }
}

// ============================================
// 6. INTERPRETER (Interpreter.php)
// ============================================
class Interpreter {
    public function execute(Node $ast, array $variables = [], ?int $resumeFromId = null): Result {
        $context = new ExecutionContext($variables);
        $flow = new ControlFlow();
        $pc = new ProgramCounter();
        
        // Imposta resume point se presente
        if ($resumeFromId !== null) {
            $pc->setResumePoint($resumeFromId);
        }
        
        // Esegui AST
        $ast->execute($context, $flow, $this->functions, $pc);
        
        // Check interrupt
        if ($flow->needsInterrupt()) {
            return new Result(
                status: 'interrupted',
                variables: $context->getAll(),
                action: $flow->getPendingAction(),
                actionData: $flow->getActionData(),
                resumeFrom: $pc->getCurrentNodeId()
            );
        }
        
        // Completato normalmente
        return new Result(
            status: 'success',
            variables: $context->getAll()
        );
    }
}

// ============================================
// 7. SCRIPT ENGINE (ScriptEngine.php)
// ============================================
class ScriptEngine {
    public function execute(string $script, array $variables = [], ?int $resumeFromId = null): array {
        $ast = $this->parse($script);
        $result = $this->interpreter->execute($ast, $variables, $resumeFromId);
        return $result->toArray();
    }
    
    public function resume(string $script, array $variables, int $resumeFromId): array {
        return $this->execute($script, $variables, $resumeFromId);
    }
}

// ============================================
// 8. WORKFLOW HANDLER (workflow_handler.php)
// ============================================
class WorkflowHandler {
    public function executeWorkflow(string $script, array $variables = []): array {
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
        
        return ['status' => 'completed', 'variables' => $result['variables']];
    }
    
    private function handleMessage(string $message): void {
        // Log, notifica, salva in DB, ecc.
        $this->log("MESSAGE: $message");
    }
    
    private function handleAccept($data, array $result): array {
        // Approva workflow, salva stato, procedi
        return ['status' => 'accepted', 'data' => $data];
    }
    
    private function handleRefuse($data, array $result): array {
        // Rifiuta workflow, blocca processo
        return ['status' => 'refused', 'data' => $data];
    }
}

// ============================================
// 9. ESEMPIO USO
// ============================================

$handler = new WorkflowHandler();

$script = '
amount = 500
IF amount <= 1000
  MESSAGE "Importo approvato automaticamente"
  ACCEPT "auto_approved"
ELSE
  MESSAGE "Richiede approvazione manuale"
END
';

$result = $handler->executeWorkflow($script);
// Output: ['status' => 'accepted', 'data' => 'auto_approved']

// ============================================
// FLUSSO ESECUZIONE:
// ============================================
/*
1. Script parsato → AST con InterruptNode(type='message', expr=...)
2. ProgramNode esegue statements, aggiorna PC ad ogni step
3. InterruptNode esegue → chiama flow->setInterrupt('message', data)
4. ProgramNode rileva interrupt → break
5. Interpreter rileva interrupt → ritorna Result(status='interrupted', resumeFrom=nodeId)
6. Handler riceve interrupt → handleMessage() → resume()
7. Resume: PC skippa nodi già eseguiti (id <= resumeFrom)
8. Esecuzione riprende da statement successivo
9. InterruptNode(type='accept') → interrupt → Handler termina workflow
*/
