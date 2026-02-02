<?php
require_once __DIR__ . '/../src/ScriptEngine.php';

$engine = new PESM\ScriptEngine();

echo "=== TIPI DI VARIABILI PESM ===\n\n";

// ============================================
// 1. NUMERI (Integer e Float)
// ============================================
echo "1. NUMERI:\n";
$script1 = '
intero = 42
decimale = 3.14
negativo = -10
zero = 0
';

$r1 = $engine->execute($script1);
echo "  intero: " . $r1['variables']['intero'] . " (tipo: " . gettype($r1['variables']['intero']) . ")\n";
echo "  decimale: " . $r1['variables']['decimale'] . " (tipo: " . gettype($r1['variables']['decimale']) . ")\n";
echo "  negativo: " . $r1['variables']['negativo'] . " (tipo: " . gettype($r1['variables']['negativo']) . ")\n";
echo "  zero: " . $r1['variables']['zero'] . " (tipo: " . gettype($r1['variables']['zero']) . ")\n\n";

// ============================================
// 2. STRINGHE
// ============================================
echo "2. STRINGHE:\n";
$script2 = '
nome = "Mario"
vuota = ""
frase = "Hello World"
';

$r2 = $engine->execute($script2);
echo "  nome: '" . $r2['variables']['nome'] . "' (tipo: " . gettype($r2['variables']['nome']) . ")\n";
echo "  vuota: '" . $r2['variables']['vuota'] . "' (tipo: " . gettype($r2['variables']['vuota']) . ")\n";
echo "  frase: '" . $r2['variables']['frase'] . "' (tipo: " . gettype($r2['variables']['frase']) . ")\n\n";

// ============================================
// 3. BOOLEANI (impliciti da confronti)
// ============================================
echo "3. BOOLEANI (da confronti):\n";
$script3 = '
x = 10
y = 5
maggiore = x > y
uguale = x == y
';

$r3 = $engine->execute($script3);
echo "  maggiore (10 > 5): " . ($r3['variables']['maggiore'] ? 'true' : 'false') . " (tipo: " . gettype($r3['variables']['maggiore']) . ")\n";
echo "  uguale (10 == 5): " . ($r3['variables']['uguale'] ? 'true' : 'false') . " (tipo: " . gettype($r3['variables']['uguale']) . ")\n\n";

// ============================================
// 4. ARRAY (da range o PHP)
// ============================================
echo "4. ARRAY:\n";

// Da PHP
$r4 = $engine->execute('items = dummy', ['items' => [1, 2, 3, 4, 5]]);
echo "  Da PHP: " . json_encode($r4['variables']['items']) . " (tipo: " . gettype($r4['variables']['items']) . ")\n";

// Da range (interno a FOREACH)
$script4 = '
sum = 0
FOREACH i = 1 TO 5
  sum = sum + i
END
';
$r4b = $engine->execute($script4);
echo "  Range 1 TO 5 (usato in FOREACH): sum = " . $r4b['variables']['sum'] . "\n\n";

// ============================================
// 5. NULL (variabili non definite)
// ============================================
echo "5. NULL (variabili non definite):\n";
$script5 = '
x = 10
';
$r5 = $engine->execute($script5);
$undefined = $r5['variables']['undefined'] ?? null;
echo "  undefined: " . ($undefined === null ? 'null' : $undefined) . " (tipo: " . gettype($undefined) . ")\n\n";

// ============================================
// 6. RISULTATI DI FUNZIONI
// ============================================
echo "6. RISULTATI DI FUNZIONI:\n";
$script6 = '
x = ABS(-42)
nome = UPPER("mario")
len = LENGTH("hello")
';

$r6 = $engine->execute($script6);
echo "  ABS(-42): " . $r6['variables']['x'] . " (tipo: " . gettype($r6['variables']['x']) . ")\n";
echo "  UPPER('mario'): " . $r6['variables']['nome'] . " (tipo: " . gettype($r6['variables']['nome']) . ")\n";
echo "  LENGTH('hello'): " . $r6['variables']['len'] . " (tipo: " . gettype($r6['variables']['len']) . ")\n\n";

// ============================================
// 7. RISULTATI DI ESPRESSIONI
// ============================================
echo "7. RISULTATI DI ESPRESSIONI:\n";
$script7 = '
somma = 10 + 5
prodotto = 3 * 4
modulo = 10 % 3
logico = 1 == 1 AND 2 > 1
';

$r7 = $engine->execute($script7);
echo "  10 + 5: " . $r7['variables']['somma'] . " (tipo: " . gettype($r7['variables']['somma']) . ")\n";
echo "  3 * 4: " . $r7['variables']['prodotto'] . " (tipo: " . gettype($r7['variables']['prodotto']) . ")\n";
echo "  10 % 3: " . $r7['variables']['modulo'] . " (tipo: " . gettype($r7['variables']['modulo']) . ")\n";
echo "  1==1 AND 2>1: " . ($r7['variables']['logico'] ? 'true' : 'false') . " (tipo: " . gettype($r7['variables']['logico']) . ")\n\n";

// ============================================
// RIEPILOGO
// ============================================
echo "=== RIEPILOGO ===\n";
echo "TIPI SUPPORTATI:\n";
echo "  ✅ Integer (numeri interi)\n";
echo "  ✅ Float (numeri decimali)\n";
echo "  ✅ String (stringhe tra doppi apici)\n";
echo "  ✅ Boolean (risultato di confronti/logica)\n";
echo "  ✅ Array (passati da PHP o range in FOREACH)\n";
echo "  ✅ NULL (variabili non definite)\n\n";

echo "CONVERSIONI AUTOMATICHE:\n";
echo "  ✅ Stringhe numeriche → Number (es: '42' → 42)\n";
echo "  ✅ Confronti → Boolean\n";
echo "  ✅ Operazioni aritmetiche → Number\n\n";

echo "LIMITAZIONI:\n";
echo "  ❌ Array literals non supportati (no [1,2,3])\n";
echo "  ❌ Object literals non supportati (no {key:value})\n";
echo "  ❌ Boolean literals non supportati (no true/false)\n";
echo "  ℹ️  Usare variabili PHP o funzioni per tipi complessi\n";
