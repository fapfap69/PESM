<?php
/**
 * ANALISI: Implementazione Array Literals in PESM
 * 
 * Obiettivo: Supportare sintassi [1, 2, 3] e {"key": "value"}
 */

// ============================================
// SINTASSI DESIDERATA
// ============================================

$desired_syntax = '
// Array numerici
numbers = [1, 2, 3, 4, 5]
empty = []

// Array misti
mixed = [1, "hello", 3.14]

// Array annidati
matrix = [[1, 2], [3, 4]]

// Accesso elementi
first = numbers[0]
nested = matrix[1][0]

// Oggetti (associativi)
user = {"name": "Mario", "age": 30}
name = user["name"]
';

// ============================================
// DIFFICOLTÀ PRINCIPALI
// ============================================

/*
1. GRAMMATICA PEG
   - Conflitto con operatore < in confronti
   - Parsing ricorsivo per array annidati
   - Distinzione tra array e oggetti

2. PARSER
   - Gestione virgole e separatori
   - Array vuoti []
   - Trailing comma [1, 2, 3,]

3. AST
   - Nuovo nodo ArrayLiteralNode
   - Nuovo nodo ObjectLiteralNode
   - Gestione nesting

4. RUNTIME
   - Conversione a array PHP
   - Accesso elementi con []
   - Modifica elementi

5. CONVERTER
   - Mapping parse result → AST
   - Gestione elementi multipli
*/

// ============================================
// SOLUZIONE 1: ARRAY LITERALS
// ============================================

// GRAMMATICA (pesm.peg)
/*
#node(ArrayLiteralNode)
ArrayLiteral: "[" _ elements:ArrayElements? _ "]"

ArrayElements: elem:Expression ( _ "," _ elem:Expression )*
  function elem(&$res, $sub) {
    if (!isset($res['elements'])) $res['elements'] = [];
    $res['elements'][] = $sub;
  }

// Aggiungere a Primary:
Primary: val:ArrayLiteral | val:FunctionCall | val:String | ...
*/

// AST NODE
namespace PESM\Parser\AST;

class ArrayLiteralNode extends Node {
    public function __construct(
        public array $elements = []
    ) {
        parent::__construct();
    }
    
    public function execute($context, $flow, $commands, $pc = null) {
        $result = [];
        foreach ($this->elements as $elem) {
            $result[] = $elem->execute($context, $flow, $commands, $pc);
        }
        return $result;
    }
    
    public function getChildren(): array {
        return $this->elements;
    }
}

// CONVERTER GENERATOR
/*
if ($rule === 'ArrayLiteral') {
    $code .= "        \$elements = [];\n";
    $code .= "        if (isset(\$data['elements'])) {\n";
    $code .= "            foreach (\$data['elements'] as \$elem) {\n";
    $code .= "                \$elements[] = \$this->convert(\$elem);\n";
    $code .= "            }\n";
    $code .= "        }\n";
    $code .= "        return new \\PESM\\Parser\\AST\\{$nodeClass}(\$elements);\n";
    $code .= "    }\n\n";
    return $code;
}
*/

// ============================================
// SOLUZIONE 2: ARRAY ACCESS (già supportato!)
// ============================================

// ArrayAccessNode già esiste in Nodes.php
// Supporta: arr[0], matrix[1][2]

// Test
$test_access = '
items = dummy  // Passato da PHP
first = items[0]
second = items[1]
';

// ============================================
// SOLUZIONE 3: OBJECT LITERALS (più complesso)
// ============================================

// GRAMMATICA
/*
#node(ObjectLiteralNode)
ObjectLiteral: "{" _ pairs:ObjectPairs? _ "}"

ObjectPairs: pair:ObjectPair ( _ "," _ pair:ObjectPair )*
  function pair(&$res, $sub) {
    if (!isset($res['pairs'])) $res['pairs'] = [];
    $res['pairs'][] = $sub;
  }

ObjectPair: key:String _ ":" _ value:Expression
*/

// AST NODE
class ObjectLiteralNode extends Node {
    public function __construct(
        public array $pairs = []  // [['key' => Node, 'value' => Node], ...]
    ) {
        parent::__construct();
    }
    
    public function execute($context, $flow, $commands, $pc = null) {
        $result = [];
        foreach ($this->pairs as $pair) {
            $key = $pair['key']->execute($context, $flow, $commands, $pc);
            $value = $pair['value']->execute($context, $flow, $commands, $pc);
            $result[$key] = $value;
        }
        return $result;
    }
}

