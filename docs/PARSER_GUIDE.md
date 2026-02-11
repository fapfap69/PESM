# Guida Sviluppatore: Implementare un Linguaggio con PESM

**Autore**: Antonio Franco - INFN Sez. di Bari  
**Versione**: 1.0  
**Data**: 2024

---

## Introduzione

Questa guida ti mostrerà come creare un linguaggio di scripting personalizzato usando PESM. Partiremo da un linguaggio minimale tipo BASIC e costruiremo passo-passo tutte le funzionalità.

PESM usa grammatiche **pure syntax** in formato PEG (Parsing Expression Grammar) che vengono automaticamente convertite in parser PHP.

---

## Architettura del Sistema

PESM processa il codice in 4 fasi:

```
Script → Parser (PEG) → ASTBuilder → Compiler → VM
         ↓              ↓            ↓         ↓
      ParseTree      AST Array    Bytecode  Execution
```

1. **Parser (PEG)**: Analizza il testo e crea un parse tree
2. **ASTBuilder**: Converte il parse tree in AST array
3. **Compiler**: Trasforma l'AST in bytecode
4. **VM**: Esegue il bytecode con stack-based execution

---

## Esempio: Linguaggio Minimal-BASIC

Creeremo un linguaggio con queste caratteristiche:

- Variabili dinamiche
- Operazioni aritmetiche
- Cicli (FOR, WHILE)
- Condizionali (IF/THEN/ELSE)
- Input/Output (PRINT, INPUT)
- Funzioni (DEF/END)

---

## Sintassi PEG: Regole Fondamentali

### Elementi Base

```peg
# Regola semplice
NomeRegola: Espressione

# Scelta (alternativa)
Regola: alt1 | alt2 | alt3

# Sequenza
Regola: parte1 parte2 parte3

# Etichetta (cattura)
Regola: nome:Identifier _ "=" _ valore:Expression

# Quantificatori
Regola: elemento?      # 0 o 1 (opzionale)
Regola: elemento*      # 0 o più
Regola: elemento+      # 1 o più

# Lookahead negativo
Identifier: !Keyword /[a-zA-Z_][a-zA-Z0-9_]*/

# Regex
Number: /[0-9]+(\.[0-9]+)?/
String: '"' /[^"]*/ '"'

# Whitespace
_: /[ \t\n\r]*/
```

### Regole Importanti

1. **Ordine delle alternative**: Il parser prova in ordine, la prima che matcha vince
2. **Etichette**: Usare nomi descrittivi (es. `var:Identifier`, `expr:Expression`)
3. **Whitespace**: Sempre usare `_` tra token per ignorare spazi
4. **Keywords**: Sempre usare lookahead negativo per evitare conflitti

---

## Passo 1: Lessico Base

Iniziamo definendo i token fondamentali:

```peg
# Whitespace (spazi, tab, newline)
_: /[ \t\n\r]*/

# Keywords (parole riservate)
Keyword: ("LET" | "PRINT" | "INPUT" | "IF" | "THEN" | "ELSE" | "END" | "FOR" | "TO" | "NEXT" | "WHILE" | "DEF") !(/[a-zA-Z0-9_]/)

# Identificatori (nomi variabili)
Identifier: !Keyword /[a-zA-Z_][a-zA-Z0-9_]*/

# Numeri
Number: /[0-9]+(\.[0-9]+)?/

# Stringhe
String: '"' content:/[^"]*/ '"'
```

**Nota**: Il `!(/[a-zA-Z0-9_]/)` dopo Keyword assicura che "PRINT" non matchi "PRINTER".

---

## Passo 2: Espressioni (Priorità Operatori)

Le espressioni devono rispettare la precedenza matematica:

```peg
# Punto di ingresso
Expression: val:Additive

# Addizione/Sottrazione (priorità bassa)
Additive: left:Multiplicative (_ op:AddOp _ right:Multiplicative)*
AddOp: "+" | "-"

# Moltiplicazione/Divisione (priorità media)
Multiplicative: left:Unary (_ op:MulOp _ right:Unary)*
MulOp: "*" | "/"

# Unario (priorità alta)
Unary: op:UnaryOp _ expr:Unary | val:Primary
UnaryOp: "-" | "+"

# Primari (priorità massima)
Primary: val:Number | val:String | val:Identifier | "(" _ val:Expression _ ")"
```

