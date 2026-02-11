# PESM Web Executor

Interfaccia web per eseguire script PESM dal browser.

## Caratteristiche

- ✅ Editor di script integrato
- ✅ Caricamento file .pesm
- ✅ Esempi predefiniti (fattoriale, fibonacci, array, object, workflow)
- ✅ Output formattato con variabili e messaggi
- ✅ Indicatore di stato (success/error/interrupted)
- ✅ Interfaccia responsive

## Utilizzo

### 1. Avvia server PHP

```bash
cd examples/Esempio1
php -S localhost:8000
```

### 2. Apri nel browser

```
http://localhost:8000/web_executor.html
```

### 3. Esegui script

- Scrivi uno script nell'editor
- Oppure carica un file .pesm
- Oppure usa uno degli esempi predefiniti
- Clicca "Esegui"

## File

- `web_executor.html` - Interfaccia web
- `executor.php` - Backend API per esecuzione script

## Esempi Inclusi

1. **Fattoriale** - Calcolo con FOREACH
2. **Fibonacci** - Sequenza numerica
3. **Array** - Somma elementi array
4. **Object** - Manipolazione oggetti
5. **Workflow** - Esempio con ACCEPT/REFUSE

## Screenshot

```
┌─────────────────────────────────────────────────┐
│ 🚀 PESM Script Executor                         │
├──────────────────┬──────────────────────────────┤
│ 📝 Script Input  │ 📊 Output                    │
│                  │                              │
│ [Editor]         │ === RISULTATO ESECUZIONE === │
│                  │                              │
│ ▶ Esegui         │ Status: success              │
│ 📁 Carica File   │                              │
│ 🗑 Pulisci       │ --- Variabili ---            │
│                  │ sum = 30                     │
│ Esempi rapidi:   │                              │
│ [Fattoriale]...  │ --- Messaggio ---            │
│                  │ Calcolo completato           │
└──────────────────┴──────────────────────────────┘
```

## Note

- Richiede PHP 8.0+
- Usa AJAX per comunicazione con backend
- Output JSON formattato
- Supporta tutti i costrutti PESM
