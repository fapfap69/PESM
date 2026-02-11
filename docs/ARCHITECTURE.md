# PESM Architecture

Complete system architecture and design decisions.

## Overview

PESM is a bytecode-compiled scripting engine with interrupt/resume support for workflow management.

```
Script Text → Parser → AST → Compiler → Bytecode → VM → Result
                ↓                           ↓
          ASTBuilder                  GlobalContext
                                           ↓
                                      Commands (Built-in)
```

## Core Components

### 1. ScriptEngine (Facade)
**File**: `src/ScriptEngine.php`

Public API for script execution.

**Methods**:
- `execute(script, variables)` - Parse, compile, and execute
- `resume(script, state, returnValue)` - Resume from interrupt
- `compile(script)` - Compile to bytecode
- `executeFromBytecode(bytecode, variables, state)` - Execute pre-compiled bytecode

**Responsibilities**:
- Manage GlobalContext lifecycle
- Cache compiled bytecode
- Coordinate Parser → Compiler → VM

### 2. Parser System
**Files**: `src/Parser/`

Converts text to AST using PEG grammar.

**Components**:
- `GeneratedParser.php` - PEG parser (auto-generated from grammar)
- `ASTBuilder.php` - Universal converter for 29 PESM constructs (written once)
- `ArrayToNodeConverter.php` - Converts AST array to Node objects
- `GeneratedConverter.php` - Grammar-specific converter (auto-generated)

**Build Flow** (one-time per grammar):
```
grammar/pesm.peg
    ↓
php bin/build-parser.php
    ↓
┌─────────────────────────────────────┐
│ ParserBuilder                        │
│  1. generateParser()                │
│     → GeneratedParser.php           │
│  2. GrammarAnalyzer::analyze()      │
│     → metadata                       │
│  3. ConverterGenerator::generate()  │
│     → GeneratedConverter.php        │
└─────────────────────────────────────┘
```

**Runtime Flow** (every execution):
```
Text → GeneratedParser → Parse Tree → ASTBuilder → AST Array → 
       ArrayToNodeConverter → Node Objects
```

**Key Insight**: 
- **GeneratedParser** and **GeneratedConverter** are grammar-specific (regenerated)
- **ASTBuilder** is universal (supports all 29 PESM constructs, never regenerated)
- Any grammar using PESM constructs works with the same ASTBuilder

### 3. Compiler
**File**: `src/Bytecode/Compiler.php`

Converts AST to bytecode.

**Pre-scan Phase**:
- Scans for COMMAND declarations
- Registers custom commands for function resolution

**Compilation Phase**:
- Visits AST nodes recursively
- Generates bytecode instructions
- Resolves function calls (built-in vs user-defined)
- Resolves labels to addresses

**Optimizations**:
- **Trampoline pattern**: Bytecode starts with JUMP to skip implicit RETURN
- **Direct function addressing**: Functions resolved at compile-time
- **Stack-based iterators**: FOREACH state stored in main stack
- **Label resolution**: All jumps resolved to integer addresses

**Output**: Array of `Instruction` objects

### 4. Virtual Machine
**File**: `src/Bytecode/VM.php`

Stack-based bytecode executor.

**State** (minimal):
```php
['stack' => [...]]  // Only stack! PC and framePointer stored in stack
```

**Key Features**:
- **Trampoline execution**: Always starts with implicit RETURN
- **Stack-based everything**: PC, framePointer, iterator state all in stack
- **O(1) resume**: No state reconstruction needed
- **Interrupt via exception**: InterruptException thrown, state in stack

**Execution Model**:
```
Initial: stack = [-1, 0]  // [framePointer, returnAddr]
         PC = pop() = 0
         FP = pop() = -1
         Execute bytecode[0] = JUMP 1  (trampoline)
```

### 5. GlobalContext
**File**: `src/Runtime/GlobalContext.php`

Manages global variables and STRUCT definitions with optional persistence.

**Persistence Modes**:
- `none` - Memory only (default)
- `session` - PHP session storage
- `eternal` - Filesystem storage

**Methods**:
- `save()` - Persist to storage
- `load()` - Restore from storage
- `delete()` - Remove from storage
- `reset()` - Clear all data

**Benefits**:
- Multi-VM with shared context
- State size reduced by 50-80%
- Externalized from VM state

### 6. Commands Registry
**File**: `src/Runtime/Commands.php`

Manages built-in and custom functions.

**19 Standard Built-in Functions**:
- String (5): LEN, UPPER, LOWER, SUBSTR, TRIM
- Math (6): ABS, ROUND, MIN, MAX, SQRT, POW
- Array (3): COUNT, SUM, JOIN
- Type (3): STR, INT, FLOAT
- Utility (2): TIME, TIMESTAMP

**Custom Commands**:
```php
$engine->registerCommand('SEND_EMAIL', fn($args, $ctx) => ...);
```

