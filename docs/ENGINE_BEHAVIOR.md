# PESM Engine - Gestione Variabili e Workflow

## Gestione Variabili

### ✅ Funziona Correttamente

1. **Variabili iniziali**: Passate come secondo parametro a `execute()`
   ```php
   $engine->execute('x = x + 10', ['x' => 5]); // x = 15
   ```

2. **Scope globale**: Variabili in IF/FOREACH sono globali
   ```javascript
   IF x > 0
     z = 10  // z diventa globale
   END
   ```

3. **Scope locale funzioni**: Variabili in funzioni sono locali
   ```javascript
   FUNCTION test()
     local_var = 50  // NON visibile fuori
     RETURN local_var
   END
   ```

4. **Parametri funzione**: Sono locali alla funzione
   ```javascript
   FUNCTION add(a, b)  // a, b locali
     RETURN a + b
   END
   ```

5. **Variabile loop**: `i` in FOREACH rimane globale con ultimo valore
   ```javascript
   FOREACH i = 1 TO 5
     sum = sum + i
   END
   // i = 5 (ultimo valore)
   ```

6. **Variabili non inizializzate**: Ritornano `null`
   ```javascript
   x = y + 1  // y=null, x=1
   ```

### ⚠️ Problemi Trovati

1. **Numeri letterali sono stringhe**:
   ```php
   a = 10  // $variables['a'] = "10" (string!)
   ```
   Solo i risultati di operazioni sono int.

2. **Stringhe non vengono salvate**:
   ```javascript
   str = "hello"  // NON viene salvato in variables!
   ```

3. **Assignment di espressioni senza operatori**:
   ```javascript
   calc = 10 + 5  // NON salvato
   bool = 1 > 0   // NON salvato
   ```

## Comandi Workflow

### ✅ Tutti Funzionanti

1. **MESSAGE**: Salva messaggio in `$result['message']`
   ```javascript
   MESSAGE "Hello"
   ```

2. **ACCEPT**: Imposta `$result['action'] = 'accept'`
   ```javascript
   ACCEPT "approved"
   ```

3. **REFUSE**: Imposta `$result['action'] = 'refuse'`
   ```javascript
   REFUSE "rejected"
   ```

4. **Combinazioni**: MESSAGE + ACCEPT/REFUSE funzionano insieme

## Struttura Result

```php
[
    'status' => 'success',      // o 'error', 'interrupted'
    'variables' => [...],       // tutte le variabili globali
    'message' => '...',         // da MESSAGE
    'action' => 'accept/refuse',// da ACCEPT/REFUSE
    'error' => null,            // messaggio errore
    'checkpoint' => null        // per resume
]
```

## Problemi da Risolvere

1. ❌ Numeri letterali salvati come stringhe
2. ❌ Stringhe letterali non salvate
3. ❌ Assignment di espressioni semplici non funziona
4. ⚠️ Variabile loop rimane globale (design choice?)
