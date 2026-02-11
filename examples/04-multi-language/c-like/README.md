# C-like Language for PESM

A C-style scripting language with modern syntax using PESM's bytecode VM.

## Features

- **Blocks**: Curly braces `{ }` for statement grouping
- **Semicolons**: Required after statements
- **Control Flow**: `if/else` with parentheses, `while` loops
- **Operators**: Logical (`&&`, `||`), comparison (`==`, `!=`, `<`, `>`, `<=`, `>=`), arithmetic (`+`, `-`, `*`, `/`)
- **Arrays**: Literals `[1, 2, 3]` and access `arr[i]`
- **Comments**: Single-line `//` and multi-line `/* */`
- **print()**: Output function with interrupt support

## Syntax

### Variables and Assignment
```c
n = 10;
sum = 0;
i = 0;
```

### Blocks
```c
{
    x = 1;
    y = 2;
}
```

### If/Else
```c
if (x > 10) {
    print("Greater");
} else {
    print("Less or equal");
}

// Single statement (no braces)
if (x > 10)
    print("Greater");
```

### While Loop
```c
while (i < n) {
    sum = sum + i;
    i = i + 1;
}
```

### Arrays
```c
arr = [1, 2, 3, 4, 5];
x = arr[0];
arr[1] = 10;
```

### Comments
```c
// Single line comment

/* Multi-line
   comment */
```

## Example: Factorial

```c
n = 5;
result = 1;
i = 1;

while (i <= n) {
    result = result * i;
    i = i + 1;
}

print(result);
```

Output: `120` (5! = 5×4×3×2×1)

## Architecture

```
c-like.peg → CLIKEParser → ASTBuilder (shared) → Bytecode → VM
```

- **Grammar**: Pure syntax PEG with inline block handling
- **Parser**: Generated from c-like.peg
- **ASTBuilder**: Uses shared PESM ASTBuilder without extensions
- **Execution**: PESM bytecode VM

## Key Implementation Details

### Block Handling
Blocks are handled directly in the grammar by capturing multiple `body:Statement` instead of creating intermediate Block nodes. This allows seamless integration with PESM's WhileNode and IfNode which expect arrays of statements.

### Logical Operators
`&&` and `||` are mapped to `and` and `or` internally for compatibility with PESM's logical operators.

## Files

- `c-like.peg` - Grammar definition
- `build.php` - Parser generator
- `test.php` - Factorial test (5! = 120)
- `example.c` - Example C-like code

## Building

```bash
php build.php
```

## Testing

```bash
php test.php
```

## Compatibility

Uses PESM's shared ASTBuilder without custom extensions, ensuring full compatibility with the PESM bytecode VM and all its features.
