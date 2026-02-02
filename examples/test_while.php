<?php
require_once __DIR__ . '/../src/ScriptEngine.php';

$engine = new PESM\ScriptEngine();

echo "=== TEST 1: WHILE semplice ===\n";
$script1 = '
counter = 0
WHILE counter < 3
  counter = counter + 1
END
';

$result = $engine->execute($script1);
echo "Status: " . $result['status'] . "\n";
echo "Counter: " . $result['variables']['counter'] . " (atteso: 3)\n\n";

echo "=== TEST 2: WHILE con condizione falsa ===\n";
$script2 = '
x = 10
WHILE x < 5
  x = x + 1
END
';

$result2 = $engine->execute($script2);
echo "Status: " . $result2['status'] . "\n";
echo "x: " . $result2['variables']['x'] . " (atteso: 10)\n\n";

echo "=== TEST 3: WHILE con MESSAGE ===\n";
$script3 = '
count = 0
WHILE count < 2
  MESSAGE "Iterazione"
  count = count + 1
END
';

$r = $engine->execute($script3);
echo "Prima esecuzione:\n";
echo "  Status: " . $r['status'] . "\n";
echo "  count: " . $r['variables']['count'] . "\n";

$iterations = 0;
while ($r['status'] === 'interrupted' && $iterations < 10) {
    $iterations++;
    echo "\nResume $iterations:\n";
    $r = $engine->resume($script3, $r['variables'], $r['resumeFrom']);
    echo "  Status: " . $r['status'] . "\n";
    echo "  count: " . $r['variables']['count'] . "\n";
}

echo "\n=== TEST 4: WHILE con ACCEPT ===\n";
$script4 = '
i = 0
WHILE i < 3
  i = i + 1
  IF i == 2
    ACCEPT "done"
  END
END
';

$r4 = $engine->execute($script4);
echo "Status: " . $r4['status'] . "\n";
echo "Action: " . ($r4['action'] ?? 'none') . "\n";
echo "i: " . $r4['variables']['i'] . "\n";
