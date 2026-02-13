# Developer Guide: Implementing a Language with PESM

**Author**: Antonio Franco - INFN Sez. di Bari  
**Version**: 1.0  
**Date**: 2025

---

## Introduction

This guide will show you how to create a custom scripting language using PESM. We'll start with a minimal BASIC-like language and build all features step by step.

PESM uses **pure syntax** grammars in PEG (Parsing Expression Grammar) format that are automatically converted to PHP parsers.

---

## System Architecture

PESM processes code in 4 phases:

```
Script → Parser (PEG) → ASTBuilder → Compiler → VM
         ↓              ↓            ↓         ↓
      ParseTree      AST Array    Bytecode  Execution
```

1. **Parser (PEG)**: Analyzes text and creates a parse tree
2. **ASTBuilder**: Converts parse tree to AST array
3. **Compiler**: Transforms AST into bytecode
4. **VM**: Executes bytecode with stack-based execution

---

## Example: Minimal-BASIC Language

We'll create a language with these features:

- Dynamic variables
- Arithmetic operations
- Loops (FOR, WHILE)
- Conditionals (IF/THEN/ELSE)
- Input/Output (PRINT, INPUT)
- Functions (DEF/END)

---

## PEG Syntax: Fundamental Rules

### Basic Elements

```peg
# Simple rule
RuleName: Expression

# Choice (alternative)
Rule: alt1 | alt2 | alt3

# Sequence
Rule: part1 part2 part3

# Label (capture)
Rule: name:Identifier _ "=" _ value:Expression

# Quantifiers
Rule: element?      # 0 or 1 (optional)
Rule: element*      # 0 or more
Rule: element+      # 1 or more

# Negative lookahead
Identifier: !Keyword /[a-zA-Z_][a-zA-Z0-9_]*/

# Regex
Number: /[0-9]+(\.[0-9]+)?/
String: '"' /[^"]*/ '"'

# Whitespace
_: /[ \t\n\r]*/
```

### Important Rules

1. **Alternative order**: Parser tries in order, first match wins
2. **Labels**: Use descriptive names (e.g. `var:Identifier`, `expr:Expression`)
3. **Whitespace**: Always use `_` between tokens to ignore spaces
4. **Keywords**: Always use negative lookahead to avoid conflicts

---

## Step 1: Basic Lexicon

Let's start by defining fundamental tokens:

```peg
# Whitespace (spaces, tabs, newlines)
_: /[ \t\n\r]*/

# Keywords (reserved words)
Keyword: ("LET" | "PRINT" | "INPUT" | "IF" | "THEN" | "ELSE" | "END" | "FOR" | "TO" | "NEXT" | "WHILE" | "DEF") !(/[a-zA-Z0-9_]/)

# Identifiers (variable names)
Identifier: !Keyword /[a-zA-Z_][a-zA-Z0-9_]*/

# Numbers
Number: /[0-9]+(\.[0-9]+)?/

# Strings
String: '"' content:/[^"]*/ '"'
```

**Note**: The `!(/[a-zA-Z0-9_]/)` after Keyword ensures "PRINT" doesn't match "PRINTER".

---

## Step 2: Expressions (Operator Precedence)

Expressions must respect mathematical precedence:

```peg
# Entry point
Expression: val:Additive

# Addition/Subtraction (low priority)
Additive: left:Multiplicative (_ op:AddOp _ right:Multiplicative)*
AddOp: "+" | "-"

# Multiplication/Division (medium priority)
Multiplicative: left:Unary (_ op:MulOp _ right:Unary)*
MulOp: "*" | "/"

# Unary (high priority)
Unary: op:UnaryOp _ expr:Unary | val:Primary
UnaryOp: "-" | "+"

# Primary (highest priority)
Primary: val:Number | val:String | val:Identifier | "(" _ val:Expression _ ")"
```

**Example**: `2 + 3 * 4` is parsed as `2 + (3 * 4)` thanks to the hierarchy.

---

## Step 3: Basic Statements

