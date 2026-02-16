# Step-by-Step Execution & Breakpoints - Design Document

## Overview

Design for implementing debugging capabilities in PESM VM:
- Step-by-step execution (step into, step over, step out)
- Breakpoints (line-based and instruction-based)
- State inspection at each step

---

## Current Architecture

### VM Execution Model

```php
public function execute(array $bytecode, ...): Result {
    while ($this->pc < count($this->bytecode)) {
        $instr = $this->bytecode[$this->pc];
        $this->executeInstruction($instr);  // Executes and increments PC
    }
    return new Result('success', ...);
}
```

**Key Points:**
- Continuous loop execution
- No pause mechanism except interrupts (MESSAGE, INPUT, etc.)
- State is only captured on interrupts
- PC (program counter) advances automatically

---

## Proposed Architecture

### 1. Debug Mode Flag

Add debug mode to VM constructor:

```php
class VM {
    private bool $debugMode = false;
    private array $breakpoints = [];
    private ?DebugCallback $debugCallback = null;
    
    public function setDebugMode(bool $enabled, ?DebugCallback $callback = null): void {
        $this->debugMode = $enabled;
        $this->debugCallback = $callback;
    }
    
    public function setBreakpoints(array $breakpoints): void {
        // $breakpoints = [pc1, pc2, pc3, ...] or ['line' => [line1, line2]]
        $this->breakpoints = $breakpoints;
    }
}
```

### 2. Step Execution

Modify execute loop to support stepping:

```php
public function execute(..., ?string $stepMode = null): Result {
    // $stepMode: null (run), 'step_into', 'step_over', 'step_out'
    
    $stepsExecuted = 0;
    $targetFrameDepth = null;
    
    if ($stepMode === 'step_over') {
        $targetFrameDepth = $this->getFrameDepth();
    } elseif ($stepMode === 'step_out') {
        $targetFrameDepth = $this->getFrameDepth() - 1;
    }
    
    while ($this->pc < count($this->bytecode)) {
        $instr = $this->bytecode[$this->pc];
        
        // Check breakpoint BEFORE execution
        if ($this->isBreakpoint($this->pc)) {
            return $this->createDebugResult('breakpoint');
        }
        
        // Execute instruction
        $this->executeInstruction($instr);
        $stepsExecuted++;
        
        // Check step mode AFTER execution
        if ($stepMode === 'step_into') {
            // Stop after every instruction
            return $this->createDebugResult('step');
        }
        
        if ($stepMode === 'step_over' && $this->getFrameDepth() <= $targetFrameDepth) {
            // Stop when returned to same or higher level
            return $this->createDebugResult('step');
        }
        
        if ($stepMode === 'step_out' && $this->getFrameDepth() < $targetFrameDepth) {
            // Stop when returned from function
            return $this->createDebugResult('step');
        }
    }
    
    return new Result('success', ...);
}
```

### 3. Debug Result

New result type for debug pauses:

```php
private function createDebugResult(string $reason): Result {
    return new Result(
        status: 'paused',  // New status
        variables: $this->globals->variables,
        debugInfo: [
            'reason' => $reason,  // 'breakpoint', 'step', 'step_over', 'step_out'
            'pc' => $this->pc,
            'instruction' => $this->bytecode[$this->pc] ?? null,
            'stack' => $this->stack,
            'framePointer' => $this->framePointer,
            'callStack' => $this->getCallStack(),
            'locals' => $this->getLocalVariables()
        ],
        state: [
            'stack' => $this->stack,
            'pc' => $this->pc,
            'framePointer' => $this->framePointer
        ]
    );
}
```

### 4. Helper Methods

```php
private function isBreakpoint(int $pc): bool {
    return in_array($pc, $this->breakpoints);
}

private function getFrameDepth(): int {
    // Count CALL instructions in stack
    $depth = 0;
    $fp = $this->framePointer;
    while ($fp >= 0) {
        $depth++;
        $fp = $this->stack[$fp] ?? -1;
    }
    return $depth;
}

private function getCallStack(): array {
    $stack = [];
    $fp = $this->framePointer;
    
    while ($fp >= 0) {
        $returnAddr = $this->stack[$fp + 1] ?? null;
        $stack[] = [
            'framePointer' => $fp,
            'returnAddress' => $returnAddr,
            'instruction' => $this->bytecode[$returnAddr] ?? null
        ];
        $fp = $this->stack[$fp] ?? -1;
    }
    
    return $stack;
}

private function getLocalVariables(): array {
    if ($this->framePointer < 0) {
        return [];
    }
    
    $locals = [];
    $start = $this->framePointer + 1;
    $end = count($this->stack);
    
    for ($i = $start; $i < $end; $i++) {
        $locals["local_" . ($i - $start)] = $this->stack[$i];
    }
    
    return $locals;
}
```

---

## Breakpoint Types

### Interrupt Handling with Debug Mode

**Problem: Two Types of Pauses**

1. **Debug Pauses**: breakpoint, step
2. **Script Interrupts**: MESSAGE, INPUT, ACCEPT, REFUSE