// ============================================
// PROBLEMI SPECIFICI
// ============================================

/*
PROBLEMA 1: Conflitto [ con confronti
  Soluzione: [ ha priorità più alta, parsing greedy

PROBLEMA 2: Virgole in array vs argomenti funzione
  Soluzione: Contesti diversi (ArrayElements vs ArgumentList)

PROBLEMA 3: Array vuoti []
  Soluzione: ArrayElements? (opzionale)

PROBLEMA 4: Trailing comma [1, 2,]
  Soluzione: Permettere o vietare? Meglio vietare per semplicità

PROBLEMA 5: Array annidati [[1, 2], [3, 4]]
  Soluzione: Ricorsione automatica (Expression include ArrayLiteral)

PROBLEMA 6: Accesso con variabile arr[i]
  Soluzione: Già supportato! ArrayAccessNode accetta Expression come index
*/

// ============================================
// IMPLEMENTAZIONE MINIMA
// ============================================

/*
STEP 1: Aggiungi ArrayLiteral alla grammatica
STEP 2: Aggiungi ArrayLiteralNode a Nodes.php
STEP 3: Aggiungi special case in ConverterGenerator
STEP 4: Aggiungi ArrayLiteral a Primary
STEP 5: Rigenera parser

COMPLESSITÀ: BASSA
- Grammatica: 5 righe
- AST Node: 20 righe
- Converter: 10 righe
- Test: 5 minuti

BENEFICI:
✅ Sintassi naturale [1, 2, 3]
✅ Array annidati automatici
✅ Accesso già funzionante
✅ Compatibile con tutto il resto
*/

// ============================================
// ESEMPIO COMPLETO POST-IMPLEMENTAZIONE
// ============================================

$after_implementation = '
// Array literals
numbers = [1, 2, 3, 4, 5]
names = ["Mario", "Luigi", "Peach"]
mixed = [1, "hello", 3.14]

// Array annidati
matrix = [[1, 2], [3, 4], [5, 6]]

// Accesso
first = numbers[0]
name = names[1]
cell = matrix[2][1]

// In loop
FOREACH i = 0 TO 4
  MESSAGE numbers[i]
END

// In funzioni
FUNCTION sum(arr)
  total = 0
  FOREACH i = 0 TO SIZE(arr) - 1
    total = total + arr[i]
  END
  RETURN total
END

result = sum([10, 20, 30])
';

// ============================================
// ALTERNATIVE
// ============================================

/*
ALTERNATIVA 1: Solo array da PHP
  Pro: Nessuna modifica necessaria
  Contro: Meno flessibile, dipendenza da PHP

ALTERNATIVA 2: Funzione ARRAY()
  Sintassi: arr = ARRAY(1, 2, 3)
  Pro: Facile da implementare (solo funzione built-in)
  Contro: Sintassi meno naturale

ALTERNATIVA 3: Sintassi speciale
  Sintassi: arr = 1, 2, 3 (senza [])
  Pro: Semplice
  Contro: Ambiguo, confusione con argomenti
*/

// ============================================
// RACCOMANDAZIONE
// ============================================

/*
IMPLEMENTA ARRAY LITERALS [1, 2, 3]

MOTIVI:
✅ Sintassi standard e intuitiva
✅ Complessità bassa (1-2 ore lavoro)
✅ Nessun breaking change
✅ ArrayAccess già funziona
✅ Migliora usabilità linguaggio
✅ Necessario per linguaggio completo

NON IMPLEMENTARE (per ora):
❌ Object literals {"key": "value"}
   - Più complesso
   - Meno prioritario
   - Può usare array associativi da PHP

PRIORITÀ: ALTA
*/

// ============================================
// STIMA IMPLEMENTAZIONE
// ============================================

/*
TEMPO STIMATO: 1-2 ore

BREAKDOWN:
- Grammatica: 15 min
- AST Node: 15 min
- Converter: 15 min
- Rigenera parser: 1 min
- Test: 30 min
- Debug: 30 min

RISCHIO: BASSO
- Pattern già usato (simile a ArgumentList)
- Nessuna modifica runtime necessaria
- ArrayAccess già implementato
*/

echo "ANALISI ARRAY LITERALS\n";
echo "======================\n\n";
echo "DIFFICOLTÀ: BASSA\n";
echo "TEMPO: 1-2 ore\n";
echo "PRIORITÀ: ALTA\n";
echo "RISCHIO: BASSO\n\n";
echo "RACCOMANDAZIONE: IMPLEMENTARE\n";
