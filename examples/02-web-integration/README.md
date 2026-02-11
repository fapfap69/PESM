# PESM Web Integration Examples

Examples showing how to integrate PESM with web applications using PHP sessions and HTML interfaces.

## Examples

### 1. Web Executor (`web_executor.html` + `executor.php`)
Interactive web interface for executing PESM scripts.

**Features:**
- HTML form for script input
- Real-time execution
- Variable display
- Error handling

**Usage:**
```bash
php -S localhost:8000
# Open http://localhost:8000/examples/02-web-integration/web_executor.html
```

### 2. Test Scripts

#### `test_if_else.php`
Tests IF-ELSE statements with web output.

#### `test_pesm_resume.php`
Demonstrates interrupt/resume pattern with INPUT.

## How It Works

1. **User submits script** via HTML form
2. **PHP backend** executes script using ScriptEngine
3. **Interrupt handling**: If script requires input (INPUT command), execution pauses
4. **Session storage**: VM state saved in PHP session
5. **Resume**: User provides input, execution continues from checkpoint

## Architecture

```
Browser (HTML/JS)
    ↓ POST script
PHP Controller (executor.php)
    ↓ execute()
ScriptEngine
    ↓ bytecode
VM
    ↓ interrupt
Session Storage
    ↓ resume
VM continues
```

## See Also

- **WEB_EXECUTOR.md**: Detailed documentation
- **03-workflow**: Advanced workflow patterns
