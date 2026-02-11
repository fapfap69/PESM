<?php
/**
 * PESM - Commands Registry
 * Manages built-in and custom functions
 * 
 * @author Antonio Franco <antonio.franco@ba.infn.it>
 */

namespace PESM\Runtime;

class Commands {
    private array $handlers = [];
    
    public function __construct() {
        $this->registerBuiltIns();
    }
    
    /**
     * Register a command/function
     */
    public function register(string $name, callable $handler): void {
        $this->handlers[strtoupper($name)] = $handler;
    }
    
    /**
     * Check if command exists
     */
    public function has(string $name): bool {
        return isset($this->handlers[strtoupper($name)]);
    }
    
    /**
     * Execute a command
     */
    public function execute(string $name, array $args, $context): mixed {
        $key = strtoupper($name);
        if (!isset($this->handlers[$key])) {
            throw new \Exception("Command not found: {$name}");
        }
        
        return $this->handlers[$key]($args, $context);
    }
    
    /**
     * Get list of standard built-in function names
     */
    public static function getStandardBuiltIns(): array {
        return [
            // String (5)
            'LEN', 'UPPER', 'LOWER', 'SUBSTR', 'TRIM',
            // Math (6)
            'ABS', 'ROUND', 'MIN', 'MAX', 'SQRT', 'POW',
            // Array (3)
            'COUNT', 'SUM', 'JOIN',
            // Type (3)
            'STR', 'INT', 'FLOAT',
            // Utility (2)
            'TIME', 'TIMESTAMP'
        ];
    }
    
    /**
     * Register built-in functions
     */
    private function registerBuiltIns(): void {
        // String functions (5)
        $this->register('LEN', fn($args) => strlen((string)$args[0]));
        $this->register('UPPER', fn($args) => strtoupper((string)$args[0]));
        $this->register('LOWER', fn($args) => strtolower((string)$args[0]));
        $this->register('SUBSTR', fn($args) => substr((string)$args[0], (int)$args[1], isset($args[2]) ? (int)$args[2] : null));
        $this->register('TRIM', fn($args) => trim((string)$args[0]));
        
        // Math functions (6)
        $this->register('ABS', fn($args) => abs($args[0]));
        $this->register('ROUND', fn($args) => round($args[0], isset($args[1]) ? (int)$args[1] : 0));
        $this->register('MIN', fn($args) => min(...$args));
        $this->register('MAX', fn($args) => max(...$args));
        $this->register('SQRT', fn($args) => sqrt($args[0]));
        $this->register('POW', fn($args) => pow($args[0], $args[1]));
        
        // Array functions (3)
        $this->register('COUNT', fn($args) => is_array($args[0]) ? count($args[0]) : 0);
        $this->register('SUM', fn($args) => is_array($args[0]) ? array_sum($args[0]) : 0);
        $this->register('JOIN', fn($args) => is_array($args[0]) ? implode(isset($args[1]) ? (string)$args[1] : ',', $args[0]) : '');
        
        // Type functions (3)
        $this->register('STR', fn($args) => (string)$args[0]);
        $this->register('INT', fn($args) => (int)$args[0]);
        $this->register('FLOAT', fn($args) => (float)$args[0]);
        
        // Utility functions (2)
        $this->register('TIME', fn($args) => time());
        $this->register('TIMESTAMP', fn($args) => date('d/m/Y H:i:s'));
    }
}
