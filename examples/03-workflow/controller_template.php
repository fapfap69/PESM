<?php
/**
 * PESM - Controller Template: INPUT → Calcolo → OUTPUT
 * 
 * Esempio: Script che chiede un numero, calcola il quadrato, mostra il risultato
 */

session_start();
require_once __DIR__ . '/../vendor/autoload.php';
use PESM\ScriptEngine;

// Script PESM
$script = '
    INPUT "Inserisci un numero: " numero
    quadrato = numero * numero
    MESSAGE "Il quadrato di " + numero + " è " + quadrato
';

// Inizializza engine
$engine = new ScriptEngine();

// ============================================
// GESTIONE STATO ESECUZIONE
// ============================================

if (!isset($_SESSION['execution'])) {
    // ========================================
    // PRIMA ESECUZIONE
    // ========================================
    
    $result = $engine->execute($script);
    
    if ($result['status'] === 'interrupted') {
        // Salva stato per resume
        $_SESSION['execution'] = [
            'script' => $script,
            'state' => $result['state'],
            'resumeFrom' => $result['resumeFrom'],
            'targetVar' => $result['targetVar'] ?? null
        ];
        
        // Gestisci interrupt
        handleInterrupt($result);
    } else {
        // Completato subito (non dovrebbe succedere in questo caso)
        showCompleted($result);
    }
    
} else {
    // ========================================
    // RESUME DOPO INPUT UTENTE
    // ========================================
    
    $state = $_SESSION['execution'];
    
    // Ottieni input utente (da POST)
    $userInput = $_POST['user_input'] ?? null;
    
    if ($userInput === null) {
        die("Errore: input mancante");
    }
    
    // Resume esecuzione
    $result = $engine->resume(
        $state['script'],
        $state['state'],
        $state['resumeFrom'],
        $userInput,
        $state['targetVar']
    );
    
    if ($result['status'] === 'interrupted') {
        // Altro interrupt (es. MESSAGE)
        $_SESSION['execution']['state'] = $result['state'];
        $_SESSION['execution']['resumeFrom'] = $result['resumeFrom'];
        $_SESSION['execution']['targetVar'] = $result['targetVar'] ?? null;
        
        handleInterrupt($result);
        
    } else if ($result['status'] === 'success') {
        // Completato
        unset($_SESSION['execution']);
        showCompleted($result);
        
    } else {
        // Errore
        unset($_SESSION['execution']);
        showError($result);
    }
}

// ============================================
// FUNZIONI DI GESTIONE
// ============================================

function handleInterrupt($result) {
    switch ($result['action']) {
        case 'input':
            // Mostra form per input
            showInputForm($result['actionData']);
            break;
            
        case 'message':
            // Mostra messaggio e auto-resume
            showMessage($result['actionData']);
            autoResume();
            break;
            
        case 'accept':
            // Richiesta approvazione
            showApprovalRequest($result['actionData']);
            break;
            
        case 'refuse':
            // Rifiuto
            showRejection($result['actionData']);
            unset($_SESSION['execution']);
            break;
    }
}

function showInputForm($prompt) {
    ?>
    <!DOCTYPE html>
    <html>
    <head>
        <title>Input Richiesto</title>
    </head>
    <body>
        <h1>Input Richiesto</h1>
        <p><?= htmlspecialchars($prompt) ?></p>
        
        <form method="POST">
            <input type="text" name="user_input" required autofocus>
            <button type="submit">Invia</button>
        </form>
    </body>
    </html>
    <?php
}

function showMessage($message) {
    ?>
    <!DOCTYPE html>
    <html>
    <head>
        <title>Messaggio</title>
    </head>
    <body>
        <h1>Messaggio</h1>
        <p><?= htmlspecialchars($message) ?></p>
        <p>Continuazione automatica...</p>
    </body>
    </html>
    <?php
}

function autoResume() {
    // Auto-submit per continuare
    ?>
    <script>
        setTimeout(function() {
            window.location.reload();
        }, 2000);
    </script>
    <?php
}

function showCompleted($result) {
    ?>
    <!DOCTYPE html>
    <html>
    <head>
        <title>Completato</title>
    </head>
    <body>
        <h1>Esecuzione Completata</h1>
        <h2>Variabili Finali:</h2>
        <pre><?= htmlspecialchars(print_r($result['variables'], true)) ?></pre>
        <a href="?">Riavvia</a>
    </body>
    </html>
    <?php
}

function showError($result) {
    ?>
    <!DOCTYPE html>
    <html>
    <head>
        <title>Errore</title>
    </head>
    <body>
        <h1>Errore</h1>
        <p style="color: red;"><?= htmlspecialchars($result['error']) ?></p>
        <h2>Variabili al momento dell'errore:</h2>
        <pre><?= htmlspecialchars(print_r($result['variables'], true)) ?></pre>
        <a href="?">Riavvia</a>
    </body>
    </html>
    <?php
}

function showApprovalRequest($message) {
    ?>
    <!DOCTYPE html>
    <html>
    <head>
        <title>Approvazione Richiesta</title>
    </head>
    <body>
        <h1>Approvazione Richiesta</h1>
        <p><?= htmlspecialchars($message) ?></p>
        
        <form method="POST">
            <input type="hidden" name="user_input" value="approved">
            <button type="submit">Approva</button>
        </form>
        
        <form method="POST">
            <input type="hidden" name="user_input" value="rejected">
            <button type="submit">Rifiuta</button>
        </form>
    </body>
    </html>
    <?php
}

function showRejection($message) {
    ?>
    <!DOCTYPE html>
    <html>
    <head>
        <title>Rifiutato</title>
    </head>
    <body>
        <h1>Operazione Rifiutata</h1>
        <p><?= htmlspecialchars($message) ?></p>
        <a href="?">Riavvia</a>
    </body>
    </html>
    <?php
}
