# PESM Integration Guide

**How to embed custom scripting languages in your PHP applications**

---

## What is PESM?

PESM (PHP Embedded Scripts Manager) is a **scripting language toolkit** that allows PHP developers to create domain-specific languages (DSLs) for their applications.

### Key Concept

Instead of forcing users to learn a generic scripting language, PESM lets you create a **custom syntax** that matches your application's domain, while reusing a complete execution infrastructure.

**Example**: 
- Workflow app → `APPROVE order IF amount < 1000`
- Config system → `SET cache ENABLED WHEN production`
- Business rules → `DISCOUNT 10% FOR premium customers`

All these different syntaxes use the same underlying execution engine.

---

## How It Works

```
┌─────────────────────────────────────────────────────────┐
│  1. Define Custom Grammar (PEG)                          │
│     Your domain-specific syntax                          │
└────────────────┬────────────────────────────────────────┘
                 │
                 ▼
┌─────────────────────────────────────────────────────────┐
│  2. Map to 28 AST Constructs                             │
│     IF, WHILE, ASSIGN, FUNCTION, etc.                    │
└────────────────┬────────────────────────────────────────┘
                 │
                 ▼
┌─────────────────────────────────────────────────────────┐
│  3. Generate Parser + Converter                          │
│     php bin/build-parser.php                             │
└────────────────┬────────────────────────────────────────┘
                 │
                 ▼
┌─────────────────────────────────────────────────────────┐
│  4. Execute Scripts                                      │
│     Compiler + VM (already provided)                     │
└─────────────────────────────────────────────────────────┘
```

**You only write the grammar** - PESM handles parsing, compilation, and execution.

---

## Quick Start: Use the Default PESM Language

The easiest way to start is using the included PESM language.

### Installation

```bash
composer require infn/pesm
```

### Build System (for custom grammars)

If you modify the grammar or create a custom one:

```bash
php bin/build-parser.php
```

This generates:
- `src/Parser/GeneratedParser.php` - Grammar-specific parser
- `src/Parser/GeneratedConverter.php` - Grammar-specific converter

**Note**: `ASTBuilder.php` is universal (supports all 29 PESM constructs) and never needs regeneration.

### Basic Usage

```php
<?php
require_once 'vendor/autoload.php';

use PESM\ScriptEngine;

$engine = new ScriptEngine();

$result = $engine->execute('
    price = 100
    quantity = 5
    total = price * quantity
    
    IF total > 400
        discount = 10
    ELSE
        discount = 0
    END
    
    MESSAGE "Total: " + total + ", Discount: " + discount
');

if ($result['status'] === 'interrupted') {
    echo $result['actionData']; // "Total: 500, Discount: 10"
}
```

### Passing Variables

```php
$result = $engine->execute(
    script: '
        total = price * quantity
        IF customer_type == "premium"
            discount = 20
        END
    ',
    variables: [
        'price' => 25.50,
        'quantity' => 3,
        'customer_type' => 'premium'
    ]
);

echo $result['variables']['discount']; // 20
```

---

## The 28 AST Constructs

PESM provides 28 ready-to-use AST node types that cover most non-OOP language features:

### 1. Literals & Variables
- **LiteralNode** - Numbers, strings, booleans
- **VariableNode** - Variable references
- **ArrayLiteralNode** - Array literals `[1, 2, 3]`
- **ObjectLiteralNode** - Object literals `{"key": "value"}`

### 2. Operators
- **BinaryOpNode** - `+`, `-`, `*`, `/`, `%`, `==`, `!=`, `>`, `<`, `>=`, `<=`, `AND`, `OR`
- **UnaryOpNode** - `-`, `+`, `NOT`

### 3. Data Access
- **ArrayAccessNode** - `arr[index]`, `matrix[i][j]`
- **PropertyAccessNode** - `obj.property` (dot notation)
- **AssignmentNode** - `x = value`, `arr[i] = value`

### 4. Control Flow
- **IfNode** - IF/ELSE conditionals
- **WhileNode** - WHILE loops
- **DoWhileNode** - DO-WHILE loops
- **RepeatUntilNode** - REPEAT-UNTIL loops
- **ForeachNode** - FOREACH iteration
- **SwitchNode** - SWITCH/CASE statements
- **BreakNode** - Break from loops
- **ContinueNode** - Continue to next iteration

