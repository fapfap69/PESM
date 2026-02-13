# PESM Language Reference

Complete syntax reference for the PESM scripting language.

## Table of Contents

- [Variables](#variables)
- [Data Types](#data-types)
- [Operators](#operators)
- [Control Flow](#control-flow)
- [Functions](#functions)
- [Arrays](#arrays)
- [STRUCT](#struct)
- [Interrupts](#interrupts)
- [GOTO](#goto)

## Variables

### Assignment
```javascript
x = 10
name = "Mario"
result = x + 5
```

### Scope
- **Global**: Variables defined at top level
- **Local**: Variables inside functions
- **Function parameters**: Local to function

## Data Types

### Numbers
```javascript
integer = 42
float = 3.14
negative = -10
```

### Strings
```javascript
name = "World"
greeting = "Hello " + name  // Concatenation
```

### Booleans
```javascript
enabled = 1      // true
disabled = 0     // false
```

### Arrays
```javascript
numbers = [1, 2, 3, 4, 5]
matrix = [[1, 2], [3, 4]]
empty = []
```

### Objects
```javascript
user = {"name": "Mario", "age": 30}
config = {"debug": 1, "timeout": 60}
```

### STRUCT (Custom Types)
```javascript
STRUCT Person name age city
END

person = MAKE Person("Mario", 30, "Rome")
```

## Operators

### Arithmetic
```javascript
x = 10 + 5      // Addition
x = 10 - 5      // Subtraction
x = 10 * 5      // Multiplication
x = 10 / 5      // Division
x = 10 % 3      // Modulo
x = -10         // Negation
```

### Comparison
```javascript
x == y          // Equal
x != y          // Not equal
x > y           // Greater than
x >= y          // Greater or equal
x < y           // Less than
x <= y          // Less or equal
```

### Logical
```javascript
x AND y         // Logical AND
x OR y          // Logical OR
NOT x           // Logical NOT
```

### Precedence
1. Unary: `NOT`, `-`, `+`
2. Multiplicative: `*`, `/`, `%`
3. Additive: `+`, `-`
4. Comparison: `==`, `!=`, `>`, `>=`, `<`, `<=`
5. Logical: `AND`, `OR`

## Control Flow

### IF-ELSE
```javascript
IF condition
    // statements
END

IF condition
    // then branch
ELSE
    // else branch
END

// Nested
IF x > 10
    IF x > 20
        MESSAGE "Very high"
    ELSE
        MESSAGE "High"
    END
ELSE
    MESSAGE "Low"
END
```

### SWITCH-CASE
```javascript
SWITCH value
    CASE 1
        MESSAGE "One"
    CASE 2
        MESSAGE "Two"
    DEFAULT
        MESSAGE "Other"
END
```

### WHILE
```javascript
counter = 0
WHILE counter < 5
    counter = counter + 1
END
```

### DO-WHILE
```javascript
DO
    x = x + 1
WHILE x < 10
```

### REPEAT-UNTIL
```javascript
REPEAT
    x = x + 1
UNTIL x >= 10  // Inverted condition
```

### FOREACH with Array
```javascript
items = [1, 2, 3, 4, 5]
FOREACH item IN items
    sum = sum + item
END
```

### FOREACH with Range
```javascript
FOREACH i = 1 TO 10
    sum = sum + i
END
```

### BREAK
```javascript
WHILE true
    IF condition
        BREAK  // Exit loop
    END
END
```

### CONTINUE
```javascript
FOREACH i = 1 TO 10
    IF i % 2 == 0
        CONTINUE  // Skip to next iteration
    END
    sum = sum + i
END
```

## Functions

### Definition
```javascript
FUNCTION add(a, b)
    result = a + b
    RETURN result
END
```

### Call
```javascript
x = add(10, 20)  // x = 30
```

### Return
```javascript
FUNCTION isPositive(n)
    IF n > 0
        RETURN 1
    END
    RETURN 0
END
```

### Recursion
```javascript
FUNCTION factorial(n)
    IF n <= 1
        RETURN 1
    END
    RETURN n * factorial(n - 1)
END
```

### Scope
```javascript
global = 10

FUNCTION test()
    local = 20      // Local variable
    global = 30     // Modifies global
    RETURN local
END
```

## Arrays

### Creation
```javascript
numbers = [1, 2, 3]
matrix = [[1, 2], [3, 4]]
empty = []
```

### Access
```javascript
first = numbers[0]
value = matrix[1][0]
```

### Assignment
```javascript
numbers[0] = 99
matrix[1][1] = 88
```

### Nested Assignment
```javascript
matrix = [[1, 2], [3, 4]]
matrix[0][1] = 99  // matrix = [[1, 99], [3, 4]]
```

## STRUCT

### Definition
```javascript
STRUCT Person name age city
END

STRUCT Address street city zip
END
```

### Instantiation (Positional)
```javascript
person = MAKE Person("Mario", 30, "Rome")
```

### Instantiation (Named)
```javascript
person = MAKE Person(name: "Mario", age: 30, city: "Rome")
```

### Property Access
```javascript
MESSAGE person.name  // "Mario"
MESSAGE person.age   // 30
```

### Nested STRUCT
```javascript
STRUCT Employee name address
END

addr = MAKE Address("Via Roma", "Rome", "00100")
emp = MAKE Employee("Mario", addr)
MESSAGE emp.address.city  // "Rome"
```

## Interrupts

Interrupts pause execution and return control to the application.

### MESSAGE
```javascript
MESSAGE "Hello World"
// Execution pauses, returns to application
// Application displays message and resumes
```

### INPUT
```javascript
INPUT "Enter your name: " userName
// Execution pauses, waits for user input
// Application shows form, user submits
// Execution resumes with userName set
```

### ACCEPT
```javascript
IF approved
    ACCEPT "workflow_approved"
    // Execution stops, workflow accepted
END
```

### REFUSE
```javascript
IF rejected
    REFUSE "workflow_rejected"
    // Execution stops, workflow refused
END
```

## GOTO

### Label Definition
```javascript
start:
x = x + 1
```

### GOTO Statement
```javascript
x = 1
GOTO skip
x = 999  // Skipped
skip:
x = x + 10  // x = 11
```

### Use Cases
- Error handling
- State machines
- Loop optimization

## Comments

### Single-Line Comments
```javascript
// This is a comment
x = 10  // Inline comment

// Comments are ignored during execution
// Use them to document your code
```

**Note**: Multi-line comments are not yet supported.

## Reserved Words

```
STRUCT MAKE GOTO BEGIN WHILE DO REPEAT UNTIL FUNCTION RETURN
FOREACH MESSAGE ACCEPT REFUSE INPUT SWITCH CASE DEFAULT ELSE
AND OR NOT END IF TO IN BREAK CONTINUE
```

## Examples

### Complete Script
```javascript
// Define custom data structure
STRUCT Person name age
END

// Define greeting function
FUNCTION greet(person)
    MESSAGE "Hello " + person.name
    RETURN 1
END

// Main logic
person = MAKE Person("Mario", 30)  // Create person instance
result = greet(person)

// Loop through odd numbers
FOREACH i = 1 TO 5
    IF i % 2 == 0
        CONTINUE  // Skip even numbers
    END
    MESSAGE "Odd: " + i
END

// Age verification
IF person.age >= 18
    ACCEPT "adult"
ELSE
    REFUSE "minor"
END
```

## See Also

- [API_REFERENCE.md](API_REFERENCE.md) - How to execute scripts
- [../examples/](../examples/) - Working examples
- [../grammar/comprehensive_test.pesm](../grammar/comprehensive_test.pesm) - All features demo