**Esempio**: `2 + 3 * 4` viene parsato come `2 + (3 * 4)` grazie alla gerarchia.

---

## Passo 3: Statements Base

```peg
# Programma = lista di statements
Program: _ stmt:Statement (_ stmt:Statement)*

# Tipi di statement
Statement: alt:PrintStmt _ | alt:LetStmt _ | alt:InputStmt _

# LET x = 10
LetStmt: "LET" _ var:Identifier _ "=" _ expr:Expression

# PRINT "Hello"
PrintStmt: "PRINT" _ expr:Expression

# INPUT x
InputStmt: "INPUT" _ var:Identifier
```

**Test**:
```basic
LET x = 10
LET y = 20
PRINT x + y
```

---

## Passo 4: Condizionali

```peg
# Aggiungi a Statement
Statement: alt:IfStmt _ | alt:PrintStmt _ | alt:LetStmt _ | alt:InputStmt _

# IF condition THEN ... ELSE ... END
IfStmt: "IF" _ cond:Comparison _ "THEN" _ then:Statement+ ( _ "ELSE" _ else:Statement+ )? _ "END"

# Operatori di confronto
Comparison: left:Additive (_ op:CompOp _ right:Additive)*
CompOp: "==" | "!=" | ">=" | "<=" | ">" | "<"

# Aggiorna Expression per includere Comparison
Expression: val:Comparison
```

**Test**:
```basic
LET x = 10
IF x > 5 THEN
    PRINT "Grande"
ELSE
    PRINT "Piccolo"
END
```

---

## Passo 5: Cicli

### FOR Loop

```peg
# Aggiungi a Statement
Statement: alt:ForStmt _ | alt:IfStmt _ | ...

# FOR i = 1 TO 10 ... NEXT
ForStmt: "FOR" _ var:Identifier _ "=" _ from:Expression _ "TO" _ to:Expression _ body:Statement+ "NEXT"
```

### WHILE Loop

```peg
# WHILE condition ... END
WhileStmt: "WHILE" _ cond:Expression _ body:Statement+ "END"
```

**Test**:
```basic
LET sum = 0
FOR i = 1 TO 10
    LET sum = sum + i
NEXT
PRINT sum
```

---

## Passo 6: Funzioni

```peg
# DEF name(param1, param2) ... END
FunctionDef: "DEF" _ name:Identifier _ "(" _ params:ParameterList? _ ")" _ body:Statement+ "END"

ParameterList: head:Identifier (_ "," _ tail:Identifier)*

# Chiamata funzione
Primary: val:FunctionCall | val:Number | val:String | val:Identifier | "(" _ val:Expression _ ")"

FunctionCall: name:Identifier _ "(" _ args:ArgumentList? _ ")"

ArgumentList: head:Expression (_ "," _ tail:Expression)*
```

**Test**:
```basic
DEF add(a, b)
    LET result = a + b
    PRINT result
END

add(10, 20)
```

---

## Grammatica Completa: Minimal-BASIC

```peg
/*!* PEGParser

# MINIMAL-BASIC Grammar

Program: _ stmt:Statement (_ stmt:Statement)*

Statement: alt:FunctionDef _ | alt:ForStmt _ | alt:WhileStmt _ | alt:IfStmt _ | alt:PrintStmt _ | alt:InputStmt _ | alt:LetStmt _

# Statements
LetStmt: "LET" _ var:Identifier _ "=" _ expr:Expression
PrintStmt: "PRINT" _ expr:Expression
InputStmt: "INPUT" _ var:Identifier

IfStmt: "IF" _ cond:Expression _ "THEN" _ then:Statement+ ( _ "ELSE" _ else:Statement+ )? _ "END"

ForStmt: "FOR" _ var:Identifier _ "=" _ from:Expression _ "TO" _ to:Expression _ body:Statement+ "NEXT"

WhileStmt: "WHILE" _ cond:Expression _ body:Statement+ "END"

FunctionDef: "DEF" _ name:Identifier _ "(" _ params:ParameterList? _ ")" _ body:Statement+ "END"

ParameterList: head:Identifier (_ "," _ tail:Identifier)*

# Expressions
Expression: val:Comparison

Comparison: left:Additive (_ op:CompOp _ right:Additive)*
CompOp: "==" | "!=" | ">=" | "<=" | ">" | "<"

Additive: left:Multiplicative (_ op:AddOp _ right:Multiplicative)*
AddOp: "+" | "-"

Multiplicative: left:Unary (_ op:MulOp _ right:Unary)*
MulOp: "*" | "/"

Unary: op:UnaryOp _ expr:Unary | val:Primary
UnaryOp: "-" | "+"

Primary: val:FunctionCall | val:Number | val:String | val:Identifier | "(" _ val:Expression _ ")"

FunctionCall: name:Identifier _ "(" _ args:ArgumentList? _ ")"

ArgumentList: head:Expression (_ "," _ tail:Expression)*

# Lexical
String: '"' content:/[^"]*/ '"'
Number: /[0-9]+(\.[0-9]+)?/
Identifier: !Keyword /[a-zA-Z_][a-zA-Z0-9_]*/

Keyword: ("LET" | "PRINT" | "INPUT" | "IF" | "THEN" | "ELSE" | "END" | "FOR" | "TO" | "NEXT" | "WHILE" | "DEF") !(/[a-zA-Z0-9_]/)

_: /[ \t\n\r]*/

*/
```

