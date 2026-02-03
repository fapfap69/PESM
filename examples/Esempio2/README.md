# Esempio2 - BASIC Language Executor

Interfaccia web per eseguire script BASIC classici usando PESM come runtime.

## Setup

1. **Generare il parser BASIC** (già fatto):
```bash
cd examples/languages/basic
php ../../../bin/build-parser.php basic.peg
# Poi spostare i file generati e rinominare namespace
```

2. **Avviare il server**:
```bash
cd examples/Esempio2
php -S localhost:8001
```

3. **Aprire nel browser**:
```
http://localhost:8001/basic_executor.html
```

## Caratteristiche BASIC

- `LET` - Assegnamento variabili
- `PRINT` - Output
- `IF...THEN...GOTO` - Condizionali
- `GOTO` - Salti incondizionati
- `FOR...TO...NEXT` - Loop
- Label con `:` - Punti di salto
- Operatori: `+`, `-`, `*`, `/`, `=`, `<>`, `<`, `>`, `<=`, `>=`

## Esempi Inclusi

1. **Fattoriale** - Calcolo con GOTO loop
2. **Somma 1-10** - FOR...TO...NEXT
3. **Countdown** - Loop con GOTO

## Architettura

```
BASIC Script → BasicParser → AST → PESM Runtime → Risultato
```

- **Grammatica**: `examples/languages/basic/basic.peg`
- **Parser**: `examples/languages/basic/BasicParser.php`
- **Converter**: `examples/languages/basic/BasicConverter.php`
- **Runtime**: PESM Interpreter (condiviso)

## Note

- Variabili uppercase (A-Z, SUM, RESULT, etc.)
- LET opzionale per assegnamenti
- Stesso runtime di PESM ma sintassi BASIC
- Dimostra la flessibilità del sistema PESM
