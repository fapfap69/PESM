<?php
/**
 * PROPOSTA: Implementazione WHILE Loop
 */

// ============================================
// 1. GRAMMATICA (pesm.peg)
// ============================================
/*
#node(WhileNode)
WhileStatement: "WHILE" _ cond:Expression _ body:Statement+ "END"
  function body(&$res, $sub) {
    if (!isset($res['loopBody'])) $res['loopBody'] = [];
    $res['loopBody'][] = $sub;
  }

// Aggiungere a Statement:
Statement: alt:FunctionDef _ | alt:IfStatement _ | alt:WhileStatement _ | alt:ForeachStatement _ | ...

// Aggiungere a Keyword:
Keyword: ("WHILE" | "FUNCTION" | "RETURN" | ...) !(/[a-zA-Z0-9_]/)
*/

// ============================================
// 2. AST NODE (Nodes.php)
// ============================================
namespace PESM\Parser\AST;

class WhileNode extends Node {
    public function __construct(
        public Node $condition,
        public array $body
    ) {
        parent::__construct();
    }
    
    public function execute($context, $flow, $commands, $pc = null) {
        while (true) {
            // Valuta condizione
            $condValue = $this->condition->execute($context, $flow, $commands, $pc);
            
            if (!$condValue) {
                break;  // Condizione falsa, esci
            }
            
            // Esegui body
            foreach ($this->body as $stmt) {
                // Skip se in resume mode
                if ($pc && $pc->shouldSkip($stmt->id)) {
                    continue;
                }
                
                if ($pc) $pc->setCurrentNode($stmt->id);
                
                $stmt->execute($context, $flow, $commands, $pc);
                
                // Gestione BREAK
                if ($flow->shouldBreak()) {
                    $flow->reset();
                    return;
                }
                
                // Gestione CONTINUE
                if ($flow->shouldContinue()) {
                    $flow->reset();
                    break;  // Esci dal foreach, continua while
                }
                
                // Gestione RETURN
                if ($flow->hasReturnValue()) {
                    return;
                }
                
                // Gestione INTERRUPT
                if ($flow->needsInterrupt()) {
                    return;
                }
            }
        }
    }
    
    public function getChildren(): array {
        return array_merge([$this->condition], $this->body);
    }
}

// ============================================
// 3. ESEMPI USO
// ============================================

// Esempio 1: Contatore semplice
$script1 = '
counter = 0
WHILE counter < 5
  MESSAGE "Counter: " + counter
  counter = counter + 1
END
';

// Esempio 2: Con BREAK
$script2 = '
x = 0
WHILE x < 10
  IF x == 5
    BREAK
  END
  x = x + 1
END
';

// Esempio 3: Con CONTINUE
$script3 = '
i = 0
WHILE i < 10
  i = i + 1
  IF i % 2 == 0
    CONTINUE
  END
  MESSAGE "Dispari: " + i
END
';

// Esempio 4: Con interrupt
$script4 = '
attempts = 0
WHILE attempts < 3
  MESSAGE "Tentativo " + attempts
  attempts = attempts + 1
  IF attempts == 2
    ACCEPT "success"
  END
END
';

// Esempio 5: Loop infinito con condizione interna
$script5 = '
WHILE 1 == 1
  MESSAGE "Inserisci comando"
  IF userInput == "exit"
    BREAK
  END
END
';

// ============================================
// 4. CONFRONTO CON FOREACH
// ============================================

// FOREACH: Itera su collezione
$foreach = '
items = [1, 2, 3, 4, 5]
FOREACH item IN items
  MESSAGE item
END
';

// WHILE: Condizione generica
$while = '
i = 1
WHILE i <= 5
  MESSAGE i
  i = i + 1
END
';

// ============================================
// 5. GESTIONE INTERRUPT IN WHILE
// ============================================

$handler = new WorkflowHandler();

$script = '
counter = 0
WHILE counter < 3
  MESSAGE "Iterazione " + counter
  counter = counter + 1
END
MESSAGE "Completato"
';

// Esecuzione:
// 1. Prima iterazione: MESSAGE "Iterazione 0" → interrupt
// 2. Resume: counter=1, continua while
// 3. Seconda iterazione: MESSAGE "Iterazione 1" → interrupt
// 4. Resume: counter=2, continua while
// 5. Terza iterazione: MESSAGE "Iterazione 2" → interrupt
// 6. Resume: counter=3, esce da while
// 7. MESSAGE "Completato" → interrupt
// 8. Resume: fine

// ============================================
// 6. IMPLEMENTAZIONE COMPLETA
// ============================================

// Step 1: Aggiungi a grammar/pesm.peg
/*
#node(WhileNode)
WhileStatement: "WHILE" _ cond:Expression _ body:Statement+ "END"
  function body(&$res, $sub) {
    if (!isset($res['loopBody'])) $res['loopBody'] = [];
    $res['loopBody'][] = $sub;
  }
*/

// Step 2: Aggiungi WhileNode a src/Parser/AST/Nodes.php
// (codice sopra)

// Step 3: Aggiungi WHILE a Keyword in grammar
// Keyword: ("WHILE" | "FUNCTION" | ...)

// Step 4: Aggiungi WhileStatement a Statement
// Statement: alt:WhileStatement _ | ...

// Step 5: Rigenera parser
// php bin/build-parser.php

// Step 6: Test
$engine = new PESM\ScriptEngine();
$result = $engine->execute('
  x = 0
  WHILE x < 3
    MESSAGE x
    x = x + 1
  END
');

// ============================================
// 7. VANTAGGI STRUTTURA ATTUALE
// ============================================

/*
✅ ProgramCounter funziona automaticamente
✅ Skip logic già implementata
✅ Interrupt/resume funziona in WHILE
✅ BREAK/CONTINUE già gestiti in ControlFlow
✅ Nessuna modifica a runtime necessaria
✅ Solo 3 file da modificare:
   - grammar/pesm.peg (aggiungi regola)
   - src/Parser/AST/Nodes.php (aggiungi WhileNode)
   - Rigenera parser
*/

// ============================================
// 8. CONVERTER GENERATOR
// ============================================

// ConverterGenerator.php gestisce automaticamente WhileStatement
// perché segue lo stesso pattern di IfStatement e ForeachStatement:
// - cond: Expression
// - loopBody: Statement+

// Potrebbe servire special case in ConverterGenerator.php:
/*
if ($rule === 'WhileStatement') {
    $code .= "        \$cond = \$this->convert(\$data['cond']['value'] ?? \$data['cond']);\n";
    $code .= "        \$body = [];\n";
    $code .= "        if (isset(\$data['loopBody'])) {\n";
    $code .= "            foreach (\$data['loopBody'] as \$stmt) {\n";
    $code .= "                \$node = isset(\$stmt['node']) ? \$stmt['node'] : \$stmt;\n";
    $code .= "                \$body[] = \$this->convert(\$node);\n";
    $code .= "            }\n";
    $code .= "        }\n";
    $code .= "        return new \\PESM\\Parser\\AST\\{$nodeClass}(\$cond, \$body);\n";
    $code .= "    }\n\n";
    return $code;
}
*/
