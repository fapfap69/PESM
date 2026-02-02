# Pattern: Gestione Workflow Runtime

Come gestire l'esecuzione di script PESM e reagire ai comandi workflow.

---

## Architettura

```
┌─────────────────┐
│  Application    │  ← Il tuo codice
└────────┬────────┘
         │
         ▼
┌─────────────────┐
│ WorkflowHandler │  ← Gestisce esecuzione
└────────┬────────┘
         │
         ▼
┌─────────────────┐
│  ScriptEngine   │  ← PESM Engine
└────────┬────────┘
         │
         ▼
┌─────────────────┐
│     Result      │  ← Output con action/message
└─────────────────┘
```

---

## Pattern Base

### 1. Esecuzione Semplice

```php
$engine = new PESM\ScriptEngine();
$result = $engine->execute($script, $variables);

// Result contiene:
// - status: 'success' | 'error' | 'interrupted'
// - variables: array delle variabili finali
// - message: da MESSAGE (null se non usato)
// - action: 'accept' | 'refuse' (null se non usato)
// - error: messaggio errore (null se success)
```

### 2. Gestione Azioni

```php
if ($result['action'] === 'accept') {
    // Workflow approvato
    // → Procedi con step successivo
    // → Aggiorna database
    // → Invia notifica
}

if ($result['action'] === 'refuse') {
    // Workflow rifiutato
    // → Blocca processo
    // → Rollback operazioni
    // → Notifica utente
}

if ($result['action'] === null) {
    // Nessuna azione
    // → Script completato normalmente
    // → Nessuna decisione richiesta
}
```

### 3. Gestione Messaggi

```php
if (!empty($result['message'])) {
    // Log messaggio
    error_log($result['message']);
    
    // Salva in database
    $db->saveLog($result['message']);
    
    // Mostra all'utente
    echo $result['message'];
}
```

---

## Pattern Avanzati

### 1. Workflow Multi-Step

```php
class MultiStepWorkflow
{
    public function execute(array $steps, array $data): array
    {
        $engine = new PESM\ScriptEngine();
        $variables = $data;
        
        foreach ($steps as $stepName => $script) {
            $result = $engine->execute($script, $variables);
            
            // Aggiorna variabili per step successivo
            $variables = $result['variables'];
            
            // Gestisci interruzioni
            if ($result['action'] === 'refuse') {
                return [
                    'stopped_at' => $stepName,
                    'reason' => $result['message'],
                    'variables' => $variables
                ];
            }
            
            if ($result['action'] === 'accept') {
                // Step approvato, continua
                continue;
            }
        }
        
        return [
            'completed' => true,
            'variables' => $variables
        ];
    }
}
```

### 2. Workflow con Checkpoint

```php
class CheckpointWorkflow
{
    public function execute(string $script, array $variables): array
    {
        $engine = new PESM\ScriptEngine();
        $result = $engine->execute($script, $variables);
        
        // Se interrotto, salva checkpoint
        if ($result['status'] === 'interrupted') {
            $checkpointId = $this->saveCheckpoint(
                $result['checkpoint'],
                $result['variables']
            );
            
            return [
                'status' => 'waiting',
                'checkpoint_id' => $checkpointId,
                'message' => $result['message']
            ];
        }
        
        return $result;
    }
    
    public function resume(string $checkpointId, array $input): array
    {
        $checkpoint = $this->loadCheckpoint($checkpointId);
        $engine = new PESM\ScriptEngine();
        $engine->setCheckpoint($checkpoint['state']);
        
        return $engine->execute('', $checkpoint['variables']);
    }
}
```

### 3. Workflow con Validazione

```php
class ValidatedWorkflow
{
    public function execute(string $script, array $variables): array
    {
        // Pre-validazione
        if (!$this->validateInput($variables)) {
            return [
                'success' => false,
                'error' => 'Input non valido'
            ];
        }
        
        // Esecuzione
        $engine = new PESM\ScriptEngine();
        $result = $engine->execute($script, $variables);
        
        // Post-validazione
        if (!$this->validateOutput($result['variables'])) {
            return [
                'success' => false,
                'error' => 'Output non valido'
            ];
        }
        
        return $result;
    }
}
```

---

## Gestione Interruzioni

### Tipi di Interruzione

1. **ACCEPT/REFUSE** - Decisione workflow
   - Non interrompe esecuzione
   - Segnala decisione in `$result['action']`
   - Script continua fino alla fine

2. **RETURN** - Uscita da funzione
   - Interrompe solo la funzione corrente
   - Ritorna valore al chiamante

3. **Errore** - Eccezione
   - Interrompe completamente
   - `$result['status'] = 'error'`
   - `$result['error']` contiene messaggio

4. **Checkpoint** (futuro)
   - Pausa esecuzione
   - `$result['status'] = 'interrupted'`
   - Può essere ripreso con `resume()`

### Esempio Gestione Completa

```php
function handleWorkflow(string $script, array $data): array
{
    $engine = new PESM\ScriptEngine();
    
    try {
        $result = $engine->execute($script, $data);
        
        // Gestisci status
        switch ($result['status']) {
            case 'success':
                return handleSuccess($result);
                
            case 'error':
                return handleError($result);
                
            case 'interrupted':
                return handleInterrupted($result);
                
            default:
                throw new Exception("Status sconosciuto");
        }
        
    } catch (Exception $e) {
        return [
            'success' => false,
            'error' => $e->getMessage()
        ];
    }
}

function handleSuccess(array $result): array
{
    // Log messaggio
    if ($result['message']) {
        logMessage($result['message']);
    }
    
    // Gestisci azione
    if ($result['action'] === 'accept') {
        approveWorkflow($result['variables']);
    } elseif ($result['action'] === 'refuse') {
        rejectWorkflow($result['variables']);
    }
    
    return [
        'success' => true,
        'action' => $result['action'],
        'data' => $result['variables']
    ];
}
```

---

## Best Practices

1. **Sempre gestire `$result['action']`**
   - Non ignorare ACCEPT/REFUSE
   - Implementare logica appropriata

2. **Loggare `$result['message']`**
   - Utile per debugging
   - Tracciabilità workflow

3. **Validare input/output**
   - Verificare variabili prima dell'esecuzione
   - Validare risultati dopo

4. **Gestire errori gracefully**
   - Try/catch attorno a execute()
   - Fornire fallback appropriati

5. **Separare logica business**
   - Script PESM = logica decisionale
   - PHP = azioni concrete (DB, email, ecc.)

---

## Esempio Completo

Vedi `examples/workflow_handler.php` per implementazione completa con:
- Gestione MESSAGE/ACCEPT/REFUSE
- Logging
- Gestione errori
- Pattern riutilizzabile