### 5. Functions
- **FunctionDefNode** - Function definitions
- **FunctionCallNode** - Function calls
- **ReturnNode** - Return from functions

### 6. Structured Programming
- **BlockNode** - Statement blocks
- **LabelNode** - Labels for GOTO
- **GotoNode** - GOTO statements

### 7. Interrupts (Web Integration)
- **InterruptNode** - Generic interrupt
- **InterruptSimpleNode** - MESSAGE, ACCEPT, REFUSE
- **InterruptInputNode** - INPUT, PROMPT

### 8. Custom Types
- **StructDefNode** - Define custom data structures
- **MakeStructNode** - Instantiate structs

---

## Creating Your Custom Language

### Step 1: Define Your Grammar

Create a PEG grammar file that maps to PESM's AST nodes.

**Example**: Simple workflow language

```peg
# grammar/workflow.peg

Program: _ statements:Statement* _ { return new ProgramNode($statements); }

Statement: ApproveStmt | RejectStmt | NotifyStmt | IfStmt

ApproveStmt: "APPROVE" _ reason:String {
    return new InterruptSimpleNode('accept', new LiteralNode($reason));
}

RejectStmt: "REJECT" _ reason:String {
    return new InterruptSimpleNode('refuse', new LiteralNode($reason));
}

NotifyStmt: "NOTIFY" _ message:String {
    return new InterruptSimpleNode('message', new LiteralNode($message));
}

IfStmt: "IF" _ cond:Condition _ "THEN" _ then:Statement+ _ "END" {
    return new IfNode($cond, $then, []);
}

Condition: field:Identifier _ op:Operator _ value:Value {
    return new BinaryOpNode(
        new VariableNode($field),
        $op,
        new LiteralNode($value)
    );
}

Operator: ">" | "<" | "==" | "!="
Identifier: [a-z_]+ { return $text; }
String: '"' [^"]* '"' { return substr($text, 1, -1); }
Value: [0-9]+ { return (int)$text; }
_ : [ \t\n\r]*
```

### Step 2: Generate Parser

```bash
php bin/build-parser.php grammar/workflow.peg
```

This generates:
- `src/Parser/GeneratedParser.php`
- `src/Parser/GeneratedConverter.php`

### Step 3: Use Your Language

```php
$engine = new ScriptEngine();

$result = $engine->execute('
    IF amount > 1000 THEN
        NOTIFY "High value order"
        APPROVE "Auto-approved"
    END
');
```

---

## Interrupt/Resume Pattern

PESM's killer feature: scripts can **pause** and **resume** execution, perfect for web workflows.

### How It Works

When a script executes `MESSAGE`, `INPUT`, `ACCEPT`, or `REFUSE`, the VM:
1. **Pauses** execution
2. Returns control to PHP with current state
3. Waits for user response
4. **Resumes** from exact same point

### Example: Multi-Step Form

```php
$script = '
    INPUT "Enter your name: " name
    INPUT "Enter your age: " age
    
    IF age < 18
        REFUSE "Must be 18 or older"
    END
    
    ACCEPT "Registration complete"
';

// First execution - pauses at first INPUT
$result = $engine->execute($script);

while ($result['status'] === 'interrupted') {
    if ($result['action'] === 'input') {
        // Show form to user
        echo $result['actionData']; // "Enter your name: "
        $userInput = getUserInput();
        
        // Resume with user's response
        $result = $engine->resume(
            $script,
            $result['state'],
            $result['resumeFrom'],
            $userInput
        );
    }
}

// Final result
if ($result['status'] === 'success') {
    echo "Done!";
}
```

### Interrupt Types

| Command | Action | Use Case |
|---------|--------|----------|
| `MESSAGE "text"` | Display message | Notifications, logging |
| `INPUT "prompt" var` | Request input | Forms, user interaction |
| `ACCEPT "reason"` | Approve workflow | Workflow approval |
| `REFUSE "reason"` | Reject workflow | Workflow rejection |

