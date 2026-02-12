# Editor Integration Guide

This guide explains how to integrate the Monaco editor with PESM syntax highlighting and validation into your PHP application.

---

## Overview

PESM includes a Monaco editor generator that creates:

- **Syntax highlighting** based on your grammar
- **Real-time validation** via PHP endpoint
- **Error markers** with line/column information
- **Ready-to-use HTML interface**

---

## Quick Start

### 1. Generate Editor Files

```bash
cd /path/to/PESM
php bin/build-parser.php
```

This generates files in `grammar/editor/`:

```
grammar/editor/
├── monarch.generated.js    # Monaco syntax definition
├── validate.php            # Validation endpoint
├── index.html              # Demo page
└── editor.js               # Editor initialization
```

### 2. Copy to Your Application

Copy the entire `grammar/editor/` directory to your application:

```bash
cp -r grammar/editor/ /path/to/your-app/public/script-editor/
```

### 3. Create Your Editor Page

Use the provided `index.html` as a starting point or integrate into your existing pages.

---

## Integration Methods

### Method 1: Standalone Page (Simplest)

Use the generated `index.html` directly:

```php
// In your application
header('Location: /script-editor/index.html');
```

The page includes:
- Monaco editor with syntax highlighting
- Save/Validate/Cancel buttons
- Real-time error display
- Status indicator

### Method 2: Embed in Existing Page

Include Monaco and the generated files in your HTML:

```html
<!DOCTYPE html>
<html>
<head>
    <title>Script Editor</title>
    <style>
        #editor-container { height: 600px; border: 1px solid #ccc; }
        #status { padding: 10px; margin-top: 10px; }
        .status-valid { background: #d4edda; color: #155724; }
        .status-error { background: #f8d7da; color: #721c24; }
    </style>
</head>
<body>
    <h1>Edit Script</h1>
    
    <div id="editor-container"></div>
    
    <div style="margin-top: 10px;">
        <button onclick="saveScript()">Save</button>
        <button onclick="validateScript()">Validate</button>
        <button onclick="cancelEdit()">Cancel</button>
    </div>
    
    <div id="status"></div>

    <!-- Monaco Editor -->
    <script src="https://cdn.jsdelivr.net/npm/monaco-editor@0.45.0/min/vs/loader.js"></script>
    
    <!-- PESM Language Definition -->
    <script src="monarch.generated.js"></script>
    
    <!-- Editor Initialization -->
    <script src="editor.js"></script>
    
    <script>
        // Your custom save/cancel logic
        function saveScript() {
            const code = window.editor.getValue();
            
            // Validate before saving
            fetch('validate.php', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify({ code: code })
            })
            .then(response => response.json())
            .then(data => {
                if (data.valid) {
                    // Save to your backend
                    fetch('/api/scripts/save', {
                        method: 'POST',
                        headers: { 'Content-Type': 'application/json' },
                        body: JSON.stringify({ 
                            script_id: <?= $scriptId ?>,
                            code: code 
                        })
                    })
                    .then(() => {
                        alert('Script saved successfully!');
                        window.location.href = '/scripts';
                    });
                } else {
                    alert('Please fix validation errors before saving');
                }
            });
        }
        
        function cancelEdit() {
            if (confirm('Discard changes?')) {
                window.location.href = '/scripts';
            }
        }
    </script>
</body>
</html>
```

### Method 3: Dynamic Integration

Load script content from your database:

```php
<?php
// edit-script.php
require_once 'vendor/autoload.php';

$scriptId = $_GET['id'] ?? null;
$script = $db->getScript($scriptId); // Your DB logic
?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit Script: <?= htmlspecialchars($script['name']) ?></title>
    <!-- Include Monaco and PESM files as shown above -->
</head>
<body>
    <h1>Edit: <?= htmlspecialchars($script['name']) ?></h1>
    
    <div id="editor-container"></div>
    
    <script>
        // Load existing script content
        require(['vs/editor/editor.main'], function() {
            window.editor = monaco.editor.create(
                document.getElementById('editor-container'),
                {
                    value: <?= json_encode($script['code']) ?>,
                    language: 'pesm',
                    theme: 'vs-dark',
                    automaticLayout: true,
                    minimap: { enabled: true }
                }
            );
        });
    </script>
</body>
</html>
```

---

## Validation Endpoint

The `validate.php` file provides real-time validation:

### How It Works

1. Receives POST request with JSON: `{"code": "..."}`
2. Compiles code using PESM ScriptEngine
3. Returns validation result:

```json
{
    "valid": true
}
```

Or on error:

```json
{
    "valid": false,
    "error": "Parse error in script at line 5, column 10",
    "line": 5,
    "column": 10
}
```

### Customizing Validation

Edit `validate.php` to add custom checks:

