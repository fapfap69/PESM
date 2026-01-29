<?php
/**
 * PESM - Execution Context
 * Manages variables, scopes, and functions
 */

namespace PESM\Runtime;

class ExecutionContext {
    private array $variables = [];
    private array $functions = [];
    private array $scopeStack = [[]];
    private ?string $message = null;
    
    public function __construct(array $initialVars = []) {
        $this->variables = $initialVars;
    }
    
    // Variable management
    public function get(string $name) {
        foreach (array_reverse($this->scopeStack) as $scope) {
            if (array_key_exists($name, $scope)) {
                return $scope[$name];
            }
        }
        return $this->variables[$name] ?? null;
    }
    
    public function set(string $name, $value): void {
        if (!empty($this->scopeStack)) {
            $this->scopeStack[count($this->scopeStack) - 1][$name] = $value;
        } else {
            $this->variables[$name] = $value;
        }
    }
    
    public function getAll(): array {
        return $this->variables;
    }
    
    // Scope management
    public function pushScope(): void {
        $this->scopeStack[] = [];
    }
    
    public function popScope(): void {
        array_pop($this->scopeStack);
    }
    
    public function getScopeStack(): array {
        return $this->scopeStack;
    }
    
    public function restoreScopeStack(array $stack): void {
        $this->scopeStack = $stack;
    }
    
    // Function management
    public function defineFunction(string $name, $funcDef): void {
        $this->functions[$name] = $funcDef;
    }
    
    public function hasFunction(string $name): bool {
        return isset($this->functions[$name]);
    }
    
    public function getFunction(string $name) {
        return $this->functions[$name];
    }
    
    // Message management
    public function setMessage(string $msg): void {
        $this->message = $msg;
    }
    
    public function getMessage(): ?string {
        return $this->message;
    }
    
    // Call stack (for checkpoint)
    public function getCallStack(): array {
        return []; // TODO: implement if needed
    }
    
    public function restoreCallStack(array $stack): void {
        // TODO: implement if needed
    }
}