---

## Real-World Integration Patterns

### Pattern 1: Business Rules Engine

```php
class RulesEngine {
    private ScriptEngine $engine;
    
    public function evaluateOrder(array $order): array {
        $rules = $this->loadRules(); // From database
        
        $result = $this->engine->execute(
            script: $rules,
            variables: $order
        );
        
        return [
            'approved' => $result['status'] === 'success',
            'discount' => $result['variables']['discount'] ?? 0,
            'reason' => $result['actionData'] ?? null
        ];
    }
}

// Usage
$engine = new RulesEngine();
$result = $engine->evaluateOrder([
    'amount' => 1500,
    'customer_type' => 'premium',
    'items_count' => 5
]);
```

### Pattern 2: Workflow System

```php
class WorkflowEngine {
    private ScriptEngine $engine;
    private PDO $db;
    
    public function startWorkflow(int $workflowId, array $data): string {
        $workflow = $this->loadWorkflow($workflowId);
        
        $result = $this->engine->execute(
            script: $workflow['script'],
            variables: $data
        );
        
        if ($result['status'] === 'interrupted') {
            // Save state for later resume
            $this->saveState($workflowId, $result);
            return 'pending';
        }
        
        return 'completed';
    }
    
    public function resumeWorkflow(int $workflowId, $userResponse): string {
        $state = $this->loadState($workflowId);
        
        $result = $this->engine->resume(
            $state['script'],
            $state['state'],
            $state['resumeFrom'],
            $userResponse
        );
        
        if ($result['status'] === 'interrupted') {
            $this->saveState($workflowId, $result);
            return 'pending';
        }
        
        return 'completed';
    }
}
```

### Pattern 3: Configuration DSL

```php
// Define grammar for config language
// grammar/config.peg
/*
SET cache ENABLED
SET debug DISABLED WHEN production
IF environment == "dev" THEN
    SET log_level DEBUG
END
*/

class ConfigLoader {
    private ScriptEngine $engine;
    
    public function loadConfig(string $configScript): array {
        $result = $this->engine->execute(
            script: $configScript,
            variables: [
                'environment' => getenv('APP_ENV')
            ]
        );
        
        return $result['variables'];
    }
}
```

---

## Advanced Features

### Built-in Functions

PESM provides 19 standard built-in functions always available:

**String Functions (5)**
```javascript
len = LEN("hello")           // 5
upper = UPPER("hello")       // "HELLO"
lower = LOWER("WORLD")       // "world"
sub = SUBSTR("hello", 0, 3)  // "hel"
trimmed = TRIM("  text  ")   // "text"
```

**Math Functions (6)**
```javascript
abs_val = ABS(-5)            // 5
rounded = ROUND(3.7)         // 4
min_val = MIN(5, 3, 8)       // 3
max_val = MAX(5, 3, 8)       // 8
sqrt_val = SQRT(16)          // 4
power = POW(2, 3)            // 8
```

**Array Functions (3)**
```javascript
arr = [1, 2, 3, 4, 5]
count = COUNT(arr)           // 5
sum = SUM(arr)               // 15
joined = JOIN(arr, "-")      // "1-2-3-4-5"
```

**Type Conversion (3)**
```javascript
str_val = STR(123)           // "123"
int_val = INT("456")         // 456
float_val = FLOAT("3.14")    // 3.14
```

**Utility Functions (2)**
```javascript
timestamp = TIME()           // 1707654321 (Unix seconds)
formatted = TIMESTAMP()      // "11/02/2024 15:30:45"
```

### Custom Commands

Register PHP functions callable from scripts:

```php
$engine = new ScriptEngine();

// Register custom command
$engine->registerCommand('SEND_EMAIL', function($args, $context) {
    $to = $args[0];
    $subject = $args[1];
    $body = $args[2] ?? '';
    
    return mail($to, $subject, $body);
});

// Declare in script with COMMAND directive
$result = $engine->execute('
    COMMAND SEND_EMAIL
    
    SEND_EMAIL("user@example.com", "Welcome", "Thanks for signing up")
');
```

**COMMAND Directive**: Declares custom functions in the script. This tells the compiler to treat them as built-in commands rather than user-defined functions.