```php
<?php
require_once __DIR__ . '/../../../vendor/autoload.php';

use PESM\ScriptEngine;

header('Content-Type: application/json');

$input = json_decode(file_get_contents('php://input'), true);
$code = $input['code'] ?? '';

$engine = new ScriptEngine();

try {
    // Compile to check syntax
    $engine->compile($code);
    
    // Add custom validation
    if (strpos($code, 'DANGEROUS_FUNCTION') !== false) {
        echo json_encode([
            'valid' => false,
            'error' => 'Use of DANGEROUS_FUNCTION is not allowed',
            'line' => 1,
            'column' => 1
        ]);
        exit;
    }
    
    echo json_encode(['valid' => true]);
    
} catch (\Exception $e) {
    // Parse line/column from error message
    if (preg_match('/line (\d+), column (\d+)/', $e->getMessage(), $matches)) {
        echo json_encode([
            'valid' => false,
            'error' => $e->getMessage(),
            'line' => (int)$matches[1],
            'column' => (int)$matches[2]
        ]);
    } else {
        echo json_encode([
            'valid' => false,
            'error' => $e->getMessage()
        ]);
    }
}
```

---

## Syntax Highlighting

The `monarch.generated.js` file defines syntax highlighting rules based on your grammar.

### Customizing Colors

Override Monaco's theme in your HTML:

```javascript
monaco.editor.defineTheme('pesm-custom', {
    base: 'vs-dark',
    inherit: true,
    rules: [
        { token: 'keyword', foreground: 'FF6B6B', fontStyle: 'bold' },
        { token: 'string', foreground: '4ECDC4' },
        { token: 'number', foreground: 'FFE66D' },
        { token: 'comment', foreground: '95A5A6', fontStyle: 'italic' },
        { token: 'identifier', foreground: 'F7FFF7' }
    ],
    colors: {
        'editor.background': '#1A1A2E',
        'editor.foreground': '#F7FFF7'
    }
});

monaco.editor.setTheme('pesm-custom');
```

---

## Advanced Features

### Auto-Save

Add auto-save functionality:

```javascript
let autoSaveTimer;

window.editor.onDidChangeModelContent(() => {
    clearTimeout(autoSaveTimer);
    autoSaveTimer = setTimeout(() => {
        saveScript(true); // silent save
    }, 5000); // 5 seconds after last change
});
```

### Keyboard Shortcuts

Add custom shortcuts:

```javascript
window.editor.addCommand(
    monaco.KeyMod.CtrlCmd | monaco.KeyCode.KeyS,
    () => saveScript()
);

window.editor.addCommand(
    monaco.KeyMod.CtrlCmd | monaco.KeyCode.KeyE,
    () => validateScript()
);
```

### Read-Only Mode

Display scripts without editing:

```javascript
window.editor = monaco.editor.create(
    document.getElementById('editor-container'),
    {
        value: code,
        language: 'pesm',
        readOnly: true,
        minimap: { enabled: false }
    }
);
```

### Diff Editor

Compare script versions:

```javascript
const diffEditor = monaco.editor.createDiffEditor(
    document.getElementById('diff-container')
);

diffEditor.setModel({
    original: monaco.editor.createModel(oldCode, 'pesm'),
    modified: monaco.editor.createModel(newCode, 'pesm')
});
```

---

## Security Considerations

### 1. Validate on Server

Always validate scripts server-side before execution:

```php
// Never trust client-side validation alone
$code = $_POST['code'];

try {
    $engine = new ScriptEngine();
    $engine->compile($code); // Validate syntax
    
    // Additional security checks
    if (containsForbiddenPatterns($code)) {
        throw new Exception('Script contains forbidden operations');
    }
    
    // Save to database
    $db->saveScript($scriptId, $code);
    
} catch (Exception $e) {
    http_response_code(400);
    echo json_encode(['error' => $e->getMessage()]);
}
```

### 2. Sanitize Output

Escape error messages when displaying:

```javascript
document.getElementById('status').textContent = data.error; // Safe
// NOT: innerHTML = data.error (XSS risk)
```

### 3. Rate Limiting

Limit validation requests to prevent abuse:

```php
// validate.php
session_start();

$key = 'validate_count_' . session_id();
$count = $_SESSION[$key] ?? 0;
$resetTime = $_SESSION[$key . '_reset'] ?? time();

if (time() - $resetTime > 60) {
    $count = 0;
    $resetTime = time();
}

if ($count > 30) { // Max 30 validations per minute
    http_response_code(429);
    echo json_encode(['error' => 'Too many requests']);
    exit;
}

$_SESSION[$key] = $count + 1;
$_SESSION[$key . '_reset'] = $resetTime;

// Continue with validation...
```

---

## Troubleshooting

### Editor Not Loading

Check browser console for errors. Common issues:

1. **Monaco CDN blocked**: Download Monaco locally
2. **CORS errors**: Ensure `validate.php` is on same domain
3. **Path issues**: Verify paths to `monarch.generated.js` and `editor.js`

### Syntax Highlighting Not Working

1. Verify `monarch.generated.js` is loaded before `editor.js`
2. Check language is set to `'pesm'` in editor options
3. Regenerate files: `php bin/build-parser.php`