```peg
# Program = list of statements
Program: _ stmt:Statement (_ stmt:Statement)*

# Statement types
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
// Variable declarations
LET x = 10
LET y = 20

// Print sum
PRINT x + y  // Output: 30
```

---

## Step 4: Conditionals

```peg
# Add to Statement
Statement: alt:IfStmt _ | alt:PrintStmt _ | alt:LetStmt _ | alt:InputStmt _

# IF condition THEN ... ELSE ... END
IfStmt: "IF" _ cond:Comparison _ "THEN" _ then:Statement+ ( _ "ELSE" _ else:Statement+ )? _ "END"

# Comparison operators
Comparison: left:Additive (_ op:CompOp _ right:Additive)*
CompOp: "==" | "!=" | ">=" | "<=" | ">" | "<"

# Update Expression to include Comparison
Expression: val:Comparison
```

**Test**:
```basic
// Check value range
LET x = 10
IF x > 5 THEN
    PRINT "Large"  // This will execute
ELSE
    PRINT "Small"
END
```

---

## Step 5: Loops

### FOR Loop

```peg
# Add to Statement
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
// Calculate sum from 1 to 10
LET sum = 0
FOR i = 1 TO 10
    LET sum = sum + i  // Add each number
NEXT
PRINT sum  // Output: 55
```

---

## Step 6: Functions

```peg
# DEF name(param1, param2) ... END
FunctionDef: "DEF" _ name:Identifier _ "(" _ params:ParameterList? _ ")" _ body:Statement+ "END"

ParameterList: head:Identifier (_ "," _ tail:Identifier)*

# Function call
Primary: val:FunctionCall | val:Number | val:String | val:Identifier | "(" _ val:Expression _ ")"

FunctionCall: name:Identifier _ "(" _ args:ArgumentList? _ ")"

ArgumentList: head:Expression (_ "," _ tail:Expression)*
```

**Test**:
```basic
// Define addition function
DEF add(a, b)
    LET result = a + b
    PRINT result
END

// Call function
add(10, 20)  // Output: 30
```

---

## Complete Grammar: Minimal-BASIC

```peg
/*!* PEGParser

# MINIMAL-BASIC Grammar

Program: _ stmt:Statement (_ stmt:Statement)* _ !/./

Statement: alt:Comment _ | alt:FunctionDef _ | alt:ForStmt _ | alt:WhileStmt _ | alt:IfStmt _ | alt:PrintStmt _ | alt:InputStmt _ | alt:LetStmt _

# Comments
Comment: '//' /[^\n]+/

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

## Parser Generation

### 1. Save the grammar

Create file `grammar/basic.peg` with the grammar above.

### 2. Generate parser and converter

```bash
php bin/build-parser.php
```

This command automatically generates:
1. `src/Parser/GeneratedParser.php` - PEG parser specific to your grammar
2. `src/Parser/GeneratedConverter.php` - Converter specific to your grammar

### 3. Universal ASTBuilder (already present)

PESM includes a **universal ASTBuilder** (`src/Parser/ASTBuilder.php`) that:
- Supports all 33 PESM AST constructs (29 core + 4 additional)
- Works with any grammar using these constructs
- **Never regenerated** - written once and works for all grammars

**Requirements for auto-functioning**:
- Use standard labels: `var:`, `expr:`, `cond:`, `body:`, `left:`, `right:`, `op:`
- Use `head:` and `tail:` patterns for lists
- Use `alt:` for alternatives in Statement
- Follow PESM naming conventions

**Example - This grammar works automatically**:

```peg
# ✅ CORRECT - Universal ASTBuilder works
LetStmt: "LET" _ var:Identifier _ "=" _ expr:Expression
IfStmt: "IF" _ cond:Expression _ "THEN" _ then:Statement+ _ "END"
Additive: left:Multiplicative (_ op:AddOp _ right:Multiplicative)*
ParameterList: head:Identifier (_ "," _ tail:Identifier)*
```

### 4. Complete Flow

```
BUILD TIME (one-time):
━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━
grammar/basic.peg
    ↓