```javascript
// Declare multiple custom commands
COMMAND SEND_EMAIL, LOG, VALIDATE

// Now you can use them
SEND_EMAIL("user@test.com", "Hello")
LOG("Application started")
result = VALIDATE(data)
```

### State Persistence

For long-running workflows, persist state in database:

```php
// Save state
$stmt = $pdo->prepare('
    UPDATE workflows 
    SET state = ?, resume_from = ? 
    WHERE id = ?
');
$stmt->execute([
    json_encode($result['state']),
    $result['resumeFrom'],
    $workflowId
]);

// Load state
$stmt = $pdo->prepare('
    SELECT state, resume_from 
    FROM workflows 
    WHERE id = ?
');
$stmt->execute([$workflowId]);
$row = $stmt->fetch();

$result = $engine->resume(
    $script,
    json_decode($row['state'], true),
    $row['resume_from'],
    $userInput
);
```

### Error Handling

```php
try {
    $result = $engine->execute($script);
    
    if ($result['status'] === 'error') {
        error_log("Script error: " . $result['error']);
        // Handle gracefully
    }
    
} catch (\Exception $e) {
    error_log("Engine error: " . $e->getMessage());
    // Critical error
}
```

---

## Grammar Development Tips

### 1. Start Simple

Begin with basic constructs, add complexity gradually:

```peg
# Version 1: Just assignments
Statement: Assignment
Assignment: var:Identifier _ "=" _ val:Number

# Version 2: Add conditionals
Statement: Assignment | IfStmt
IfStmt: "IF" _ cond:Condition _ "THEN" _ body:Statement+ _ "END"

# Version 3: Add loops
Statement: Assignment | IfStmt | WhileStmt
```

### 2. Reuse PESM Patterns

Look at `grammar/pesm.peg` for proven patterns:

```peg
# Expression with operator precedence
Expression: Comparison
Comparison: left:Addition _ op:CompOp _ right:Addition
Addition: left:Multiplication _ op:AddOp _ right:Multiplication
Multiplication: left:Primary _ op:MulOp _ right:Primary
Primary: Number | String | Variable | "(" _ Expression _ ")"
```

### 3. Map to AST Nodes

Always return PESM AST nodes from grammar rules:

```peg
Assignment: var:Identifier _ "=" _ expr:Expression {
    return new AssignmentNode($var, $expr);
}

IfStmt: "IF" _ cond:Expression _ "THEN" _ body:Statement+ _ "END" {
    return new IfNode($cond, $body, []);
}
```

### 4. Test Incrementally

Test each grammar change:

```bash
# Edit grammar
vim grammar/myapp.peg

# Rebuild parser
php bin/build-parser.php grammar/myapp.peg

# Test
php tests/test_mygrammar.php
```

---

## Performance Optimization

### Bytecode Compilation

Scripts are compiled to bytecode for fast execution (2.7-3.6x faster than AST interpretation).

**Benchmark** (1000 iterations):
- Simple math: 120ms → 45ms (2.7x)
- IF statement: 150ms → 55ms (2.7x)
- FOREACH loop: 280ms → 95ms (2.9x)
- Resume: 180ms → 50ms (3.6x)

### Caching Strategy

Cache compiled bytecode to avoid re-parsing:

```php
class CachedEngine {
    private ScriptEngine $engine;
    private $cache; // Redis, Memcached, etc.
    
    public function execute(string $script, array $vars = []): array {
        $key = 'script:' . md5($script);
        
        // Check cache
        $bytecode = $this->cache->get($key);
        
        if (!$bytecode) {
            // Compile and cache
            $result = $this->engine->execute($script, $vars);
            // Note: Bytecode caching requires engine extension
            $this->cache->set($key, $result, 3600);
            return $result;
        }
        
        return $this->engine->execute($script, $vars);
    }
}
```

See [PERFORMANCE.md](PERFORMANCE.md) for detailed optimization techniques.

---

## Production Deployment

### Security Checklist

