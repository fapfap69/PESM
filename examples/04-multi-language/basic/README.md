# BASIC Language Support for PESM

Simple BASIC-like language implementation using PESM's pure syntax architecture.

## Features

- **LET** statements for variable assignment
- **PRINT** for output (MESSAGE interrupt)
- **INPUT** for user input
- **IF...THEN** conditional statements
- **FOR...TO...NEXT** loops with range support
- **GOTO** and labels for control flow
- **REM** comments

## Architecture

Uses PESM's new pure syntax system:
1. **basic.peg** - Pure PEG grammar (no #node annotations, no callbacks)
2. **BASICParser.php** - Generated parser (php-peg)
3. **Shared ASTBuilder** - Uses PESM's universal ASTBuilder
4. **Shared Compiler/VM** - Full bytecode compilation and execution

## Quick Start

### Build Parser
```bash
php build.php
```

### Run Test
```bash
php test.php
```

### Example Code
```basic
LET SUM = 0
FOR I = 1 TO 10
  LET SUM = SUM + I
NEXT
PRINT SUM
```

Output: `SUM = 55`

## Grammar Rules

- **Identifiers**: Uppercase letters and numbers (A-Z, 0-9)
- **Keywords**: LET, PRINT, INPUT, IF, THEN, GOTO, FOR, TO, NEXT, END
- **Operators**: `+`, `-`, `*`, `/`, `=`, `<>`, `<`, `>`, `<=`, `>=`
- **Comments**: `REM` followed by any text until newline

## Implementation Notes

- Uses `ForeachRangeStmt` which compiles to `RangeNode`
- `RangeNode` generates array via `RANGE` bytecode instruction
- No custom ASTBuilder needed - uses shared PESM builder
- Compatible with PESM's interrupt/resume system