php bin/build-parser.php
    ↓
✅ GeneratedParser.php (specific to basic.peg)
✅ GeneratedConverter.php (specific to basic.peg)
❌ ASTBuilder.php (universal - already exists, never regenerated)


RUNTIME (every execution):
━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━
Script
    ↓
GeneratedParser (specific)
    ↓
ASTBuilder (universal - 33 constructs)
    ↓
ArrayToNodeConverter
    ↓
Compiler
    ↓
VM
```

### 5. ASTBuilder Customizations (rarely needed)

If you need custom logic, extend ASTBuilder:

```php
class BasicASTBuilder extends \PESM\Parser\ASTBuilder
{
    // Override only if necessary
    protected function buildForStmt(array $node): array
    {
        // FOR in BASIC becomes FOREACH in PESM
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
        // PRINT becomes InterruptSimpleNode (MESSAGE)
        return [
            '_matchrule' => 'InterruptSimpleNode',
            'type' => 'message',
            'expression' => $this->build($node['expr'])
        ];
    }
}
```

### 6. Use the parser

```php
use PESM\Parser\GeneratedParser;
use PESM\Parser\ASTBuilder;  // Or your custom class
use PESM\Parser\ArrayToNodeConverter;
use PESM\Bytecode\Compiler;
use PESM\Bytecode\VM;

// Parse
$parser = new GeneratedParser($code);
$parseTree = $parser->match_Program();

// Build AST
$builder = new ASTBuilder();  // Use the shared one
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

### 7. Complete Example

See `examples/04-multi-language/basic/` for a working example:

```
examples/04-multi-language/basic/
├── basic.peg           # BASIC grammar
├── BASICParser.php     # Generated parser
├── test.php            # Language test
└── example.bas         # BASIC example code
```

**Run:**
```bash
cd examples/04-multi-language/basic
php build.php           # Generate parser
php test.php            # Test the language
```

---

## Advanced Examples

### Array Access

```peg
# Add to Primary
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

## Tips & Best Practices

### 1. Alternative Order

```peg
# WRONG: Identifier matches before FunctionCall
Primary: val:Identifier | val:FunctionCall

# CORRECT: FunctionCall has priority
Primary: val:FunctionCall | val:Identifier
```

### 2. Lookahead for Keywords

```peg
# WRONG: "PRINT" matches "PRINTER"
Keyword: "PRINT" | "IF" | "END"

# CORRECT: Verify no other characters follow
Keyword: ("PRINT" | "IF" | "END") !(/[a-zA-Z0-9_]/)
```

### 3. Consistent Whitespace

```peg
# Always use _ between tokens
IfStmt: "IF" _ cond:Expression _ "THEN" _ body:Statement+
```

### 4. Lists with head/tail

```peg
# Standard pattern for lists
ParameterList: head:Identifier (_ "," _ tail:Identifier)*

# extractList in ASTBuilder handles automatically
```

### 5. Avoid Name Conflicts

```peg
# PROBLEM: 'name' is used internally by parser
StructDef: "STRUCT" _ name:Identifier  # May cause errors

# SOLUTION: Use different names
StructDef: "STRUCT" _ structName:Identifier
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

## References

- **PESM Grammar**: `grammar/pesm.peg` - Complete reference implementation
- **AST Nodes**: `src/Parser/AST/Nodes.php` - All available node types
- **Examples**: `examples/04-multi-language/` - Working examples of custom languages
  - `basic/` - BASIC-like with FOR/NEXT
  - `python-like/` - Python-like with indentation
  - `c-like/` - C-like with braces
  - `fortran/` - FORTRAN-like with DO/END DO
- **ASTBuilder**: `src/Parser/ASTBuilder.php` - Universal AST builder
- **Compiler**: `src/Bytecode/Compiler.php` - Bytecode compiler
- **VM**: `src/Bytecode/VM.php` - Virtual machine
- **Tests**: `tests/` - Test suite for reference

---

**PESM Parser Guide** - Build your domain-specific language with ease. 🚀
