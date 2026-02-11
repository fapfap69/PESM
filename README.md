# PESM - PHP Embedded Scripts Manager

[![PHP Version](https://img.shields.io/badge/php-%3E%3D8.0-blue.svg)](https://php.net)
[![License](https://img.shields.io/badge/license-MIT-green.svg)](LICENSE)

**A high-performance, embeddable scripting engine for PHP applications with bytecode compilation and interrupt/resume support.**

---

## Overview

PESM is a standalone PHP component that provides a complete scripting language runtime with:

- **Bytecode Compilation**: Scripts are compiled to bytecode for fast execution (2.7-3.6x faster than AST interpretation)
- **Interrupt/Resume**: Native support for long-running scripts with pause/resume capability
- **Multi-Language Support**: Extensible grammar system supports multiple scripting languages (PESM, BASIC, and custom DSLs)
- **Zero Dependencies**: Pure PHP 8.0+ implementation, no external libraries required
- **Production Ready**: Comprehensive error handling, type safety, and security features

---

## Key Features

### Core Capabilities
- ✅ **Complete Control Flow**: IF/ELSE, WHILE, DO-WHILE, REPEAT-UNTIL, FOREACH, SWITCH/CASE
- ✅ **Loop Control**: BREAK, CONTINUE with proper nesting support
- ✅ **Functions**: User-defined functions with local variables and return values
- ✅ **Data Structures**: Arrays, objects, nested structures with full indexing
- ✅ **STRUCT Types**: Define custom data structures with named fields
- ✅ **Operators**: Arithmetic (+, -, *, /, %), comparison, logical (AND, OR, NOT)
- ✅ **GOTO/Labels**: Structured and unstructured control flow
- ✅ **Interrupt System**: MESSAGE, ACCEPT, REFUSE, INPUT for workflow integration

### Advanced Features
- **Stack-Based VM**: Efficient bytecode execution with O(1) resume
- **Automatic Type Coercion**: Seamless handling of strings, numbers, and booleans
- **Scope Management**: Automatic local variable allocation in stack frames
- **Iterator Support**: Efficient array iteration with minimal memory overhead
- **Automatic Converter Generation**: Zero manual fixes for grammar changes
- **Built-in Functions**: 19 standard functions (String, Math, Array, Type, Utility)
- **Custom Commands**: Register PHP functions with COMMAND directive

---

## Quick Start

### Installation

```bash
composer require infn/pesm
```

Or manually copy the `src/` directory to your project.

### Basic Usage

```php
<?php
require_once 'vendor/autoload.php';

use PESM\ScriptEngine;

$engine = new ScriptEngine();

// Execute a simple script
$result = $engine->execute('
    name = "World"
    age = 25
    
    IF age >= 18
        status = "Adult"
    ELSE
        status = "Minor"
    END
    
    MESSAGE "Hello " + name + "! Status: " + status
');

if ($result['status'] === 'interrupted') {
    echo $result['actionData']; // "Hello World! Status: Adult"
}
```

### Interrupt/Resume Pattern

```php
// First execution - script pauses at MESSAGE
$result = $engine->execute('
    counter = 0
    WHILE counter < 5
        counter = counter + 1
        MESSAGE "Count: " + counter
    END
');

// Resume execution after handling interrupt
while ($result['status'] === 'interrupted') {
    echo $result['actionData'] . "\n";
    
    $result = $engine->resume(
        $script,
        $result['state'],
        $result['resumeFrom']
    );
}
```

### Built-in Functions & Custom Commands

```php
// Using built-in functions (19 standard functions available)
$result = $engine->execute('
    text = "hello world"
    upper = UPPER(text)           // "HELLO WORLD"
    length = LEN(text)            // 11
    
    numbers = [1, 2, 3, 4, 5]
    total = SUM(numbers)          // 15
    count = COUNT(numbers)        // 5
    
    value = ABS(-42)              // 42
    root = SQRT(16)               // 4
');

// Register custom PHP functions
$engine->registerCommand('DOUBLE', function($args) {
    return $args[0] * 2;
});

// Declare and use custom commands in scripts
$result = $engine->execute('
    COMMAND DOUBLE
    
    x = 21
    result = DOUBLE(x)  // 42
');
```

---

## Language Syntax

### Variables & Expressions
```javascript
x = 10
y = 20
z = x + y * 2        // z = 50
name = "Mario"
greeting = "Hello " + name
```

### Control Flow
```javascript
// IF-ELSE
IF x > 10
    MESSAGE "Greater"
ELSE
    MESSAGE "Less or equal"
END

// SWITCH-CASE
SWITCH status
    CASE 1
        MESSAGE "Pending"
    CASE 2
        MESSAGE "Approved"
    DEFAULT
        MESSAGE "Unknown"
END

// WHILE loop
counter = 0
WHILE counter < 5
    counter = counter + 1
END

// DO-WHILE (executes at least once)
DO
    INPUT "Enter positive: " n
WHILE n <= 0

// REPEAT-UNTIL (inverted condition)
REPEAT
    x = x + 1
UNTIL x >= 10

// FOREACH with range
FOREACH i = 1 TO 10
    sum = sum + i
END

// FOREACH with array
items = [10, 20, 30]
FOREACH item IN items
    total = total + item
END
```

### Loop Control
```javascript
// BREAK - exit loop
WHILE true
    IF condition
        BREAK
    END
END

// CONTINUE - skip to next iteration
FOREACH i = 1 TO 10
    IF i % 2 == 0
        CONTINUE
    END
    sum = sum + i  // Only odd numbers
END
```

### Functions
```javascript
FUNCTION add(a, b)
    result = a + b
    RETURN result
END

x = add(10, 20)  // x = 30
```

### Arrays & Objects
```javascript
// Arrays
numbers = [1, 2, 3, 4, 5]
matrix = [[1, 2], [3, 4]]
value = matrix[0][1]  // 2
matrix[1][0] = 99     // Nested assignment

// Objects
user = {"name": "Mario", "age": 30}

// STRUCT - Custom data types
STRUCT Person name age city
END

// Instantiation with positional args
p1 = MAKE Person("Mario", 30, "Rome")

// Instantiation with named args
p2 = MAKE Person(name: "Luigi", age: 25, city: "Milan")

// Property access with dot notation
MESSAGE p1.name      // "Mario"
MESSAGE p1.age       // 30

// Nested structs
STRUCT Address city zip
END

STRUCT Employee name address
END

addr = MAKE Address("Rome", "00100")
emp = MAKE Employee("Mario", addr)
MESSAGE emp.address.city  // "Rome"
```

### GOTO & Labels
```javascript
x = 1
GOTO skip
x = 999
skip:
x = x + 10  // x = 11
```

---

## Architecture

```
┌─────────────────────────────────────────────────────────┐
│                    Your PHP Application                  │
└────────────────────┬────────────────────────────────────┘
                     │
                     ▼
         ┌───────────────────────┐
         │   ScriptEngine        │  ← Public API
         │   execute() / resume()│
         └───────────┬───────────┘
                     │
         ┌───────────▼───────────┐
         │   Parser (PEG)        │
         │   Text → Parse Tree   │
         └───────────┬───────────┘
                     │
         ┌───────────▼───────────┐
         │   ASTBuilder          │  ← Universal (29 constructs)
         │   Parse Tree → AST    │
         └───────────┬───────────┘
                     │
         ┌───────────▼───────────┐
         │   Compiler            │
         │   AST → Bytecode      │
         └───────────┬───────────┘
                     │
         ┌───────────▼───────────┐
         │   Virtual Machine     │
         │   Stack-based exec    │
         └───────────┬───────────┘
                     │
         ┌───────────▼───────────┐
         │   Result              │
         │   status, variables   │
         └───────────────────────┘
```

---

## Performance

| Operation | AST Interpreter | Bytecode VM | Speedup |
|-----------|----------------|-------------|---------|
| Simple math | 120ms | 45ms | **2.7x** |
| IF statement | 150ms | 55ms | **2.7x** |
| FOREACH loop | 280ms | 95ms | **2.9x** |
| Function call | 200ms | 70ms | **2.9x** |
| Resume | 180ms | 50ms | **3.6x** |

*Benchmark: 1000 iterations on PHP 8.2*

---

## Documentation

- **[Architecture Guide](docs/ARCHITECTURE.md)** - Component design and internals
- **[Integration Guide](docs/INTEGRATION.md)** - How to embed PESM in your application
- **[Bytecode VM](docs/BYTECODE_VM_CONTEXT.md)** - Virtual machine implementation details

---

## Use Cases

### Workflow Automation
```php
// User-defined workflow steps
$workflow = '
    IF order.amount > 1000
        ACCEPT "approved"
    ELSE
        MESSAGE "Requires manual review"
    END
';
```

### Business Rules Engine
```php
// Dynamic pricing rules
$rules = '
    discount = 0
    IF customer.type == "premium"
        discount = 20
    END
    IF order.quantity > 10
        discount = discount + 5
    END
    RETURN discount
';
```

### Configuration Scripts
```php
// Dynamic configuration
$config = '
    IF environment == "production"
        cache.enabled = true
        debug.level = 0
    ELSE
        cache.enabled = false
        debug.level = 3
    END
';
```

---

## Requirements

- **PHP**: 8.0 or higher
- **Extensions**: None (pure PHP)
- **Memory**: Minimal (configurable stack size)

---

## Testing

```bash
# Run all tests
php tests/test_engine_bytecode.php
php tests/test_compiler_bytecode.php
php tests/test_builtin_functions.php
```

---

## Future Enhancements

- **Debug Support**: Breakpoints, step mode, state inspection
- **Performance Profiler**: Execution time analysis per instruction
- **JIT Compilation**: Native code generation for hot paths
- **Sandboxing**: Resource limits and security policies

---

## Contributing

PESM is part of the wFlows project. Contributions are welcome!

1. Fork the repository
2. Create a feature branch
3. Add tests for new features
4. Submit a pull request

---

## License

MIT License - see [LICENSE](LICENSE) file for details.

---

## Credits

**Author**: Antonio Franco - INFN Sez. di Bari  
**Year**: 2026

---

## Support

For issues, questions, or feature requests, please open an issue on the project repository.

---

**PESM** - Embed scripting power in your PHP applications. 🚀
