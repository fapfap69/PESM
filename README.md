# PESM - PHP Embedded Scripts Manager

[![PHP Version](https://img.shields.io/badge/php-%3E%3D8.0-blue.svg)](https://php.net)
[![License](https://img.shields.io/badge/license-MIT-green.svg)](LICENSE)
[![GitHub](https://img.shields.io/badge/github-fapfap69%2FPESM-blue.svg)](https://github.com/fapfap69/PESM)

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
composer require fapfap69/pesm
```

### Using the Default PESM Language

PESM comes with a pre-built scripting language ready to use. No grammar configuration needed:

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

**PESM Language Features:**
- Control flow: IF/ELSE, WHILE, DO-WHILE, REPEAT-UNTIL, FOREACH, SWITCH/CASE
- Loop control: BREAK, CONTINUE
- Functions with local variables and return values
- Arrays, objects, and STRUCT types
- 19 built-in functions (String, Math, Array, Type, Utility)
- Interrupt system: MESSAGE, ACCEPT, REFUSE, INPUT

See [Language Reference](docs/LANGUAGE_REFERENCE.md) for complete syntax.

### Interrupt/Resume Pattern

PESM supports long-running scripts with pause/resume capability:

```php
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

### Custom Commands

Extend the language with PHP functions:

```php
// Register custom PHP function
$engine->registerCommand('DOUBLE', function($args) {
    return $args[0] * 2;
});

// Use in scripts
$result = $engine->execute('
    COMMAND DOUBLE
    
    x = 21
    result = DOUBLE(x)  // 42
');
```

### Creating Custom DSLs

PESM is a toolkit for building domain-specific languages. You can create your own grammar:

1. **Define your grammar** in PEG format (see `grammar/pesm.peg` as reference)
2. **Build the parser**: `php vendor/fapfap69/pesm/bin/build-parser.php your-grammar.peg`
3. **Use your language** with the same ScriptEngine API

PESM provides 29 universal AST constructs that work with any grammar. See [Parser Guide](docs/PARSER_GUIDE.md) for details.

**Examples included:**
- BASIC-like language (`examples/04-multi-language/basic/`)
- C-like language (`examples/04-multi-language/c-like/`)
- Python-like language (`examples/04-multi-language/python-like/`)
- FORTRAN-like language (`examples/04-multi-language/fortran/`)

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

- **[Language Reference](docs/LANGUAGE_REFERENCE.md)** - Complete PESM syntax and features
- **[Architecture Guide](docs/ARCHITECTURE.md)** - Component design and internals
- **[Integration Guide](docs/INTEGRATION.md)** - How to embed PESM in your application
- **[Parser Guide](docs/PARSER_GUIDE.md)** - Creating custom DSLs
- **[API Reference](docs/API_REFERENCE.md)** - ScriptEngine API documentation
- **[Performance](docs/PERFORMANCE.md)** - Benchmarks and optimization tips

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
**Year**: 2025

---

## Support

For issues, questions, or feature requests, please open an issue on the [GitHub repository](https://github.com/fapfap69/PESM/issues).

---

**PESM** - Embed scripting power in your PHP applications. 🚀