---

## Generazione del Parser

### 1. Salva la grammatica

Crea il file `grammar/basic.peg` con la grammatica sopra.

### 2. Genera parser e converter

```bash
php bin/build-parser.php
```

Questo comando genera automaticamente:
1. `src/Parser/GeneratedParser.php` - Parser PEG specifico per la tua grammatica
2. `src/Parser/GeneratedConverter.php` - Converter specifico per la tua grammatica

### 3. ASTBuilder Universale (già presente)

PESM include un **ASTBuilder universale** (`src/Parser/ASTBuilder.php`) che:
- Supporta tutti i 29 costrutti AST di PESM
- Funziona con qualsiasi grammatica che usa questi costrutti
- **Non viene mai rigenerato** - è scritto una volta e funziona per tutte le grammatiche

**Requisiti per l'auto-funzionamento**:
- Usa etichette standard: `var:`, `expr:`, `cond:`, `body:`, `left:`, `right:`, `op:`
- Usa pattern `head:` e `tail:` per le liste
- Usa `alt:` per le alternative in Statement
- Segui le convenzioni di naming PESM

**Esempio - Questa grammatica funziona automaticamente**:

```peg
# ✅ CORRETTO - ASTBuilder universale funziona
LetStmt: "LET" _ var:Identifier _ "=" _ expr:Expression
IfStmt: "IF" _ cond:Expression _ "THEN" _ then:Statement+ _ "END"
Additive: left:Multiplicative (_ op:AddOp _ right:Multiplicative)*
ParameterList: head:Identifier (_ "," _ tail:Identifier)*
```

### 4. Flusso Completo

```
BUILD TIME (una tantum):
━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━
grammar/basic.peg
    ↓
php bin/build-parser.php
    ↓
✅ GeneratedParser.php (specifico per basic.peg)
✅ GeneratedConverter.php (specifico per basic.peg)
❌ ASTBuilder.php (universale - già esiste, mai rigenerato)


RUNTIME (ogni esecuzione):
━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━
Script
    ↓
GeneratedParser (specifico)
    ↓
ASTBuilder (universale - 29 costrutti)
    ↓
ArrayToNodeConverter
    ↓
Compiler
    ↓
VM
```

### 5. Personalizzazioni ASTBuilder (raramente necessario)

Se hai bisogno di logica custom, estendi ASTBuilder:

```php
class BasicASTBuilder extends \PESM\Parser\ASTBuilder
{
    // Override solo se necessario
    protected function buildForStmt(array $node): array
    {
        // FOR in BASIC diventa FOREACH in PESM
        $iterable = [
            '_matchrule' => 'RangeNode',
            'start' => $this->build($node['from']),
            'end' => $this->build($node['to'])
        ];
        
        return [
            '_matchrule' => 'ForeachNode',
            'variable' => $node['var']['text'],
            'iterable' => $iterable,
            'body' => $this->extractMultipleBuilt($node, 'body')
        ];
    }
    
    protected function buildPrintStmt(array $node): array
    {
        // PRINT diventa InterruptSimpleNode (MESSAGE)
        return [
            '_matchrule' => 'InterruptSimpleNode',
            'type' => 'message',
            'expression' => $this->build($node['expr'])
        ];
    }
}
```

### 5. Usa il parser