**Solution: Unified 'paused' Status**

```php
public function execute(..., ?string $stepMode = null): Result {
    try {
        while ($this->pc < count($this->bytecode)) {
            // 1. Check breakpoint BEFORE execution
            if ($this->debugMode && $this->isBreakpoint($this->pc)) {
                return $this->createPausedResult('breakpoint');
            }
            
            // 2. Execute instruction (may throw InterruptException)
            $this->executeInstruction($instr);
            
            // 3. Check step mode AFTER execution
            if ($stepMode === 'step_into') {
                return $this->createPausedResult('step');
            }
        }
        
        return new Result('success', ...);
        
    } catch (InterruptException $e) {
        // 4. Script interrupt (MESSAGE, INPUT, etc.)
        return $this->createPausedResult('interrupt', $e);
    }
}
```

**Unified Result Structure:**

```php
private function createPausedResult(
    string $reason, 
    ?InterruptException $interrupt = null
): Result {
    $result = [
        'status' => 'paused',
        'reason' => $reason,  // 'breakpoint', 'step', 'interrupt'
        'variables' => $this->globals->variables,
        'state' => ['stack' => $this->stack, 'pc' => $this->pc]
    ];
    
    // Add debug info for breakpoint/step
    if ($reason === 'breakpoint' || $reason === 'step') {
        $result['debugInfo'] = [
            'pc' => $this->pc,
            'line' => $this->sourceMap[$this->pc] ?? null,
            'callStack' => $this->getCallStack()
        ];
    }
    
    // Add interrupt info for MESSAGE/INPUT/etc
    if ($reason === 'interrupt' && $interrupt) {
        $result['action'] = $interrupt->action;
        $result['actionData'] = $interrupt->actionData;
        $result['expectsReturn'] = $interrupt->expectsReturn;
    }
    
    return new Result(...$result);
}
```

**Priority Order:**

```
1. Breakpoint (before execution) - HIGHEST
2. Script Interrupt (during execution) - MEDIUM  
3. Step (after execution) - LOWEST
```

Interrupt naturally takes priority over step because exception bypasses step check.

---

## Breakpoint Types

### 1. Instruction-Based Breakpoints

```php
// Set breakpoint at specific bytecode instruction
$vm->setBreakpoints([15, 42, 103]);
```

**Pros:**
- Precise control
- Fast check (array lookup)

**Cons:**
- Requires knowing bytecode addresses
- Not user-friendly

### 2. Line-Based Breakpoints

Requires source map from Compiler:

```php
class Compiler {
    private array $sourceMap = [];  // [pc => line]
    
    private function emit(string $opcode, mixed $operand = null, ?int $line = null): void {
        $pc = count($this->bytecode);
        $this->bytecode[] = new Instruction($opcode, $operand);
        
        if ($line !== null) {
            $this->sourceMap[$pc] = $line;
        }
    }
    
    public function getSourceMap(): array {
        return $this->sourceMap;
    }
}
```

Then in VM:

```php
private array $sourceMap = [];
private array $lineBreakpoints = [];

public function setSourceMap(array $sourceMap): void {
    $this->sourceMap = $sourceMap;
}

public function setLineBreakpoints(array $lines): void {
    // Convert line numbers to PC addresses
    $this->breakpoints = [];
    foreach ($this->sourceMap as $pc => $line) {
        if (in_array($line, $lines)) {
            $this->breakpoints[] = $pc;
        }
    }
}
```

**Pros:**
- User-friendly (line numbers)
- Matches source code

**Cons:**
- Requires source map
- Multiple instructions per line

---

## Usage Examples

### Example 1: Step-by-Step Execution

```php
$engine = new ScriptEngine();
$bytecode = $engine->compile($script);

// Enable debug mode
$vm = new VM();
$vm->setDebugMode(true);

// First step
$result = $vm->execute($bytecode, $globals, stepMode: 'step_into');

while ($result['status'] === 'paused') {
    echo "PC: {$result['debugInfo']['pc']}\n";
    echo "Instruction: {$result['debugInfo']['instruction']->opcode}\n";
    echo "Stack: " . json_encode($result['debugInfo']['stack']) . "\n";
    
    // Wait for user input
    $command = readline("Debug> ");
    
    if ($command === 'step') {
        $result = $vm->execute($bytecode, $globals, 
            state: $result['state'], 
            stepMode: 'step_into'
        );
    } elseif ($command === 'continue') {
        $result = $vm->execute($bytecode, $globals, 
            state: $result['state']
        );
    }
}
```

### Example 2: Breakpoints

```php
$engine = new ScriptEngine();
$bytecode = $engine->compile($script);
$sourceMap = $engine->getSourceMap();

$vm = new VM();
$vm->setSourceMap($sourceMap);
$vm->setLineBreakpoints([5, 10, 15]);  // Break at lines 5, 10, 15

$result = $vm->execute($bytecode, $globals);

if ($result['status'] === 'paused') {
    echo "Breakpoint hit at line {$result['debugInfo']['line']}\n";
    echo "Variables: " . json_encode($result['variables']) . "\n";
    
    // Continue execution
    $result = $vm->execute($bytecode, $globals, state: $result['state']);
}
```

