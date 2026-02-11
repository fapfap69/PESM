# PESM Workflow Examples

Production-ready patterns for workflow management with interrupt/resume support.

## Examples

### 1. Controller Template (`controller_template.php`)
Complete web controller with interrupt handling.

**Features:**
- INPUT → Calculation → OUTPUT pattern
- Session-based state management
- Auto-resume for MESSAGE
- Approval/rejection flow
- Error handling

**Usage:**
```bash
php -S localhost:8000
# Open http://localhost:8000/examples/03-workflow/controller_template.php
```

**Flow:**
1. User visits page → Script starts
2. INPUT interrupt → Show form
3. User submits → Resume execution
4. MESSAGE interrupt → Show message, auto-continue
5. Completion → Show results

### 2. Controller with Cache (`controller_cached.php`)
Optimized controller with bytecode caching.

**Features:**
- Shared bytecode cache (filesystem)
- Reduced compilation overhead
- Multi-user support
- Cache management

**Benefits:**
- **First request**: Compile + cache (slower)
- **Subsequent requests**: Load from cache (fast)
- **Shared cache**: All users benefit

**Cache Location:** `/tmp/pesm_cache/`

### 3. Workflow Handler (`workflow_handler.php`)
Programmatic workflow management class.

**Features:**
- WorkflowHandler class
- Auto-resume for MESSAGE
- ACCEPT/REFUSE handling
- Logging system
- Error management

**Usage:**
```php
$handler = new WorkflowHandler();
$result = $handler->executeWorkflow($script);

if ($result['status'] === 'accepted') {
    // Proceed with workflow
}
```

## Patterns

### Pattern 1: Simple Interrupt/Resume
```php
// First execution
$result = $engine->execute($script);
if ($result['status'] === 'interrupted') {
    $_SESSION['state'] = $result['state'];
}

// Resume
$result = $engine->resume($script, $_SESSION['state'], $userInput);
```

### Pattern 2: Bytecode Cache
```php
// Compile once
$bytecode = BytecodeCache::get($script) ?? $engine->compile($script);
BytecodeCache::set($script, $bytecode);

// Execute many times
$result = $engine->executeFromBytecode($bytecode);
```

### Pattern 3: Workflow Loop
```php
while ($result['status'] === 'interrupted') {
    if ($result['action'] === 'message') {
        handleMessage($result['actionData']);
        $result = $engine->resume($script, $result['state']);
    }
}
```

## Production Considerations

1. **State Storage**: Use Redis/Memcached instead of PHP sessions for scalability
2. **Bytecode Cache**: Use APCu or Redis for shared cache
3. **Timeouts**: Implement execution timeouts
4. **Security**: Validate and sanitize user scripts
5. **Monitoring**: Log execution times and errors

## See Also

- **GlobalContext**: Persistent context with eternal mode
- **VM State**: Minimal state (stack only) for efficient serialization
