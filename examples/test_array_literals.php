<?php
require_once __DIR__ . '/../src/ScriptEngine.php';

$engine = new PESM\ScriptEngine();

echo "=== TEST ARRAY LITERALS ===\n\n";

echo "1. Array vuoto:\n";
$r1 = $engine->execute('empty = []');
echo "  empty: " . json_encode($r1['variables']['empty']) . "\n";
echo "  tipo: " . gettype($r1['variables']['empty']) . "\n\n";

echo "2. Array numeri:\n";
$r2 = $engine->execute('numbers = [1, 2, 3, 4, 5]');
echo "  numbers: " . json_encode($r2['variables']['numbers']) . "\n\n";

echo "3. Array stringhe:\n";
$r3 = $engine->execute('names = ["Mario", "Luigi", "Peach"]');
echo "  names: " . json_encode($r3['variables']['names']) . "\n\n";

echo "4. Array misto:\n";
$r4 = $engine->execute('mixed = [1, "hello", 3.14]');
echo "  mixed: " . json_encode($r4['variables']['mixed']) . "\n\n";

echo "5. Array annidato:\n";
$r5 = $engine->execute('matrix = [[1, 2], [3, 4], [5, 6]]');
echo "  matrix: " . json_encode($r5['variables']['matrix']) . "\n\n";

echo "6. Accesso elementi:\n";
$r6 = $engine->execute('
arr = [10, 20, 30]
first = arr[0]
second = arr[1]
third = arr[2]
');
echo "  first: " . $r6['variables']['first'] . "\n";
echo "  second: " . $r6['variables']['second'] . "\n";
echo "  third: " . $r6['variables']['third'] . "\n\n";

echo "7. Accesso array annidato:\n";
$r7 = $engine->execute('
matrix = [[1, 2], [3, 4]]
cell = matrix[1][0]
');
echo "  cell (matrix[1][0]): " . $r7['variables']['cell'] . "\n\n";

echo "8. Array in loop:\n";
$r8 = $engine->execute('
items = [5, 10, 15]
sum = 0
i = 0
WHILE i < 3
  sum = sum + items[i]
  i = i + 1
END
');
echo "  sum: " . $r8['variables']['sum'] . " (atteso: 30)\n\n";

echo "9. Array con espressioni:\n";
$r9 = $engine->execute('
x = 10
arr = [x, x + 5, x * 2]
');
echo "  arr: " . json_encode($r9['variables']['arr']) . " (atteso: [10,15,20])\n\n";

echo "10. Array con funzioni:\n";
$r10 = $engine->execute('
arr = [ABS(-5), SQRT(16), ROUND(3.7)]
');
echo "  arr: " . json_encode($r10['variables']['arr']) . " (atteso: [5,4,4])\n\n";

echo "11. SIZE di array literal:\n";
$r11 = $engine->execute('
len = SIZE([1, 2, 3, 4, 5])
');
echo "  len: " . $r11['variables']['len'] . " (atteso: 5)\n\n";

echo "=== TUTTI I TEST COMPLETATI ===\n";
