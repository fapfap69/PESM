# PESM API Reference

Complete API documentation for PESM classes and methods.

## ScriptEngine

**Namespace**: `PESM\ScriptEngine`  
**File**: `src/ScriptEngine.php`

Main facade for script execution.

### Constructor

```php
public function __construct(
    $parser = null,
    $converter = null,
    ?Runtime\GlobalContext $context = null,
    string $persistenceMode = 'none'
)
```

**Parameters**:
- `$parser` - Custom parser (optional)
- `$converter` - Custom converter (optional)
- `$context` - GlobalContext instance (optional, created if null)
- `$persistenceMode` - Context persistence: 'none', 'session', 'eternal'

**Example**:
```php
$engine = new ScriptEngine();

// With eternal persistence
$engine = new ScriptEngine(null, null, null, 'eternal');

// With custom context
$context = new GlobalContext('my_context', 'eternal');
$engine = new ScriptEngine(null, null, $context);
```

### execute()

```php
public function execute(
    string $script,
    array $variables = [],
    ?array $state = null,
    ?int $resumeFrom = null,
    mixed $returnValue = null
): array
```

Execute a script.

**Parameters**:
- `$script` - Script text
- `$variables` - Initial variables (merged into GlobalContext)
- `$state` - VM state for resume (optional)
- `$resumeFrom` - PC for resume (deprecated, use state)
- `$returnValue` - Return value from interrupt (optional)

**Returns**: Array with:
- `status` - 'success', 'interrupted', or 'error'
- `variables` - Final variable state
- `action` - Interrupt action ('message', 'input', 'accept', 'refuse')
- `actionData` - Interrupt data
- `resumeFrom` - PC to resume from
- `state` - VM state for resume
- `expectsReturn` - Whether interrupt expects return value
- `targetVar` - Target variable for INPUT
- `error` - Error message (if status='error')

**Example**:
```php
$result = $engine->execute('x = 10 + 5');
echo $result['variables']['x'];  // 15

// With interrupt
$result = $engine->execute('MESSAGE "Hello"');
if ($result['status'] === 'interrupted') {
    echo $result['actionData'];  // "Hello"
}
```

### resume()

```php
public function resume(
    string $script,
    array $state,
    mixed $returnValue = null,
    ?string $targetVar = null
): array
```

Resume execution after interrupt.

**Parameters**:
- `$script` - Original script
- `$state` - State from previous execute()
- `$returnValue` - User input or return value
- `$targetVar` - Target variable for INPUT (auto-stored)

**Returns**: Same as execute()

**Example**:
```php
// First execution
$result = $engine->execute('INPUT "Name: " userName');

// Resume with user input
$result = $engine->resume(
    'INPUT "Name: " userName',
    $result['state'],
    'Mario'
);
```

### compile()

```php
public function compile(string $script): array
```

Compile script to bytecode without executing.

**Returns**: Array of `Instruction` objects

**Example**:
```php
$bytecode = $engine->compile('x = 10');
// Cache bytecode for reuse
```

### executeFromBytecode()

```php
public function executeFromBytecode(
    array $bytecode,
    array $variables = [],
    ?array $state = null,
    ?int $resumeFrom = null,
    mixed $returnValue = null
): array
```

Execute pre-compiled bytecode.

**Parameters**: Same as execute(), but bytecode instead of script

**Returns**: Same as execute()

**Example**:
```php
$bytecode = $engine->compile($script);
$result = $engine->executeFromBytecode($bytecode);
```

### getContext()

```php
public function getContext(): Runtime\GlobalContext
```

Get GlobalContext instance.

**Example**:
```php
$context = $engine->getContext();
$context->variables['x'] = 100;
```

## GlobalContext

**Namespace**: `PESM\Runtime\GlobalContext`  
**File**: `src/Runtime/GlobalContext.php`

Manages global variables and STRUCT definitions with persistence.

### Constructor

```php
public function __construct(
    ?string $id = null,
    string $persistenceMode = 'none'
)
```

**Parameters**:
- `$id` - Context ID for persistence (auto-generated if null)
- `$persistenceMode` - 'none', 'session', 'eternal'

### Properties

```php
public array $variables = [];  // Global variables
public array $structs = [];    // STRUCT definitions
```

### save()

```php
public function save(): void
```

Persist context to storage (session or filesystem).

### load()

```php
public static function load(string $id, string $mode): ?GlobalContext
```

Load context from storage.

### delete()

```php
public function delete(): void
```

Remove context from storage.

### reset()

```php
public function reset(): void
```

Clear all variables and structs.

### Static Methods

```php
public static function cleanup(string $mode, int $maxAge): int
public static function listAll(string $mode): array
```

**Example**:
```php
// Create eternal context
$context = new GlobalContext('workflow_123', 'eternal');
$context->variables['status'] = 'pending';
$context->save();

// Later, reload
$context = GlobalContext::load('workflow_123', 'eternal');
echo $context->variables['status'];  // 'pending'
```

## VM

**Namespace**: `PESM\Bytecode\VM`  
**File**: `src/Bytecode/VM.php`

Stack-based bytecode virtual machine (internal use).

### execute()

```php
public function execute(
    array $bytecode,
    GlobalContext $globals,
    ?array $state = null,
    ?int $resumeFrom = null,
    mixed $returnValue = null
): Result
```

**Note**: Use ScriptEngine instead of calling VM directly.

## Compiler

**Namespace**: `PESM\Bytecode\Compiler`  
**File**: `src/Bytecode/Compiler.php`

AST to bytecode compiler (internal use).

### compile()

```php
public function compile(Node $ast): array
```

**Note**: Use ScriptEngine.compile() instead.

## Result

**Namespace**: `PESM\Runtime\Result`  
**File**: `src/Runtime/Result.php`

Execution result object.

### Properties

```php
public string $status;           // 'success', 'interrupted', 'error'
public array $variables;         // Variable state
public ?string $message;         // Message (deprecated)
public ?string $action;          // Interrupt action
public ?string $error;           // Error message
public mixed $actionData;        // Interrupt data
public ?int $resumeFrom;         // Resume PC
public ?array $state;            // VM state
public bool $expectsReturn;      // Expects return value
public ?string $targetVar;       // INPUT target variable
```

### toArray()

```php
public function toArray(): array
```

Convert to array (used by ScriptEngine).

## Instruction

**Namespace**: `PESM\Bytecode\Instruction`  
**File**: `src/Bytecode/Instruction.php`

Bytecode instruction.

### Properties

```php
public string $opcode;   // Opcode name
public mixed $operand;   // Operand value
```

### __toString()

```php
public function __toString(): string
```

Format: `OPCODE operand`

## See Also

- [INTEGRATION_GUIDE.md](INTEGRATION_GUIDE.md) - Integration patterns
- [BYTECODE_REFERENCE.md](BYTECODE_REFERENCE.md) - VM opcodes
- [../examples/](../examples/) - Working examples
