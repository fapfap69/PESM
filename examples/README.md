# PESM Examples

Comprehensive examples demonstrating PESM features and integration patterns.

## Directory Structure

```
examples/
├── 01-basic/              # Core language features
├── 02-web-integration/    # Web application integration
├── 03-workflow/           # Production workflow patterns
└── 04-multi-language/     # Multi-language support
```

## Quick Start

### 1. Basic Examples
Learn core PESM features:

```bash
cd 01-basic
php hello_world.php
php calculator.php
php arrays_loops.php
```

### 2. Web Integration
Run web-based examples:

```bash
php -S localhost:8000
# Open http://localhost:8000/examples/02-web-integration/web_executor.html
```

### 3. Workflow Patterns
Production-ready patterns:

```bash
cd 03-workflow
php workflow_handler.php
# Or open controller_template.php in browser
```

### 4. Multi-Language
Custom language implementations:

```bash
cd 04-multi-language/basic
php test.php
```

## Example Categories

### 01-basic/
**Purpose**: Learn PESM syntax and features  
**Audience**: Beginners  
**Run**: CLI (php script.php)

**Topics:**
- Variables and expressions
- Functions
- Control flow (IF, WHILE, FOREACH)
- Arrays and STRUCT
- Interrupts (MESSAGE)

### 02-web-integration/
**Purpose**: Integrate PESM in web applications  
**Audience**: Web developers  
**Run**: Web server (php -S localhost:8000)

**Topics:**
- HTML forms
- Session management
- Interrupt/resume with user input
- Error handling
- Real-time execution

### 03-workflow/
**Purpose**: Production workflow management  
**Audience**: Advanced developers  
**Run**: CLI or web server

**Topics:**
- Bytecode caching
- State persistence
- Workflow patterns (ACCEPT/REFUSE)
- Performance optimization
- Error recovery

### 04-multi-language/
**Purpose**: Extend PESM with custom languages  
**Audience**: Language designers  
**Run**: CLI

**Topics:**
- Custom PEG grammars
- Parser generation
- Language-specific features
- BASIC, C-like, FORTRAN, Python-like

## Common Patterns

### Execute Script
```php
$engine = new ScriptEngine();
$result = $engine->execute($script);
```

### Handle Interrupts
```php
if ($result['status'] === 'interrupted') {
    $_SESSION['state'] = $result['state'];
    // Show form or message
}
```

### Resume Execution
```php
$result = $engine->resume(
    $script,
    $_SESSION['state'],
    $userInput
);
```

### Bytecode Cache
```php
$bytecode = $engine->compile($script);
$result = $engine->executeFromBytecode($bytecode);
```

## Requirements

- PHP 8.0+
- Composer dependencies installed
- Web server for web examples (php -S or Apache/Nginx)

## Next Steps

1. Start with **01-basic/** to learn syntax
2. Try **02-web-integration/** for web apps
3. Study **03-workflow/** for production patterns
4. Explore **04-multi-language/** for custom languages

## Documentation

- **README.md** (main): Project overview
- **docs/ARCHITECTURE.md**: System design
- **docs/INTEGRATION.md**: Integration guide
- **tests/README.md**: Test suite documentation
