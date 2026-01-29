# PESM - PHP Embedded Scripts Manager

**Version:** 1.0.0  
**Author:** Antonio Franco - INFN Sez. di Bari  
**License:** MIT  

---

## Overview

PESM is a standalone PHP script engine extracted from wFlows 3.0, designed to parse and execute custom scripting language in any PHP project.

## Features

- ✅ **Multiline Parser** with unlimited nesting
- ✅ **Execution Stack** for nested blocks (IF, FOREACH, WHILE, FOR)
- ✅ **Variable Scoping** with context management
- ✅ **Extensible Commands** via plugin system
- ✅ **Test Bench** for interactive script testing
- ✅ **Zero Dependencies** (pure PHP 8.0+)

## Supported Syntax

### Variables & Assignments
```javascript
name = "Mario"
age = 30
items = [1, 2, 3]
user = {"name": "Mario", "age": 30}
```

### Control Flow
```javascript
IF age >= 18
  MESSAGE "Adult"
ELSE
  MESSAGE "Minor"
END

FOREACH item IN items
  MESSAGE item
END
```

### Arrays & Indexing
```javascript
matrix = [[1, 2], [3, 4]]
value = matrix[0][1]  // 2
```

## Installation

```bash
composer require infn/pesm
```

Or copy `src/` folder to your project.

## Quick Start

```php
require_once 'src/ScriptEngine.php';

$engine = new PESM\ScriptEngine();
$result = $engine->execute('
  name = "World"
  MESSAGE "Hello " + name
');

echo $result['message']; // "Hello World"
```

## Test Bench

Open `examples/testbench.php` in your browser for an interactive playground.

## Documentation

- [Script Syntax](docs/SYNTAX.md)
- [API Reference](docs/API.md)
- [Examples](examples/)

## Credits

Extracted from **wFlows 3.0** workflow management system.

---

**PESM** - Embed scripting power in your PHP applications.