### Validation Not Working

1. Check `validate.php` path is correct
2. Verify PHP has access to PESM vendor directory
3. Check browser network tab for 404/500 errors
4. Test endpoint directly: `curl -X POST -d '{"code":"x=1"}' validate.php`

---

## Complete Example

Full working example with all features:

```php
<?php
// script-editor.php
require_once 'vendor/autoload.php';

$scriptId = $_GET['id'] ?? null;
$script = $scriptId ? getScript($scriptId) : ['name' => 'New Script', 'code' => ''];

function getScript($id) {
    // Your database logic
    return ['name' => 'My Script', 'code' => 'x = 1\nMESSAGE "Hello"'];
}
?>
<!DOCTYPE html>
<html>
<head>
    <title><?= htmlspecialchars($script['name']) ?></title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        #editor-container { height: 500px; border: 1px solid #ddd; }
        .toolbar { margin: 10px 0; }
        .toolbar button { padding: 8px 16px; margin-right: 5px; }
        #status { padding: 10px; margin-top: 10px; border-radius: 4px; }
        .status-valid { background: #d4edda; color: #155724; }
        .status-error { background: #f8d7da; color: #721c24; }
        .status-validating { background: #d1ecf1; color: #0c5460; }
    </style>
</head>
<body>
    <h1><?= htmlspecialchars($script['name']) ?></h1>
    
    <div id="editor-container"></div>
    
    <div class="toolbar">
        <button onclick="saveScript()">💾 Save</button>
        <button onclick="validateScript()">✓ Validate</button>
        <button onclick="cancelEdit()">✗ Cancel</button>
    </div>
    
    <div id="status"></div>

    <script src="https://cdn.jsdelivr.net/npm/monaco-editor@0.45.0/min/vs/loader.js"></script>
    <script src="/script-editor/monarch.generated.js"></script>
    <script src="/script-editor/editor.js"></script>
    
    <script>
        const scriptId = <?= json_encode($scriptId) ?>;
        const initialCode = <?= json_encode($script['code']) ?>;
        
        // Initialize with existing code
        require(['vs/editor/editor.main'], function() {
            window.editor = monaco.editor.create(
                document.getElementById('editor-container'),
                {
                    value: initialCode,
                    language: 'pesm',
                    theme: 'vs-dark',
                    automaticLayout: true
                }
            );
            
            // Keyboard shortcuts
            window.editor.addCommand(
                monaco.KeyMod.CtrlCmd | monaco.KeyCode.KeyS,
                () => saveScript()
            );
        });
        
        function validateScript() {
            const code = window.editor.getValue();
            const status = document.getElementById('status');
            
            status.className = 'status-validating';
            status.textContent = 'Validating...';
            
            fetch('/script-editor/validate.php', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify({ code: code })
            })
            .then(response => response.json())
            .then(data => {
                if (data.valid) {
                    status.className = 'status-valid';
                    status.textContent = '✓ Script is valid';
                    
                    // Clear error markers
                    monaco.editor.setModelMarkers(window.editor.getModel(), 'pesm', []);
                } else {
                    status.className = 'status-error';
                    status.textContent = '✗ ' + data.error;
                    
                    // Add error marker
                    if (data.line) {
                        monaco.editor.setModelMarkers(window.editor.getModel(), 'pesm', [{
                            startLineNumber: data.line,
                            startColumn: data.column || 1,
                            endLineNumber: data.line,
                            endColumn: (data.column || 1) + 10,
                            message: data.error,
                            severity: monaco.MarkerSeverity.Error
                        }]);
                    }
                }
            })
            .catch(err => {
                status.className = 'status-error';
                status.textContent = '✗ Validation failed: ' + err.message;
            });
        }
        
        function saveScript() {
            const code = window.editor.getValue();
            
            // Validate first
            fetch('/script-editor/validate.php', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify({ code: code })
            })
            .then(response => response.json())
            .then(data => {
                if (!data.valid) {
                    alert('Please fix validation errors before saving');
                    return;
                }
                
                // Save to backend
                return fetch('/api/scripts/save', {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/json' },
                    body: JSON.stringify({ 
                        script_id: scriptId,
                        code: code 
                    })
                });
            })
            .then(response => response.json())
            .then(data => {
                alert('Script saved successfully!');
                window.location.href = '/scripts';
            })
            .catch(err => {
                alert('Save failed: ' + err.message);
            });
        }
        
        function cancelEdit() {
            if (confirm('Discard changes?')) {
                window.location.href = '/scripts';
            }
        }
    </script>
</body>
</html>
```

---

## Summary

1. **Generate**: Run `php bin/build-parser.php` to create editor files
2. **Copy**: Copy `grammar/editor/` to your application's public directory
3. **Integrate**: Use provided HTML or embed in your pages
4. **Customize**: Adjust validation, styling, and behavior as needed

The Monaco editor provides a professional code editing experience with syntax highlighting, validation, and error markers—all automatically generated from your PESM grammar.
