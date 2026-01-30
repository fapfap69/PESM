# PESM Grammar Guide

**PESM (PHP Embedded Scripts Manager)** - Guida alla Scrittura della Grammatica PEG

---

## Indice

1. [Introduzione](#introduzione)
2. [Sintassi PEG Base](#sintassi-peg-base)
3. [Funzioni Semantiche](#funzioni-semantiche)
4. [Annotazioni AST](#annotazioni-ast)
5. [Pattern Comuni](#pattern-comuni)
6. [Linguaggio PESM](#linguaggio-pesm)
7. [Esempi Completi](#esempi-completi)

---

## Introduzione

PESM usa **php-peg** (smuuf/php-peg) per generare parser da grammatiche PEG (Parsing Expression Grammar).

### Struttura File PEG

```peg
/*!* PEGParser

# Commenti iniziano con #

RegolaNome: pattern di matching
  function handler(&$res, $sub) {
    // Funzione semantica opzionale
  }

*/
```

---

## Sintassi PEG Base

### Quantificatori

```peg
token*    # Zero o più ripetizioni
token+    # Una o più ripetizioni
token?    # Opzionale (zero o una)
```

### Sequenze e Alternative

```peg
tokena tokenb       # Sequenza: tokena seguito da tokenb
tokena | tokenb     # Alternativa: tokena O tokenb
```

### Lookahead

```peg
&token    # Lookahead positivo (presente ma non consumato)
!token    # Lookahead negativo (non presente)
```

### Gruppi

```peg
( expression )    # Raggruppamento per priorità
```

### Whitespace

```peg
< o >    # Whitespace opzionale
[ o ]    # Whitespace obbligatorio
```

### Token

```peg
"literal"              # Stringa letterale
'literal'              # Stringa letterale (alternativa)
/regex/                # Espressione regolare
RecursiveRule          # Riferimento ad altra regola
```

### Named Captures

**FONDAMENTALE**: Per catturare un match, deve essere nominato:

```peg
name:Token           # Cattura Token con nome 'name'
:Token               # Equivale a Token:Token
```

**Regola importante**: 
- 1 match → `$res['name']` è un singolo array
- N match → `$res['name']` è array di array

---

## Funzioni Semantiche

Le funzioni semantiche normalizzano l'output del parser durante il parsing.

### Sintassi Base

```peg
Rule: pattern
  function handler(&$res, $sub) {
    // $res = risultato corrente della regola
    // $sub = sotto-match catturato
  }
```

### Pattern: Normalizzare Ripetizioni

```peg
Program: stmt:Statement+
  function stmt(&$res, $sub) {
    if (!isset($res['statements'])) $res['statements'] = [];
    $res['statements'][] = $sub;
  }
```

**Risultato**: `statements` è sempre un array, anche con 1 elemento.

### Pattern: Unwrap Choice

```peg
Statement: alt:Assignment | alt:IfStatement
  function alt(&$res, $sub) {
    $res['node'] = $sub;
  }
```

**Risultato**: `node` contiene direttamente l'alternativa scelta.

### Pattern: Catturare Operatori Binari

```peg
Additive: left:Term ( _ op:AddOp _ right:Term )*
  function left(&$res, $sub) {
    $res['left'] = $sub;
  }
  function op(&$res, $sub) {
    if (!isset($res['ops'])) $res['ops'] = [];
    $res['ops'][] = $sub;
  }
  function right(&$res, $sub) {
    if (!isset($res['rights'])) $res['rights'] = [];
    $res['rights'][] = $sub;
  }
```

**Risultato**: 
```php
[
  'left' => [...],
  'ops' => ['+', '*'],
  'rights' => [[...], [...]]
]
```

### Pattern: Estrarre Contenuto

```peg
String: '"' content:/[^"]{0,}/ '"'
  function content(&$res, $sub) {
    $res['value'] = $sub['text'];
  }
```

**Risultato**: `value` contiene il testo senza le virgolette.

---

## Annotazioni AST

Le annotazioni `#node()` mappano regole PEG a classi AST:

```peg
#node(NomeNodoAST)
RegolaNome: pattern
```

### Esempio

```peg
#node(AssignmentNode)
Assignment: var:Identifier _ "=" _ expr:Expression
```

Il converter genererà:
```php
new AssignmentNode($varNode->name, $exprNode);
```

### Nodi Disponibili

- `ProgramNode` - Radice del programma
- `AssignmentNode` - Assegnamento variabile
- `LiteralNode` - Valore letterale (numero, stringa)
- `VariableNode` - Riferimento a variabile
- `BinaryOpNode` - Operazione binaria
- `IfNode` - Condizionale IF/ELSE
- `ForeachNode` - Loop FOREACH
- `MessageNode` - Comando MESSAGE
- `AcceptNode` - Comando ACCEPT
- `RefuseNode` - Comando REFUSE

---

## Pattern Comuni

### 1. Whitespace Opzionale

```peg
_: /[ \t\n\r]{0,}/
```

Usare `_` tra token per permettere spazi:

```peg
Assignment: var:Identifier _ "=" _ expr:Expression
```

### 2. Identificatori

```peg
#node(VariableNode)
Identifier: /[a-zA-Z_][a-zA-Z0-9_]{0,}/
```

**Nota**: Usare `{0,}` invece di `*` per evitare `*/` che chiude il commento PEG.

### 3. Numeri

```peg
#node(LiteralNode)
Number: /[0-9]+(\.[0-9]+)?/
```

Supporta interi e decimali: `42`, `3.14`

### 4. Stringhe

```peg
#node(LiteralNode)
String: '"' content:/[^"]{0,}/ '"'
  function content(&$res, $sub) {
    $res['value'] = $sub['text'];
  }
```

### 5. Espressioni con Precedenza

```peg
Expression: val:Logical
Logical: left:Comparison ( _ op:LogicalOp _ right:Comparison )*
Comparison: left:Additive ( _ op:CompOp _ right:Additive )*
Additive: left:Multiplicative ( _ op:AddOp _ right:Multiplicative )*
Multiplicative: left:Primary ( _ op:MulOp _ right:Primary )*
Primary: val:Number | val:Identifier | "(" _ val:Expression _ ")"
```

**Precedenza** (dal più basso al più alto):
1. Logical (AND, OR)
2. Comparison (==, !=, >, <)
3. Additive (+, -)
4. Multiplicative (*, /)
5. Primary (numeri, variabili, parentesi)

### 6. Blocchi con END

```peg
#node(IfNode)
IfStatement: "IF" _ cond:Expression _ body:Statement+ ( "ELSE" _ else:Statement+ )? "END"
  function body(&$res, $sub) {
    if (!isset($res['thenBody'])) $res['thenBody'] = [];
    $res['thenBody'][] = $sub;
  }
  function else(&$res, $sub) {
    if (!isset($res['elseBody'])) $res['elseBody'] = [];
    $res['elseBody'][] = $sub;
  }
```

---

## Linguaggio PESM

### Sintassi Completa

#### 1. Assegnamenti

```javascript
x = 42
name = "Mario"
result = 10 + 5
```

#### 2. Operatori Matematici

```javascript
sum = 10 + 5        // 15
diff = 20 - 8       // 12
prod = 3 * 4        // 12
quot = 20 / 4       // 5
```

#### 3. Operatori di Confronto

```javascript
x = 10 > 5          // true (1)
x = 10 < 5          // false (0)
x = 10 == 10        // true
x = 10 != 5         // true
x = 10 >= 10        // true
x = 5 <= 10         // true
```

#### 4. Operatori Logici

```javascript
x = 1 > 0 AND 2 > 1     // true
x = 1 > 0 OR 2 < 1      // true
```

#### 5. IF/ELSE

```javascript
age = 25
IF age >= 18
  status = 1
ELSE
  status = 0
END
```

**IF annidati**:
```javascript
score = 85
IF score >= 90
  grade = 5
ELSE
  IF score >= 70
    grade = 4
  ELSE
    grade = 3
  END
END
```

#### 6. FOREACH

```javascript
sum = 0
FOREACH i = 1 TO 5
  sum = sum + i
END
// sum = 15 (1+2+3+4+5)
```

**FOREACH annidato**:
```javascript
total = 0
FOREACH i = 1 TO 3
  FOREACH j = 1 TO 2
    total = total + 1
  END
END
// total = 6
```

#### 7. MESSAGE

```javascript
MESSAGE "Hello World"
```

#### 8. ACCEPT/REFUSE

```javascript
IF score >= 60
  ACCEPT "approved"
ELSE
  REFUSE "rejected"
END
```

---

## Esempi Completi

### Esempio 1: Calcolo Fattoriale

```javascript
n = 5
result = 1
FOREACH i = 1 TO n
  result = result * i
END
MESSAGE "Factorial"
// result = 120
```

### Esempio 2: Validazione Form

```javascript
age = 25
score = 85

IF age >= 18
  IF score >= 60
    status = 1
    ACCEPT "approved"
  ELSE
    status = 0
    REFUSE "low_score"
  END
ELSE
  status = 0
  REFUSE "underage"
END
```

### Esempio 3: Somma Pari

```javascript
sum = 0
FOREACH i = 1 TO 10
  remainder = i - i / 2 * 2
  IF remainder == 0
    sum = sum + i
  END
END
// sum = 30 (2+4+6+8+10)
```

### Esempio 4: Workflow Decision

```javascript
amount = 1500
approved = 0

IF amount <= 1000
  approved = 1
  ACCEPT "auto_approved"
ELSE
  IF amount <= 5000
    MESSAGE "Requires manager approval"
    approved = 0
  ELSE
    MESSAGE "Requires director approval"
    approved = 0
    REFUSE "amount_too_high"
  END
END
```

### Esempio 5: Calcolo Media

```javascript
sum = 0
count = 5

FOREACH i = 1 TO count
  sum = sum + i * 10
END

average = sum / count
MESSAGE "Average calculated"
// average = 30
```

---

## Best Practices

### 1. Usare Funzioni Semantiche

✅ **Buono**:
```peg
Program: stmt:Statement+
  function stmt(&$res, $sub) {
    if (!isset($res['statements'])) $res['statements'] = [];
    $res['statements'][] = $sub;
  }
```

❌ **Evitare**:
```peg
Program: Statement+
# Output imprevedibile: singolo o array?
```

### 2. Nominare Tutte le Catture

✅ **Buono**:
```peg
Assignment: var:Identifier _ "=" _ expr:Expression
```

❌ **Evitare**:
```peg
Assignment: Identifier "=" Expression
# Nessuna cattura!
```

### 3. Gestire Precedenza Operatori

✅ **Buono**:
```peg
Expression: Logical
Logical: Comparison ( LogicalOp Comparison )*
Comparison: Additive ( CompOp Additive )*
Additive: Multiplicative ( AddOp Multiplicative )*
```

❌ **Evitare**:
```peg
Expression: Term ( Operator Term )*
# Precedenza sbagliata!
```

### 4. Evitare `*/` nei Regex

✅ **Buono**:
```peg
Identifier: /[a-zA-Z_][a-zA-Z0-9_]{0,}/
```

❌ **Evitare**:
```peg
Identifier: /[a-zA-Z_][a-zA-Z0-9_]*/
# */ chiude il commento PEG!
```

### 5. Normalizzare Choice

✅ **Buono**:
```peg
Statement: alt:Assignment | alt:IfStatement
  function alt(&$res, $sub) {
    $res['node'] = $sub;
  }
```

❌ **Evitare**:
```peg
Statement: Assignment | IfStatement
# Non cattura quale alternativa!
```

---

## Troubleshooting

### Problema: Parser ritorna false

**Causa**: Grammatica non matcha l'input.

**Soluzione**: 
1. Testare regole singole: `$parser->match_RuleName()`
2. Verificare whitespace: aggiungere `_` tra token
3. Controllare precedenza operatori

### Problema: Converter fallisce con "No converter for type"

**Causa**: Manca annotazione `#node()` o funzione semantica.

**Soluzione**:
1. Aggiungere `#node(NodeClass)` alla regola
2. Oppure gestire in `unwrap()` del converter

### Problema: Variabili non salvate

**Causa**: `ExecutionContext.set()` salva in scope invece di variables.

**Soluzione**: Modificare `set()` per salvare in `$this->variables`.

### Problema: Operatori non funzionano

**Causa**: Funzioni semantiche non catturano `ops` e `rights`.

**Soluzione**: Aggiungere funzioni per `op` e `right` che popolano array.

---

## Riferimenti

- **php-peg**: https://github.com/smuuf/php-peg
- **PEG Syntax**: https://en.wikipedia.org/wiki/Parsing_expression_grammar
- **PESM Source**: `grammar/pesm.peg`

---

**PESM v1.0.0** - Antonio Franco, INFN Sez. di Bari
