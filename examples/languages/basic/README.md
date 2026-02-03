# BASIC Language for PESM

Implementazione di un linguaggio BASIC semplificato usando PESM come runtime.

## Caratteristiche

- ✅ Variabili uppercase (A-Z, A1, SUM, etc.)
- ✅ LET per assegnamenti (opzionale)
- ✅ PRINT per output
- ✅ GOTO/Label per controllo flusso
- ✅ IF...THEN con statement singolo
- ✅ FOR...TO...NEXT loops
- ✅ Operatori: +, -, *, /, =, <>, <, >, <=, >=

## Build

```bash
php build.php
```

Genera:
- `BasicParser.php` - Parser PEG
- `BasicConverter.php` - AST Converter

## Esempio

```basic
REM Calculate factorial
LET N = 5
LET RESULT = 1
LET I = 1

LOOP:
IF I > N THEN GOTO DONE
LET RESULT = RESULT * I
LET I = I + 1
GOTO LOOP

DONE:
PRINT "Factorial computed"
END
```

## Esecuzione

```php
require_once 'BasicParser.php';
require_once 'BasicConverter.php';
require_once '../../../src/ScriptEngine.php';

$parser = new BASIC\Parser();
$converter = new BASIC\GeneratedConverter();
$engine = new PESM\ScriptEngine($parser, $converter);

$code = file_get_contents('example.bas');
$result = $engine->execute($code);
```
