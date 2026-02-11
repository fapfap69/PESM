<?php
/**
 * PESM - Global Context
 * Manages global variables and STRUCT definitions with optional persistence
 * 
 * @author Antonio Franco <antonio.franco@ba.infn.it>
 */

namespace PESM\Runtime;

class GlobalContext {
    public array $variables = [];
    public array $structs = [];
    
    private ?string $persistenceId = null;
    private string $persistenceMode = 'none'; // 'none', 'session', 'eternal'
    
    /**
     * Create a new GlobalContext
     * 
     * @param string|null $id Custom ID (null = auto-generate)
     * @param string $mode Persistence mode: 'none', 'session', 'eternal'
     */
    public function __construct(?string $id = null, string $mode = 'none') {
        $this->persistenceMode = $mode;
        $this->persistenceId = $id ?? $this->generateId();
        
        if ($mode !== 'none') {
            $this->load();
        }
    }
    
    /**
     * Generate unique ID based on persistence mode
     */
    private function generateId(): string {
        return match($this->persistenceMode) {
            'session' => 'sess_' . (session_id() ?: uniqid('nosess_')),
            'eternal' => 'global_' . uniqid('ctx_', true),
            default => 'temp_' . uniqid()
        };
    }
    
    /**
     * Get file path for persistence
     */
    private function getFilePath(): string {
        $dir = sys_get_temp_dir() . '/pesm_contexts';
        if (!is_dir($dir)) {
            mkdir($dir, 0755, true);
        }
        return $dir . '/' . $this->persistenceId . '.json';
    }
    
    /**
     * Save context to file
     */
    public function save(): void {
        if ($this->persistenceMode === 'none') {
            return;
        }
        
        $data = [
            'variables' => $this->variables,
            'structs' => $this->structs,
            'timestamp' => time(),
            'mode' => $this->persistenceMode
        ];
        
        file_put_contents(
            $this->getFilePath(), 
            json_encode($data, JSON_PRETTY_PRINT)
        );
    }
    
    /**
     * Load context from file
     */
    public function load(): void {
        $path = $this->getFilePath();
        
        if (!file_exists($path)) {
            return;
        }
        
        // Session: check expiration
        if ($this->persistenceMode === 'session') {
            $maxAge = ini_get('session.gc_maxlifetime') ?: 1440;
            if (time() - filemtime($path) > $maxAge) {
                $this->delete();
                return;
            }
        }
        
        $data = json_decode(file_get_contents($path), true);
        if ($data) {
            $this->variables = $data['variables'] ?? [];
            $this->structs = $data['structs'] ?? [];
        }
    }
    
    /**
     * Delete persisted context
     */
    public function delete(): void {
        $path = $this->getFilePath();
        if (file_exists($path)) {
            unlink($path);
        }
    }
    
    /**
     * Get context ID
     */
    public function getId(): string {
        return $this->persistenceId;
    }
    
    /**
     * Get persistence mode
     */
    public function getMode(): string {
        return $this->persistenceMode;
    }
    
    /**
     * Reset context (clear all data)
     */
    public function reset(): void {
        $this->variables = [];
        $this->structs = [];
        
        if ($this->persistenceMode !== 'none') {
            $this->save();
        }
    }
    
    /**
     * Cleanup expired contexts
     * 
     * @param string $mode Mode to cleanup: 'session', 'temp', 'all'
     * @return int Number of files deleted
     */
    public static function cleanup(string $mode = 'session'): int {
        $dir = sys_get_temp_dir() . '/pesm_contexts';
        if (!is_dir($dir)) {
            return 0;
        }
        
        $count = 0;
        $maxAge = $mode === 'session' 
            ? (ini_get('session.gc_maxlifetime') ?: 1440)
            : 86400; // 24h for temp
        
        foreach (glob($dir . '/*.json') as $file) {
            $basename = basename($file, '.json');
            $age = time() - filemtime($file);
            
            $shouldDelete = false;
            
            if ($mode === 'all') {
                $shouldDelete = true;
            } elseif ($mode === 'session' && str_starts_with($basename, 'sess_')) {
                $shouldDelete = $age > $maxAge;
            } elseif ($mode === 'temp' && str_starts_with($basename, 'temp_')) {
                $shouldDelete = $age > $maxAge;
            }
            
            if ($shouldDelete) {
                unlink($file);
                $count++;
            }
        }
        
        return $count;
    }
    
    /**
     * List all persisted contexts
     * 
     * @return array Array of context info
     */
    public static function listAll(): array {
        $dir = sys_get_temp_dir() . '/pesm_contexts';
        if (!is_dir($dir)) {
            return [];
        }
        
        $contexts = [];
        foreach (glob($dir . '/*.json') as $file) {
            $data = json_decode(file_get_contents($file), true);
            $contexts[] = [
                'id' => basename($file, '.json'),
                'mode' => $data['mode'] ?? 'unknown',
                'timestamp' => $data['timestamp'] ?? filemtime($file),
                'age' => time() - filemtime($file),
                'size' => filesize($file),
                'variables' => count($data['variables'] ?? []),
                'structs' => count($data['structs'] ?? [])
            ];
        }
        
        return $contexts;
    }
}