**COMMAND Directive**:
```javascript
COMMAND SEND_EMAIL, LOG

SEND_EMAIL("user@test.com", "Hello")
```

## Data Flow

### Execute Flow
```
1. ScriptEngine.execute(script)
2. Parser.parse(script) → AST
3. Compiler.compile(AST) → Bytecode
4. VM.execute(bytecode, globalContext) → Result
5. If interrupted: throw InterruptException
6. Return Result with state
```

### Resume Flow
```
1. ScriptEngine.resume(script, state, returnValue)
2. Load bytecode from cache
3. VM.execute(bytecode, globalContext, state, returnValue)
4. VM pops PC and FP from stack
5. Continue execution from PC
6. Return Result
```

### Interrupt Flow
```
1. VM executes INT_VOID or INT_VALUE
2. Push framePointer and PC to stack
3. Throw InterruptException with state
4. ScriptEngine catches and returns Result
5. Application handles interrupt
6. Application calls resume() with user input
```

## Key Design Decisions

### 1. Bytecode Compilation
**Why**: 2.7-3.6x faster than AST interpretation

**Trade-off**: Compilation overhead (~8ms) vs execution speed (~0.05ms)

**Solution**: Cache compiled bytecode in ScriptEngine

### 2. Stack-Only State
**Why**: Minimal serialization, O(1) resume

**Evolution**:
- Initial: 6 fields (stack, framePointer, globals, structs, functions, iteratorStack)
- Final: 1 field (stack only)

**Benefits**:
- 83% state size reduction
- Simpler serialization
- Faster resume

### 3. GlobalContext Externalization
**Why**: Multi-VM support, persistence, reduced state

**Design**:
- Globals and structs moved outside VM state
- Optional persistence (none/session/eternal)
- Passed as parameter to VM.execute()

**Benefits**:
- Share context between multiple VMs
- Persist context independently
- State size reduced by 50-80%

### 4. Trampoline Pattern
**Why**: Uniform execution model, O(1) resume

**Design**:
- Bytecode always starts with JUMP instruction
- Stack initialized with [-1, 0] (framePointer, returnAddr)
- VM always begins with implicit RETURN (pop PC and FP)

**Benefits**:
- First execution and resume use same code path
- No special case for initial execution
- PC and FP stored in stack (not separate fields)

### 5. Direct Function Addressing
**Why**: Eliminate runtime function lookup

**Design**:
- Functions resolved at compile-time to bytecode addresses
- CALL instruction uses [address, argc] instead of function name
- Breaking change: functions must be defined before use

**Benefits**:
- Faster function calls
- No function registry needed
- Simpler VM

### 6. Auto-Generated Converter
**Why**: Zero manual fixes after grammar changes

**Design**:
- ConverterGenerator analyzes grammar and generates converter
- Follows conventions (var:, expr:, head:/tail: labels)
- Regenerated automatically with parser

**Benefits**:
- Grammar changes don't break converter
- No manual maintenance
- Consistent AST structure

## Performance Characteristics

### Compilation
- **Parse**: ~5-8ms
- **Compile**: ~2-3ms
- **Total**: ~8ms (one-time cost)

### Execution
- **Bytecode**: ~0.05ms per operation
- **Resume**: ~0.05ms (O(1), no reconstruction)
- **Speedup**: 2.7-3.6x vs AST interpretation

### Memory
- **Bytecode**: ~300-900 bytes per script
- **State**: ~140 bytes
- **GlobalContext**: ~50-200 bytes
- **Total**: ~500-1100 bytes per execution

## Security Considerations

1. **No eval()**: Scripts compiled to bytecode, not PHP code
2. **Sandboxed**: No access to PHP functions unless explicitly registered
3. **Type safety**: Automatic type coercion with validation
4. **Stack limits**: Configurable max stack size (default 1000)
5. **Timeout**: Application-level timeout recommended

## Extensibility Points

### 1. Custom Languages
Modify `grammar/pesm.peg` and regenerate parser:
```bash
php bin/build-parser.php
```

### 2. Custom Opcodes
Add opcodes to VM.executeInstruction() switch statement.

### 3. Built-in Functions
Register functions via GlobalContext (future feature).

### 4. Custom Persistence
Implement custom GlobalContext storage backend.

## Future Enhancements

1. **JIT Compilation**: Compile hot paths to PHP code
2. **Parallel Execution**: Multi-threaded VM
3. **Debugger Protocol**: DAP support for IDE integration
4. **Type System**: Optional static typing
5. **Module System**: Import/export between scripts

## See Also

- [BYTECODE_REFERENCE.md](BYTECODE_REFERENCE.md) - VM opcodes
- [PARSER_GUIDE.md](PARSER_GUIDE.md) - Grammar customization
- [PERFORMANCE.md](PERFORMANCE.md) - Optimization techniques
