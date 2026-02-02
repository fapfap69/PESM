# PESM - Interrupt Pattern

## Overview

I comandi workflow (MESSAGE, ACCEPT, REFUSE) funzionano come **breakpoint** che interrompono immediatamente l'esecuzione dello script e ritornano il controllo all'handler esterno.

## Comportamento

Quando uno script incontra un comando workflow:

1. **Esecuzione si ferma immediatamente**
2. **Stato viene salvato** (variabili al momento dell'interrupt)
3. **Controllo ritorna** all'handler con `status: 'interrupted'`
4. **Handler gestisce** l'interrupt (log, notifica, ecc.)

## Esempio Base

```javascript
x = 1
MESSAGE "Step 1"  // STOP qui
x = 2             // NON eseguito
MESSAGE "Step 2"  // NON eseguito
```

**Risultato:**
```php
[
    'status' => 'interrupted',
    'action' => 'message',
    'message' => 'Step 1',
    'variables' => ['x' => 1]  // x = 2 non eseguito
]
```

## Comandi Workflow

### MESSAGE

Interrompe con messaggio informativo.

```javascript
MESSAGE "Operazione completata"
```

**Result:**
```php
[
    'status' => 'interrupted',
    'action' => 'message',
    'message' => 'Operazione completata',
    'actionData' => 'Operazione completata'
]
```

### ACCEPT

Interrompe con approvazione.

```javascript
ACCEPT "approved"
```

**Result:**
```php
[
    'status' => 'interrupted',
    'action' => 'accept',
    'actionData' => 'approved'
]
```

### REFUSE

Interrompe con rifiuto.

```javascript
REFUSE "rejected"
```

**Result:**
```php
[
    'status' => 'interrupted',
    'action' => 'refuse',
    'actionData' => 'rejected'
]
```

## Pattern Handler

```php
class WorkflowHandler
{
    public function executeWorkflow(string $script): array
    {
        $result = $engine->execute($script);
        
        if ($result['status'] === 'interrupted') {
            return $this->handleInterrupt($result);
        }
        
        return ['status' => 'completed'];
    }
    
    private function handleInterrupt(array $result): array
    {
        $action = $result['action'];
        $data = $result['actionData'];
        
        switch ($action) {
            case 'message':
                $this->logMessage($data);
                break;
            case 'accept':
                $this->approveWorkflow($data);
                break;
            case 'refuse':
                $this->rejectWorkflow($data);
                break;
        }
        
        return [
            'status' => $action,
            'data' => $data,
            'variables' => $result['variables']
        ];
    }
}
```

## Casi d'Uso

### 1. Approvazione Condizionale

```javascript
amount = 500
IF amount <= 1000
  MESSAGE "Auto-approvato"
  ACCEPT "auto"
ELSE
  MESSAGE "Richiede manager"
END
```

Se `amount <= 1000`:
- Si ferma a MESSAGE
- Non esegue ACCEPT
- Non esce dall'IF

### 2. Workflow Multi-Step

```javascript
step = 1
MESSAGE "Step 1 completato"
step = 2  // NON eseguito
MESSAGE "Step 2 completato"  // NON eseguito
```

Ogni MESSAGE ferma l'esecuzione.

### 3. Validazione con Rifiuto

```javascript
score = 45
IF score >= 60
  ACCEPT "passed"
ELSE
  REFUSE "failed"  // STOP qui
END
```

## Implementazione Interna

### 1. AST Nodes

```php
class MessageNode extends Node {
    public function execute($context, $flow, $functions) {
        $msg = $this->expression->execute($context, $flow, $functions);
        $flow->setInterrupt('message', $msg);
    }
}
```

### 2. ControlFlow

```php
class ControlFlow {
    private bool $interrupt = false;
    private ?string $interruptType = null;
    private $actionData = null;
    
    public function setInterrupt(string $type, $data): void {
        $this->interrupt = true;
        $this->interruptType = $type;
        $this->actionData = $data;
    }
    
    public function needsInterrupt(): bool {
        return $this->interrupt;
    }
}
```

### 3. ProgramNode

```php
class ProgramNode extends Node {
    public function execute($context, $flow, $functions) {
        foreach ($this->statements as $stmt) {
            $stmt->execute($context, $flow, $functions);
            
            if ($flow->needsInterrupt()) {
                return;  // STOP esecuzione
            }
        }
    }
}
```

### 4. Interpreter

```php
class Interpreter {
    public function execute(Node $ast, array $variables): Result {
        $flow = new ControlFlow();
        $ast->execute($context, $flow, $functions);
        
        if ($flow->needsInterrupt()) {
            return new Result(
                status: 'interrupted',
                action: $flow->getPendingAction(),
                actionData: $flow->getActionData(),
                variables: $context->getAll()
            );
        }
        
        return new Result(status: 'success');
    }
}
```

## Differenze con Vecchio Comportamento

### Prima (Errato)

```javascript
MESSAGE "Step 1"
MESSAGE "Step 2"
```

**Risultato:**
- Entrambi i MESSAGE eseguiti
- Solo ultimo salvato
- handleMessage() chiamato 1 volta

### Ora (Corretto)

```javascript
MESSAGE "Step 1"
MESSAGE "Step 2"
```

**Risultato:**
- Solo primo MESSAGE eseguito
- Esecuzione si ferma
- handleMessage() chiamato immediatamente

## Note Implementative

1. **Ogni execute() parte da zero** - Non c'è stato persistente tra chiamate
2. **Interrupt è immediato** - Non si completa lo statement corrente
3. **Variabili salvate** - Stato al momento dell'interrupt
4. **No resume automatico** - Ogni chiamata è indipendente

## Testing

```php
// Test interrupt
$result = $engine->execute('
  x = 1
  MESSAGE "Test"
  x = 2
');

assert($result['status'] === 'interrupted');
assert($result['action'] === 'message');
assert($result['variables']['x'] === 1);  // x = 2 non eseguito
```

## Vantaggi

- ✅ Controllo immediato all'handler
- ✅ Gestione eventi in tempo reale
- ✅ Stato consistente
- ✅ Debugging semplificato
- ✅ Pattern chiaro e prevedibile
