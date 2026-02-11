# Python-like Language for PESM

A simplified Python-style scripting language (without indentation) using PESM's bytecode VM.

## Features

- **Python Syntax**: Lowercase identifiers, `print()` function
- **Operators**: Logical (`and`, `or`), comparison, arithmetic
- **Newlines/Semicolons**: Statement separators
- **Simple**: No indentation required (simplified version)

## Syntax

### Variables and Assignment
```python
x = 5
y = 10
sum = x + y
```

### Print
```python
print(sum)
print(x + y)
```

### Logical Operators
```python
result = x > 5 and y < 20
flag = x == 5 or y == 10
```

## Example

```python
x = 5
y = 10
sum = x + y
print(sum)
```

Output: `15`

## Architecture

```
python-like.peg → PYTHONLIKEParser → ASTBuilder (shared) → Bytecode → VM
```

- **Grammar**: Pure syntax PEG without indentation handling
- **Parser**: Generated from python-like.peg
- **ASTBuilder**: Uses shared PESM ASTBuilder
- **Execution**: PESM bytecode VM

## Files

- `python-like.peg` - Grammar definition
- `build.php` - Parser generator
- `test.php` - Arithmetic test (5 + 10 = 15)
- `example.py` - Example Python-like code
- `example_simple.py` - Simple example

## Building

```bash
php build.php
```

## Testing

```bash
php test.php
```

## Note

This is a simplified Python-like syntax without indentation-based blocks. For a full Python implementation with proper indentation handling, a more complex lexer would be needed.

## Compatibility

Uses PESM's shared ASTBuilder without custom extensions.