```php
class SecureEngine {
    private ScriptEngine $engine;
    
    public function execute(string $script, array $vars = []): array {
        // 1. Validate script length
        if (strlen($script) > 50000) {
            throw new \Exception('Script too large');
        }
        
        // 2. Set execution limits
        set_time_limit(30);
        ini_set('memory_limit', '128M');
        
        // 3. Sanitize variables
        $vars = $this->sanitizeVariables($vars);
        
        // 4. Execute with error handling
        try {
            return $this->engine->execute($script, $vars);
        } catch (\Exception $e) {
            error_log($e->getMessage());
            return ['status' => 'error', 'error' => 'Execution failed'];
        }
    }
    
    private function sanitizeVariables(array $vars): array {
        // Remove dangerous values
        return array_filter($vars, fn($v) => !is_resource($v));
    }
}
```

### Docker Deployment

```dockerfile
FROM php:8.2-fpm

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Copy application
WORKDIR /var/www/html
COPY . .

# Install PESM
RUN composer require infn/pesm

# Build parser (if using custom grammar)
RUN php bin/build-parser.php grammar/myapp.peg

# Configure PHP
RUN echo "memory_limit = 256M" >> /usr/local/etc/php/conf.d/pesm.ini
RUN echo "max_execution_time = 60" >> /usr/local/etc/php/conf.d/pesm.ini

EXPOSE 9000
CMD ["php-fpm"]
```

---

## Troubleshooting

### Parser Generation Fails

**Error**: `Syntax error in grammar`

**Solution**: Check PEG syntax, ensure all rules are defined:

```bash
php bin/build-parser.php grammar/myapp.peg --verbose
```

### Script Execution Hangs

**Error**: Script never completes

**Solution**: Add timeout and check for infinite loops:

```php
set_time_limit(30);
$result = $engine->execute($script);
```

### Memory Limit Exceeded

**Error**: `Allowed memory size exhausted`

**Solution**: Increase memory or simplify script:

```php
ini_set('memory_limit', '256M');
```

### Resume Fails

**Error**: `Cannot resume from invalid state`

**Solution**: Ensure state is properly serialized:

```php
// Save state
$stateJson = json_encode($result['state']);

// Load state
$state = json_decode($stateJson, true);
$result = $engine->resume($script, $state, $resumeFrom, $input);
```

---

## Examples

See the `examples/` directory for complete working examples:

- **01-basic/** - Simple script execution
- **02-custom-grammar/** - Creating a custom DSL
- **03-workflow/** - Multi-step workflow with interrupts
- **04-business-rules/** - Business rules engine
- **05-config-dsl/** - Configuration language

---

## API Reference

### ScriptEngine

```php
class ScriptEngine {
    // Execute a script
    public function execute(
        string $script, 
        array $variables = []
    ): array;
    
    // Resume interrupted script
    public function resume(
        string $script,
        array $state,
        int $resumeFrom,
        mixed $returnValue = null
    ): array;
    
    // Register custom command
    public function registerCommand(
        string $name, 
        callable $handler
    ): void;
}
```

### Result Array

```php
[
    'status' => 'success' | 'interrupted' | 'error',
    'variables' => [...],           // Script variables
    'state' => [...],               // VM state (for resume)
    'resumeFrom' => int,            // Resume point
    'action' => 'message' | 'input' | 'accept' | 'refuse',
    'actionData' => mixed,          // Interrupt data
    'error' => string               // Error message (if status=error)
]
```

---

## Further Reading

- **[ARCHITECTURE.md](ARCHITECTURE.md)** - System architecture and design
- **[LANGUAGE_REFERENCE.md](LANGUAGE_REFERENCE.md)** - PESM language syntax
- **[PARSER_GUIDE.md](PARSER_GUIDE.md)** - PEG grammar development
- **[BYTECODE_REFERENCE.md](BYTECODE_REFERENCE.md)** - VM internals
- **[PERFORMANCE.md](PERFORMANCE.md)** - Optimization techniques
- **[API_REFERENCE.md](API_REFERENCE.md)** - Complete API documentation

---

## Support

For questions, issues, or feature requests:
- Open an issue on the project repository
- Check existing documentation
- Review example code in `examples/`

---

**PESM** - Build domain-specific scripting languages for your PHP applications. 🚀