### Example 3: IDE Integration

```php
class DebugSession {
    private VM $vm;
    private array $bytecode;
    private ?array $state = null;
    
    public function start(string $script): void {
        $engine = new ScriptEngine();
        $this->bytecode = $engine->compile($script);
        
        $this->vm = new VM();
        $this->vm->setDebugMode(true);
        $this->vm->setSourceMap($engine->getSourceMap());
    }
    
    public function setBreakpoint(int $line): void {
        $this->vm->addLineBreakpoint($line);
    }
    
    public function stepInto(): array {
        $result = $this->vm->execute(
            $this->bytecode, 
            $globals, 
            state: $this->state,
            stepMode: 'step_into'
        );
        
        $this->state = $result['state'] ?? null;
        return $result;
    }
    
    public function continue(): array {
        $result = $this->vm->execute(
            $this->bytecode, 
            $globals, 
            state: $this->state
        );
        
        $this->state = $result['state'] ?? null;
        return $result;
    }
    
    public function getVariables(): array {
        return [
            'globals' => $this->vm->getGlobals(),
            'locals' => $this->vm->getLocals(),
            'stack' => $this->vm->getStack()
        ];
    }
}
```

---

## Performance Considerations

### 1. Debug Mode Overhead

```php
// Without debug mode
while ($this->pc < count($this->bytecode)) {
    $this->executeInstruction($this->bytecode[$this->pc]);
}

// With debug mode
while ($this->pc < count($this->bytecode)) {
    if ($this->debugMode && $this->isBreakpoint($this->pc)) {
        return $this->createDebugResult('breakpoint');
    }
    $this->executeInstruction($this->bytecode[$this->pc]);
    if ($this->stepMode) {
        return $this->createDebugResult('step');
    }
}
```

**Overhead:**
- 2 extra conditionals per instruction
- Negligible for debug scenarios
- Can be disabled in production

### 2. Breakpoint Lookup Optimization

```php
// Slow: O(n) array search
private function isBreakpoint(int $pc): bool {
    return in_array($pc, $this->breakpoints);
}

// Fast: O(1) hash lookup
private array $breakpointSet = [];

public function setBreakpoints(array $breakpoints): void {
    $this->breakpointSet = array_flip($breakpoints);
}

private function isBreakpoint(int $pc): bool {
    return isset($this->breakpointSet[$pc]);
}
```

---

## Implementation Phases

### Phase 1: Basic Step Execution
- Add `stepMode` parameter to execute()
- Implement 'step_into' mode
- Return 'paused' status with state

### Phase 2: Breakpoints
- Add breakpoint storage
- Implement breakpoint checking
- Support instruction-based breakpoints

### Phase 3: Source Mapping
- Add source map to Compiler
- Implement line-to-PC mapping
- Support line-based breakpoints

### Phase 4: Advanced Stepping
- Implement 'step_over' (same frame depth)
- Implement 'step_out' (return from function)
- Add call stack inspection

### Phase 5: IDE Integration
- Create DebugSession class
- Add variable inspection API
- Implement debug protocol (DAP compatible?)

---

## Compatibility

### Backward Compatibility

All changes are additive:
- New optional parameters (default = null)
- New status 'paused' (doesn't break existing code)
- Debug mode disabled by default

```php
// Existing code continues to work
$result = $vm->execute($bytecode, $globals);

// New debug features are opt-in
$result = $vm->execute($bytecode, $globals, stepMode: 'step_into');
```

---

## Alternative: Callback-Based Approach

Instead of returning on each step, use callbacks:

```php
interface DebugCallback {
    public function onInstruction(int $pc, Instruction $instr, array $state): string;
    // Returns: 'continue', 'pause', 'step'
}

class VM {
    public function execute(..., ?DebugCallback $callback = null): Result {
        while ($this->pc < count($this->bytecode)) {
            $instr = $this->bytecode[$this->pc];
            
            if ($callback) {
                $action = $callback->onInstruction($this->pc, $instr, $this->getState());
                if ($action === 'pause') {
                    return $this->createDebugResult('callback');
                }
            }
            
            $this->executeInstruction($instr);
        }
    }
}
```

**Pros:**
- More flexible
- Can implement custom debug logic
- No need to return/resume

**Cons:**
- More complex API
- Harder to serialize state
- Callback must be fast

---

## Recommendation

**Implement Phase 1-3 first:**
1. Step-by-step execution with state return
2. Instruction-based breakpoints
3. Source mapping for line-based breakpoints

**Benefits:**
- Minimal changes to existing code
- Clean API (optional parameters)
- Full state serialization (can pause/resume across requests)
- Foundation for IDE integration

**Defer:**
- Callback-based approach (can add later if needed)
- DAP protocol (overkill for now)
- Advanced profiling (separate feature)
