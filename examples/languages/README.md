# PESM Language Examples

Questa directory contiene **implementazioni complete di linguaggi di programmazione** usando PESM come runtime engine. Ogni linguaggio ha la propria grammatica PEG, parser generato, e script di esempio.

## Linguaggi Disponibili

### 1. **BASIC** (`basic/`)
- Linguaggio BASIC senza numeri di riga
- LET, PRINT, INPUT, GOTO, FOR...TO...NEXT
- Variabili uppercase
- Operatori: +, -, *, /, =, <>, <, >, <=, >=

### 2. **FORTRAN** (`fortran/`)
- FORTRAN classico con label numerici
- Operatori logici: .EQ., .NE., .GT., .GE., .LT., .LE.
- WRITE(*,*) per output
- DO loops e GOTO

### 3. **C-like** (`c-like/`)
- Sintassi simile a C
- Blocchi con `{}`
- if/else, while
- Array literals e array access
- Operatori: &&, ||, ==, !=

### 4. **Assembly** (`assembly/`)
- Linguaggio assembly semplificato
- Mnemonici: MOV, ADD, SUB, MUL, CMP
- Jump: JMP, JE, JNE, JG
- Label con `:` e OUT per output

### 5. **Python-like** (`python-like/`)
- Python senza indentazione (usa `end`)
- List e dict literals
- for...in range()
- Operatori: and, or

## Struttura Directory

Ogni linguaggio ha:
```
language/
├── grammar.peg          # Grammatica PEG
├── build.php            # Script per generare parser
├── example.ext          # Script di esempio
├── README.md            # Documentazione
├── LanguageParser.php   # Parser generato (dopo build)
└── LanguageConverter.php # Converter generato (dopo build)
```

## Come Usare

### 1. Build del Parser

```bash
cd examples/languages/basic
php build.php
```

### 2. Esecuzione Script

```php
require_once 'basic/BasicParser.php';
require_once 'basic/BasicConverter.php';
require_once '../../../src/ScriptEngine.php';

$parser = new BASIC\Parser();
$converter = new BASIC\GeneratedConverter();
$engine = new PESM\ScriptEngine($parser, $converter);

$code = file_get_contents('basic/example.bas');
$result = $engine->execute($code);

print_r($result);
```

## Architettura

```
Grammatica PEG → Parser (php-peg) → AST → Runtime PESM → Risultato
```

Ogni linguaggio:
1. Definisce la propria **sintassi** nella grammatica PEG
2. Genera il **parser** specifico
3. Usa lo **stesso runtime PESM** per l'esecuzione
4. Condivide gli **stessi nodi AST** (AssignmentNode, IfNode, etc.)

## Vantaggi

- ✅ **Riuso del runtime**: Un solo engine per tutti i linguaggi
- ✅ **Grammatiche indipendenti**: Ogni linguaggio ha la sua sintassi
- ✅ **Estensibilità**: Facile aggiungere nuovi linguaggi
- ✅ **Interoperabilità**: Stesso AST = stesse funzionalità
- ✅ **Testing**: Ogni linguaggio è testabile separatamente

## Aggiungere un Nuovo Linguaggio

1. Creare directory `examples/languages/mylang/`
2. Scrivere grammatica PEG `mylang.peg`
3. Creare `build.php` per generare parser
4. Scrivere `example.ext` di test
5. Documentare in `README.md`

## Note

Tutti i linguaggi condividono:
- Stesso sistema di variabili (Context)
- Stesso control flow (ControlFlow)
- Stessi comandi (CommandRegistry)
- Stesso interrupt/resume pattern
