# PESM - Comandi Workflow

## MESSAGE

Imposta un messaggio di output accessibile in `$result['message']`.

**Sintassi:**
```javascript
MESSAGE expression
```

**Esempi:**
```javascript
// Stringa letterale
MESSAGE "Operazione completata"

// Variabile
name = "Mario"
MESSAGE name

// Espressione
count = 5
MESSAGE count
```

**Output:**
```php
$result['message'] = "Operazione completata";
```

---

## ACCEPT

Imposta l'azione di approvazione. Usato per workflow che richiedono approvazione.

**Sintassi:**
```javascript
ACCEPT expression
```

**Esempi:**
```javascript
// Con stato
ACCEPT "approved"

// Con variabile
status = "validated"
ACCEPT status

// Condizionale
IF score >= 60
  ACCEPT "passed"
END
```

**Output:**
```php
$result['action'] = 'accept';
```

---

## REFUSE

Imposta l'azione di rifiuto. Usato per workflow che richiedono rifiuto.

**Sintassi:**
```javascript
REFUSE expression
```

**Esempi:**
```javascript
// Con stato
REFUSE "rejected"

// Condizionale
IF score < 60
  REFUSE "failed"
END
```

**Output:**
```php
$result['action'] = 'refuse';
```

---

## Combinazioni

MESSAGE, ACCEPT e REFUSE possono essere usati insieme:

```javascript
score = 75

IF score >= 60
  MESSAGE "Esame superato"
  ACCEPT "passed"
ELSE
  MESSAGE "Esame non superato"
  REFUSE "failed"
END
```

**Output:**
```php
[
    'status' => 'success',
    'variables' => ['score' => 75],
    'message' => 'Esame superato',
    'action' => 'accept'
]
```

---

## Struttura Result Completa

```php
[
    'status' => 'success',      // 'success', 'error', 'interrupted'
    'variables' => [...],       // Tutte le variabili globali
    'message' => '...',         // Da MESSAGE (null se non usato)
    'action' => 'accept/refuse',// Da ACCEPT/REFUSE (null se non usato)
    'error' => null,            // Messaggio errore se status='error'
    'checkpoint' => null        // Per resume execution
]
```

---

## Note

1. **MESSAGE** può essere chiamato più volte - solo l'ultimo valore viene salvato
2. **ACCEPT/REFUSE** sovrascrivono l'azione precedente
3. Tutti e tre accettano **Expression** (stringhe, variabili, numeri, ecc.)
4. I comandi non interrompono l'esecuzione - lo script continua
