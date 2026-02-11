<?php
/**
 * PESM - Production Controller con Cache Condivisa
 * Bytecode cache su file system (condiviso tra utenti)
 */

session_start();
require_once __DIR__ . '/../vendor/autoload.php';
use PESM\ScriptEngine;

// ============================================
// BYTECODE CACHE MANAGER
// ============================================

class BytecodeCache {
    private static string $cacheDir = '/tmp/pesm_cache';
    
    public static function init(): void {
        if (!is_dir(self::$cacheDir)) {
            mkdir(self::$cacheDir, 0755, true);
        }
    }
    
    public static function get(string $script): ?array {
        $hash = md5($script);
        $file = self::$cacheDir . "/bytecode_{$hash}.bin";
        
        if (file_exists($file)) {
            return unserialize(file_get_contents($file));
        }
        return null;
    }
    
    public static function set(string $script, array $bytecode): void {
        $hash = md5($script);
        $file = self::$cacheDir . "/bytecode_{$hash}.bin";
        file_put_contents($file, serialize($bytecode));
    }
    
    public static function clear(): void {
        array_map('unlink', glob(self::$cacheDir . '/*.bin'));
    }
}

BytecodeCache::init();

// ============================================
// WORKFLOW SCRIPT
// ============================================

$script = '
    INPUT "Inserisci un numero: " numero
    quadrato = numero * numero
    MESSAGE "Il quadrato di " + numero + " è " + quadrato
';

$engine = new ScriptEngine();

// ============================================
// ESECUZIONE CON CACHE CONDIVISA
// ============================================

if (!isset($_SESSION['execution'])) {
    // ========================================
    // PRIMA ESECUZIONE
    // ========================================
    
    // Cerca bytecode in cache
    $bytecode = BytecodeCache::get($script);
    
    if (!$bytecode) {
        // Cache miss: compila e salva
        $bytecode = $engine->compile($script);
        BytecodeCache::set($script, $bytecode);
        echo "<!-- Compiled and cached -->\n";
    } else {
        echo "<!-- Loaded from cache -->\n";
    }
    
    // Esegui
    $result = $engine->executeFromBytecode($bytecode);
    
    if ($result['status'] === 'interrupted') {
        $_SESSION['execution'] = [
            'state' => $result['state'],
            'resumeFrom' => $result['resumeFrom'],
            'targetVar' => $result['targetVar'] ?? null
        ];
        // NON salviamo bytecode in sessione (è in cache!)
        
        handleInterrupt($result);
    } else {
        showCompleted($result);
    }
    
} else {
    // ========================================
    // RESUME
    // ========================================
    
    $state = $_SESSION['execution'];
    $userInput = $_POST['user_input'] ?? null;
    
    if ($userInput === null) {
        die("Errore: input mancante");
    }
    
    // Ricarica bytecode da cache
    $bytecode = BytecodeCache::get($script);
    
    if (!$bytecode) {
        die("Errore: bytecode cache perso");
    }
    
    // Auto-store INPUT
    if ($state['targetVar']) {
        $state['state']['globals'][$state['targetVar']] = $userInput;
    }
    
    // Resume
    $result = $engine->executeFromBytecode(
        $bytecode,
        [],
        $state['state'],
        $state['resumeFrom'],
        $userInput
    );
    
    if ($result['status'] === 'interrupted') {
        $_SESSION['execution']['state'] = $result['state'];
        $_SESSION['execution']['resumeFrom'] = $result['resumeFrom'];
        $_SESSION['execution']['targetVar'] = $result['targetVar'] ?? null;
        
        handleInterrupt($result);
        
    } else if ($result['status'] === 'success') {
        unset($_SESSION['execution']);
        showCompleted($result);
        
    } else {
        unset($_SESSION['execution']);
        showError($result);
    }
}

// ============================================
// FUNZIONI UI
// ============================================

function handleInterrupt($result) {
    switch ($result['action']) {
        case 'input':
            showInputForm($result['actionData']);
            break;
        case 'message':
            showMessage($result['actionData']);
            echo '<script>setTimeout(() => location.reload(), 2000);</script>';
            break;
    }
}

function showInputForm($prompt) {
    echo "<h1>Input</h1><p>" . htmlspecialchars($prompt) . "</p>";
    echo '<form method="POST"><input name="user_input" required><button>Invia</button></form>';
}

function showMessage($message) {
    echo "<h1>Messaggio</h1><p>" . htmlspecialchars($message) . "</p>";
}

function showCompleted($result) {
    echo "<h1>Completato</h1><pre>" . print_r($result['variables'], true) . "</pre>";
    echo '<a href="?">Riavvia</a>';
}

function showError($result) {
    echo "<h1>Errore</h1><p>" . htmlspecialchars($result['error']) . "</p>";
}