```php
use PESM\Parser\GeneratedParser;
use PESM\Parser\ASTBuilder;  // O la tua classe custom
use PESM\Parser\ArrayToNodeConverter;
use PESM\Bytecode\Compiler;
use PESM\Bytecode\VM;

// Parse
$parser = new GeneratedParser($code);
$parseTree = $parser->match_Program();

// Build AST
$builder = new ASTBuilder();  // Usa quello condiviso
$astArray = $builder->build($parseTree);

// Convert to Nodes
$converter = new ArrayToNodeConverter();
$ast = $converter->convert($astArray);

// Compile & Execute
$compiler = new Compiler();
$bytecode = $compiler->compile($ast);

$vm = new VM();
$result = $vm->execute($bytecode);

echo "Status: {$result->status}\n";
print_r($result->variables);
```

### 6. Esempio Completo

Vedi `examples/languages/basic/` per un esempio funzionante:

```
examples/languages/basic/
├── basic.peg           # Grammatica BASIC
├── BASICParser.php     # Parser generato
├── test.php            # Test del linguaggio
└── example.bas         # Codice BASIC di esempio
```

**Esegui:**
```bash
cd examples/languages/basic
php build.php           # Genera parser
php test.php            # Testa il linguaggio
```

---

## Esempi Avanzati

### Array Access

```peg
# Aggiungi a Primary
Primary: val:ArrayAccess | val:FunctionCall | ...

ArrayAccess: base:Identifier (_ "[" _ index:Expression _ "]")+
```

### Property Access (Dot Notation)

```peg
Postfix: base:Primary (_ "[" _ index:Expression _ "]" | _ "." _ prop:Identifier)*
```

### STRUCT Definition

```peg
Statement: alt:StructDef _ | ...

StructDef: "STRUCT" _ structName:Identifier (_ field:Identifier)* _ "END"

MakeStruct: "MAKE" _ structName:Identifier _ "(" _ args:ArgumentList? _ ")"
```

---

## Tips & Best Practices

### 1. Ordine delle Alternative

```peg
# SBAGLIATO: Identifier matcha prima di FunctionCall
Primary: val:Identifier | val:FunctionCall

# CORRETTO: FunctionCall ha priorità
Primary: val:FunctionCall | val:Identifier
```

### 2. Lookahead per Keywords

```peg
# SBAGLIATO: "PRINT" matcha "PRINTER"
Keyword: "PRINT" | "IF" | "END"

# CORRETTO: Verifica che non ci siano altri caratteri
Keyword: ("PRINT" | "IF" | "END") !(/[a-zA-Z0-9_]/)
```

### 3. Whitespace Consistente

```peg
# Sempre usare _ tra token
IfStmt: "IF" _ cond:Expression _ "THEN" _ body:Statement+
```

### 4. Liste con head/tail

```peg
# Pattern standard per liste
ParameterList: head:Identifier (_ "," _ tail:Identifier)*

# extractList in ASTBuilder gestisce automaticamente
```

### 5. Evitare Conflitti di Nome

```peg
# PROBLEMA: 'name' è usato dal parser internamente
StructDef: "STRUCT" _ name:Identifier  # Può causare errori

# SOLUZIONE: Usa nomi diversi
StructDef: "STRUCT" _ structName:Identifier
```

---

## Riferimenti

- **Grammatica PESM completa**: `grammar/pesm.peg`
- **Esempi linguaggi**: `examples/languages/`
  - `basic/` - BASIC-like con FOR/NEXT
  - `python-like/` - Python-like con indentazione
  - `c-like/` - C-like con parentesi graffe
  - `fortran/` - FORTRAN-like con DO/END DO
- **ASTBuilder condiviso**: `src/Parser/ASTBuilder.php`
- **Nodi AST**: `src/Parser/AST/Nodes.php`
- **Compiler**: `src/Bytecode/Compiler.php`
- **VM**: `src/Bytecode/VM.php`

---

**Buon coding!** 🚀


---

## Built-in Functions

PESM provides 19 standard built-in functions that are always available without declaration.

### Standard Functions

**String (5)**: `LEN`, `UPPER`, `LOWER`, `SUBSTR`, `TRIM`  
**Math (6)**: `ABS`, `ROUND`, `MIN`, `MAX`, `SQRT`, `POW`  
**Array (3)**: `COUNT`, `SUM`, `JOIN`  
**Type (3)**: `STR`, `INT`, `FLOAT`  
**Utility (2)**: `TIME`, `TIMESTAMP`

