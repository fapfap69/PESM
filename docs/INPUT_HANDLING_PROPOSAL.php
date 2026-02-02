<?php
/**
 * PROPOSTA: Gestione Input da Interrupt
 * 
 * Problema: Come passare dati dall'handler (es. INPUT_BOX) al workflow?
 * Soluzione: Resume accetta nuove variabili che vengono integrate
 */

// ============================================
// OPZIONE 1: Variabili aggiuntive al resume
// ============================================

// Script PESM
$script = '
status = "pending"
MESSAGE "Conferma operazione"
// Dopo resume, handler può aver settato "userChoice"
IF userChoice == "YES"
  result = "confirmed"
ELSE
  result = "cancelled"
END
';

// Handler
class WorkflowHandler {
    public function executeWorkflow(string $script): array {
        $result = $this->engine->execute($script);
        
        while ($result['status'] === 'interrupted') {
            if ($result['action'] === 'message') {
                // Mostra dialog all'utente
                $userInput = $this->showInputBox($result['actionData']);
                
                // Aggiungi nuova variabile
                $result['variables']['userChoice'] = $userInput;
                
                // Resume con variabili aggiornate
                $result = $this->engine->resume(
                    $script,
                    $result['variables'],  // Include userChoice
                    $result['resumeFrom']
                );
            }
        }
        
        return $result;
    }
    
    private function showInputBox(string $message): string {
        // Mostra dialog, ritorna "YES" | "NO" | "CANCEL"
        return "YES";
    }
}

// ============================================
// OPZIONE 2: Comando INPUT dedicato
// ============================================

// Grammatica: nuovo comando INPUT
/*
#node(InterruptNode)
InputStmt: "INPUT" _ var:Identifier _ msg:Expression
*/

// Script PESM
$script2 = '
INPUT userChoice "Conferma operazione (YES/NO)?"
IF userChoice == "YES"
  result = "confirmed"
ELSE
  result = "cancelled"
END
';

// InterruptNode con variabile target
class InterruptNode extends Node {
    public function __construct(
        public string $type,
        public ?Node $expression = null,
        public ?string $targetVar = null  // Per INPUT
    ) {
        parent::__construct();
    }
    
    public function execute($context, $flow, $commands, $pc = null) {
        $data = $this->expression 
            ? $this->expression->execute($context, $flow, $commands, $pc)
            : null;
        
        $flow->setInterrupt($this->type, $data, $this->targetVar);
    }
}

// Handler con INPUT
class WorkflowHandler2 {
    public function executeWorkflow(string $script): array {
        $result = $this->engine->execute($script);
        
        while ($result['status'] === 'interrupted') {
            if ($result['action'] === 'input') {
                $targetVar = $result['targetVar'];  // Nome variabile
                $prompt = $result['actionData'];     // Messaggio
                
                // Mostra input all'utente
                $userInput = $this->showInputBox($prompt);
                
                // Setta variabile target
                $result['variables'][$targetVar] = $userInput;
                
                // Resume
                $result = $this->engine->resume(
                    $script,
                    $result['variables'],
                    $result['resumeFrom']
                );
            }
        }
        
        return $result;
    }
}

// ============================================
// OPZIONE 3: Variabile speciale __INPUT__
// ============================================

// Script PESM
$script3 = '
MESSAGE "Conferma operazione"
// Handler setta __INPUT__ durante resume
userChoice = __INPUT__
IF userChoice == "YES"
  result = "confirmed"
END
';

// Handler
class WorkflowHandler3 {
    public function executeWorkflow(string $script): array {
        $result = $this->engine->execute($script);
        
        while ($result['status'] === 'interrupted') {
            if ($result['action'] === 'message') {
                $userInput = $this->showInputBox($result['actionData']);
                
                // Setta variabile speciale
                $result['variables']['__INPUT__'] = $userInput;
                
                $result = $this->engine->resume(
                    $script,
                    $result['variables'],
                    $result['resumeFrom']
                );
            }
        }
        
        return $result;
    }
}

// ============================================
// RACCOMANDAZIONE: OPZIONE 1 (più semplice)
// ============================================

// Vantaggi:
// ✅ Nessuna modifica alla grammatica
// ✅ Massima flessibilità
// ✅ Handler controlla quali variabili aggiungere
// ✅ Già funzionante con implementazione attuale

// Esempio completo
$handler = new WorkflowHandler();

$script = '
status = "pending"
MESSAGE "Vuoi procedere?"
IF userChoice == "YES"
  MESSAGE "Operazione confermata"
  ACCEPT "confirmed"
ELSE
  MESSAGE "Operazione annullata"
  REFUSE "cancelled"
END
';

$result = $handler->execute($script);
// Status: interrupted, action: message, message: "Vuoi procedere?"

// Handler mostra dialog
$userInput = showDialog("Vuoi procedere?"); // Ritorna "YES" o "NO"

// Aggiungi variabile
$result['variables']['userChoice'] = $userInput;

// Resume
$result = $handler->resume($script, $result['variables'], $result['resumeFrom']);
// Script continua con userChoice settato

// ============================================
// ALTERNATIVA: OPZIONE 2 (più esplicita)
// ============================================

// Se vuoi sintassi dedicata:
/*
INPUT userChoice "Conferma operazione?"
INPUT amount "Inserisci importo:"
INPUT date "Seleziona data:"
*/

// Vantaggi:
// ✅ Sintassi esplicita e chiara
// ✅ Variabile target dichiarata nello script
// ✅ Tipo di input evidente

// Svantaggi:
// ❌ Richiede modifica grammatica
// ❌ Più rigido
// ❌ Serve nuovo nodo AST o estensione InterruptNode

// ============================================
// CONCLUSIONE
// ============================================

/*
RACCOMANDO OPZIONE 1:
- Usa resume() con variabili aggiornate
- Handler aggiunge variabili necessarie
- Nessuna modifica grammatica
- Massima flessibilità

ESEMPIO PRATICO:
*/

class FinalWorkflowHandler {
    public function executeWorkflow(string $script): array {
        $vars = [];
        $result = $this->engine->execute($script, $vars);
        
        while ($result['status'] === 'interrupted') {
            $action = $result['action'];
            $vars = $result['variables'];
            
            if ($action === 'message') {
                // Determina se serve input
                if ($this->needsUserInput($result['actionData'])) {
                    $input = $this->getUserInput($result['actionData']);
                    $vars['userInput'] = $input;
                }
                
                $this->log($result['actionData']);
                $result = $this->engine->resume($script, $vars, $result['resumeFrom']);
            }
            elseif ($action === 'accept') {
                return ['status' => 'accepted', 'data' => $result['actionData']];
            }
            elseif ($action === 'refuse') {
                return ['status' => 'refused', 'data' => $result['actionData']];
            }
        }
        
        return ['status' => 'completed', 'variables' => $vars];
    }
    
    private function needsUserInput(string $message): bool {
        // Logica per determinare se serve input
        return str_contains($message, '?');
    }
    
    private function getUserInput(string $prompt): string {
        // Mostra dialog, ritorna risposta
        return readline($prompt . " ");
    }
}
