# FORTRAN-like Language for PESM

A FORTRAN-style scripting language implementation using PESM's bytecode VM.

## Features

- **Numeric Labels**: Traditional FORTRAN numeric labels (10, 20, 100)
- **GOTO Statements**: Jump to numeric labels
- **Arithmetic**: Standard operators (+, -, *, /)
- **Comparisons**: ==, !=, >, >=, <, <=
- **Control Flow**: IF statements with GOTO
- **Loops**: DO loops with range (DO I = 1, 10)
- **Interrupts**: MESSAGE for output with interrupt/resume support
- **Variables**: Uppercase identifiers (N, RESULT, I)

## Syntax

### Variables and Assignment
```fortran
N = 5
RESULT = 1
I = I + 1
```

### Labels and GOTO
```fortran
10    N = 5
      GOTO 10
```

### IF Statement
```fortran
IF (I > N) GOTO 20
```

### DO Loop
```fortran
DO I = 1, 10
    SUM = SUM + I
CONTINUE
```

### MESSAGE (Interrupt)
```fortran
MESSAGE RESULT
MESSAGE "Hello World"
```

## Example: Factorial

```fortran
      N = 5
      RESULT = 1
      I = 1

10    IF (I > N) GOTO 20
      RESULT = RESULT * I
      I = I + 1
      GOTO 10

20    MESSAGE RESULT
```

Output: `120` (5! = 5×4×3×2×1)

## Architecture

```
fortran.peg → FORTRANParser → ASTBuilder (shared) → Bytecode → VM
```

- **Grammar**: Pure syntax PEG grammar with numeric label support
- **Parser**: Generated from fortran.peg
- **ASTBuilder**: Uses shared PESM ASTBuilder with buildLabel() for numeric labels
- **Execution**: PESM bytecode VM with interrupt/resume

## Key Implementation Details

### Numeric Labels
The grammar uses `Label: val:Number | val:Identifier` to accept both numeric (10, 20) and alphanumeric labels. The shared ASTBuilder's `buildLabel()` method converts numeric labels to identifiers internally.

### Interrupt/Resume
MESSAGE statements generate interrupts that can be resumed, allowing integration with workflow systems.

## Files

- `fortran.peg` - Grammar definition
- `build.php` - Parser generator
- `test.php` - Factorial test (5! = 120)
- `test_interrupt.php` - Interrupt/resume test
- `example.f` - Example FORTRAN code

## Building

```bash
php build.php
```

## Testing

```bash
# Factorial test
php test.php

# Interrupt/resume test
php test_interrupt.php
```

## Compatibility

Uses PESM's shared ASTBuilder without custom extensions, ensuring full compatibility with the PESM bytecode VM and all its features (GOTO, labels, interrupts, etc.).
