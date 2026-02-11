# PESM Test Suite

## Overview

Essential test suite for PESM bytecode VM and compiler verification.

## Test Files

### test_engine_bytecode.php
**Integration tests for ScriptEngine with Bytecode VM**

Tests:
- Simple variable assignment
- IF-ELSE statements
- FOREACH loops (array iteration)
- WHILE loops
- Interrupt handling (MESSAGE)
- Resume after interrupt
- Array access (nested)
- GOTO statements

Run:
```bash
php tests/test_engine_bytecode.php
```

### test_compiler_bytecode.php
**Compiler bytecode generation verification**

Verifies:
- Trampoline pattern (JUMP at position 0)
- Function calls use direct addresses (not names)
- FOREACH uses stack-based iterator (no separate iterator stack)
- STRUCT instructions (DEFINE_STRUCT, MAKE_STRUCT)
- Interrupt encoding (INT_VOID, INT_VALUE)
- Label resolution (all jumps to integers)
- BREAK cleanup (3 POPs for iterator state)
- Nested array access (STORE_INDEX_NESTED)
- Property access (dot notation → LOAD_INDEX)
- Function parameters (LOAD_ARG instead of LOAD_GLOBAL)

Run:
```bash
php tests/test_compiler_bytecode.php
```

### test_global_context.php
**GlobalContext persistence and multi-VM tests**

Tests:
- GlobalContext creation and variable storage
- Persistence modes (none, session, eternal)
- Multi-VM with shared context
- Context save/load/delete
- Context cleanup

Run:
```bash
php tests/test_global_context.php
```

## Running All Tests

```bash
php tests/test_engine_bytecode.php && \
php tests/test_compiler_bytecode.php && \
php tests/test_global_context.php
```

## Comprehensive Language Test

For testing all PESM language constructs, see:
```
grammar/comprehensive_test.pesm
```

This file contains examples of all 28 AST nodes with nesting and interrupts.

## Test Coverage

- ✓ All bytecode opcodes
- ✓ All control flow constructs
- ✓ Function definitions and calls
- ✓ STRUCT definitions and instantiation
- ✓ Interrupt/resume mechanism
- ✓ GlobalContext persistence
- ✓ Stack-based VM optimizations
- ✓ Nested data structures
- ✓ Loop control (BREAK, CONTINUE)
- ✓ GOTO/labels

## Adding New Tests

When adding new language features:

1. Add test case to `test_engine_bytecode.php` for runtime behavior
2. Add bytecode verification to `test_compiler_bytecode.php`
3. Update `grammar/comprehensive_test.pesm` with syntax example
4. Run all tests to ensure no regressions
