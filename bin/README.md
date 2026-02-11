# PESM Parser Builder

## Overview

The Parser Builder is a CLI tool that validates your BNF grammar, converts it to PEG format, and generates the parser automatically.

## Usage

### Basic Build

```bash
php bin/build-parser.php
```

This will:
1. ✓ Validate BNF grammar syntax
2. ✓ Convert BNF to PEG format
3. ✓ Generate parser using PHP-PEG
4. ✓ Output: `src/Parser/GeneratedParser.php`

### Build with Testing

```bash
php bin/build-parser.php --test
```

Includes automatic parser testing after generation.

## Workflow

### 1. Install PESM in Your Project

```bash
composer require your-org/pesm
```

### 2. Customize Grammar (Optional)

Edit the BNF grammar to match your embedded language:

```bash
nano vendor/your-org/pesm/grammar/pesm.bnf
```

### 3. Build Parser

```bash
php vendor/your-org/pesm/bin/build-parser.php
```

### 4. Use in Your Code

```php
<?php
require 'vendor/autoload.php';

$engine = new PESM\ScriptEngine();
$result = $engine->execute('x = 10 + 5', []);

echo $result['variables']['x']; // 15
```

## Files Generated

- `grammar/pesm.peg` - PEG grammar (intermediate)
- `src/Parser/GeneratedParser.php` - Final parser class

## Customization

### Modify Grammar

Edit `grammar/pesm.bnf` with your language rules:

```bnf
<statement> ::= <assignment> | <if_statement> | <custom_command>
<custom_command> ::= "MYCMD" <expression>
```

### Extend AST

Add new node types in `src/Parser/AST/`:

```php
class MyCustomNode extends Node {
    public function execute(ExecutionContext $ctx) {
        // Your logic
    }
}
```

### Rebuild

```bash
php bin/build-parser.php
```

## Troubleshooting

### "PHP-PEG not found"

```bash
composer install
```

### "BNF validation failed"

Check your grammar syntax in `grammar/pesm.bnf`

### "Parser generation failed"

Check PEG syntax in generated `grammar/pesm.peg`

## Output Example

```
ℹ PESM Parser Builder v1.0

ℹ Validating BNF grammar...
✓ BNF grammar is valid
ℹ Converting BNF to PEG format...
✓ PEG grammar generated
ℹ Generating parser from PEG...
✓ Parser generated successfully

✓ Parser build completed!
ℹ Generated file: src/Parser/GeneratedParser.php
```
