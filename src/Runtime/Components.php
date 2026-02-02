<?php
/**
 * PESM - Runtime Components
 * ControlFlow, CommandRegistry, FunctionRegistry, ExecutionState, Result
 */

namespace PESM\Runtime;

// Control Flow Management
class ControlFlow {
    private bool $shouldBreak = false;
    private bool $shouldContinue = false;
    private bool $hasReturn = false;
    private $returnValue = null;
    private ?string $action = null;
    private $actionData = null;
    private bool $interrupt = false;
    private ?string $interruptType = null;
    private int $resumeIndex = 0;
    
    public function setBreak(): void { $this->shouldBreak = true; }
    public function setContinue(): void { $this->shouldContinue = true; }
    public function shouldBreak(): bool { return $this->shouldBreak; }
    public function shouldContinue(): bool { return $this->shouldContinue; }
    
    public function setReturn($value): void {
        $this->hasReturn = true;
        $this->returnValue = $value;
    }
    
    public function hasReturnValue(): bool { return $this->hasReturn; }
    public function getReturnValue() { return $this->returnValue; }
    public function clearReturn(): void {
        $this->hasReturn = false;
        $this->returnValue = null;
    }
    
    public function setAction(string $action, $data = null): void {
        $this->action = $action;
        $this->actionData = $data;
    }
    
    public function getAction(): ?string { return $this->action; }
    public function getActionData() { return $this->actionData; }
    
    public function setInterrupt(string $type, $data = null): void {
        $this->interrupt = true;
        $this->interruptType = $type;
        $this->actionData = $data;
    }
    
    public function needsInterrupt(): bool { return $this->interrupt; }
    public function getPendingAction(): ?string { return $this->interruptType; }
    
    public function setResumeIndex(int $index): void { $this->resumeIndex = $index; }
    public function getResumeIndex(): int { return $this->resumeIndex; }
    
    public function reset(): void {
        $this->shouldBreak = false;
        $this->shouldContinue = false;
    }
}

// Command Registry
class CommandRegistry {
    private array $commands = [];
    
    public function register(string $name, callable $handler): void {
        $this->commands[strtoupper($name)] = $handler;
    }
    
    public function has(string $name): bool {
        return isset($this->commands[strtoupper($name)]);
    }
    
    public function execute(string $name, array $args, $context) {
        $cmd = $this->commands[strtoupper($name)] ?? null;
        if (!$cmd) {
            throw new \Exception("Unknown command: $name");
        }
        return $cmd($args, $context);
    }
}

// Function Registry (Built-in Functions)
class FunctionRegistry {
    private array $functions = [];
    
    public function __construct() {
        $this->registerBuiltins();
    }
    
    public function register(string $name, callable $handler): void {
        $this->functions[strtoupper($name)] = $handler;
    }
    
    public function has(string $name): bool {
        return isset($this->functions[strtoupper($name)]);
    }
    
    public function execute(string $name, array $args, $context = null) {
        $func = $this->functions[strtoupper($name)] ?? null;
        if (!$func) {
            throw new \Exception("Unknown function: $name");
        }
        // Check if function accepts context parameter
        $ref = new \ReflectionFunction($func);
        $result = null;
        if ($ref->getNumberOfParameters() > 1) {
            $result = $func($args, $context);
        } else {
            $result = $func($args);
        }
        return $result;
    }
    
    private function registerBuiltins(): void {
        // Math
        $this->register('ABS', fn($args) => abs($args[0] ?? 0));
        $this->register('SQRT', fn($args) => sqrt($args[0] ?? 0));
        $this->register('ROUND', fn($args) => round($args[0] ?? 0));
        $this->register('FLOOR', fn($args) => floor($args[0] ?? 0));
        $this->register('CEIL', fn($args) => ceil($args[0] ?? 0));
        
        // String
        $this->register('UPPER', fn($args) => strtoupper($args[0]));
        $this->register('LOWER', fn($args) => strtolower($args[0]));
        $this->register('LENGTH', fn($args) => strlen($args[0]));
        $this->register('TRIM', fn($args) => trim($args[0]));
        
        // Array
        $this->register('SIZE', fn($args) => count($args[0]));
        $this->register('PUSH', fn($args) => [...$args[0], $args[1]]);
        $this->register('POP', function($args) {
            $arr = $args[0];
            array_pop($arr);
            return $arr;
        });
    }
}

// Execution State (for Checkpoint)
class ExecutionState {
    public function __construct(
        public int $nodeId,
        public array $variables,
        public array $callStack,
        public array $scopeStack,
        public ?string $pendingAction
    ) {}
    
    public function serialize(): string {
        return json_encode([
            'nodeId' => $this->nodeId,
            'variables' => $this->variables,
            'callStack' => $this->callStack,
            'scopeStack' => $this->scopeStack,
            'pendingAction' => $this->pendingAction
        ]);
    }
    
    public static function deserialize(string $data): self {
        $arr = json_decode($data, true);
        return new self(
            $arr['nodeId'],
            $arr['variables'],
            $arr['callStack'],
            $arr['scopeStack'],
            $arr['pendingAction']
        );
    }
}

// Execution Result
class Result {
    public function __construct(
        public string $status,
        public array $variables = [],
        public ?string $message = null,
        public ?string $action = null,
        public ?string $error = null,
        public $actionData = null,
        public ?int $resumeFrom = null
    ) {}
    
    public function toArray(): array {
        return [
            'status' => $this->status,
            'variables' => $this->variables,
            'message' => $this->message,
            'action' => $this->action,
            'error' => $this->error,
            'actionData' => $this->actionData,
            'resumeFrom' => $this->resumeFrom
        ];
    }
}