### Usage in Grammar

Built-in functions are called like regular functions:

```javascript
len = LEN("hello")
upper = UPPER(text)
sum = SUM(array)
```

No special grammar rules needed - they work through the standard `FunctionCall` rule.

### Custom Commands with COMMAND Directive

To add custom PHP functions, use the `COMMAND` directive:

**1. Add COMMAND to your grammar** (already in PESM grammar):

```peg
Statement: alt:CommandDecl _ | alt:FunctionDef _ | ...

CommandDecl: "COMMAND" _ head:Identifier ( _ "," _ tail:Identifier )*

Keyword: ("COMMAND" | "FUNCTION" | ...) !(/[a-zA-Z0-9_]/)
```

**2. Register the function in PHP**:

```php
$engine = new ScriptEngine();

$engine->registerCommand('SEND_EMAIL', function($args, $context) {
    return mail($args[0], $args[1], $args[2] ?? '');
});
```

**3. Declare in script**:

```javascript
COMMAND SEND_EMAIL

recipient = "user@example.com"
SEND_EMAIL(recipient, "Subject", "Body")
```

### How It Works

1. **Compiler Pre-scan**: Before compilation, the compiler scans for `COMMAND` declarations
2. **Function Resolution**: When compiling a function call:
   - Check if it's in the 19 standard built-ins → emit `CALL_BUILTIN`
   - Check if it's in declared custom commands → emit `CALL_BUILTIN`
   - Otherwise → emit `CALL` (user-defined function)
3. **VM Execution**: `CALL_BUILTIN` instruction calls the registered PHP function

### Example: Custom DSL with Commands

```peg
# workflow.peg
Program: _ stmt:Statement*

Statement: alt:CommandDecl _ | alt:ApproveStmt _ | alt:RejectStmt _

CommandDecl: "COMMAND" _ head:Identifier ( _ "," _ tail:Identifier )*

ApproveStmt: "APPROVE" _ reason:String
RejectStmt: "REJECT" _ reason:String

# ... rest of grammar
```

```php
// PHP
$engine = new ScriptEngine();
$engine->registerCommand('NOTIFY', fn($args) => sendNotification($args[0]));
$engine->registerCommand('LOG', fn($args) => logMessage($args[0]));

$result = $engine->execute('
    COMMAND NOTIFY, LOG
    
    IF amount > 1000
        LOG("High value order")
        NOTIFY("manager@company.com")
        APPROVE "Auto-approved"
    END
');
```

---

## Best Practices

### Grammar Design

1. **Use meaningful names**: `LetStmt`, `PrintStmt`, not `Stmt1`, `Stmt2`
2. **Consistent labeling**: Always use `var:`, `expr:`, `cond:`, `body:`
3. **Whitespace handling**: Always use `_` between tokens
4. **Keyword protection**: Use `!Keyword` before identifiers
5. **Operator precedence**: Follow mathematical conventions

### AST Mapping

1. **Reuse PESM nodes**: Don't create new nodes unless necessary
2. **Standard patterns**: Use `head:`/`tail:` for lists, `alt:` for choices
3. **Consistent structure**: Keep similar constructs similar

### Testing

1. **Start simple**: Test lexical rules first
2. **Incremental**: Add one feature at a time
3. **Edge cases**: Test empty lists, nested structures, operator precedence
4. **Error messages**: Ensure parse errors are clear

---

## Troubleshooting

### Parser Generation Fails

**Error**: `Syntax error in grammar`

Check:
- All rules end with newline
- No circular dependencies
- Regex patterns are valid
- All referenced rules exist

### AST Conversion Fails

**Error**: `Unknown node type`

Check:
- Node class exists in `src/Parser/AST/Nodes.php`
- Correct mapping in `ArrayToNodeConverter`
- Proper use of `_matchrule` field

### Compilation Fails

**Error**: `Undefined function`

Check:
- Function is declared with `FUNCTION` or `COMMAND`
- Custom commands are registered in PHP
- Function name matches exactly (case-sensitive)

---

## Resources

- **PESM Grammar**: `grammar/pesm.peg` - Complete reference implementation
- **AST Nodes**: `src/Parser/AST/Nodes.php` - All available node types
- **Examples**: `examples/` - Working examples of custom languages
- **Tests**: `tests/` - Test suite for reference

---

**PESM Parser Guide** - Build your domain-specific language with ease. 🚀
