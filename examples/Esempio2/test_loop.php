<?php
require_once __DIR__ . '/../../vendor/autoload.php';
require_once __DIR__ . '/../languages/basic/BASICParser.php';
require_once __DIR__ . '/../languages/basic/BASICConverter.php';
require_once __DIR__ . '/../../src/Runtime/Interpreter.php';
require_once __DIR__ . '/../../src/Parser/AST/Node.php';
require_once __DIR__ . '/../../src/Parser/AST/Nodes.php';

$script = 'N = 3
START:
PRINT N
N = N - 1
IF N = 0 THEN GOTO END
GOTO START
END:
PRINT "Done"';

$parser = new BASIC\GeneratedParser($script);
$parseResult = $parser->match_Program();
$converter = new BASIC\GeneratedConverter();
$ast = $converter->convert($parseResult);

$interpreter = new PESM\Runtime\Interpreter();
$result = $interpreter->execute($ast);

$prints = [];
$maxIter = 20;
$iter = 0;
while ($result->status === 'interrupted' && $iter < $maxIter) {
    $prints[] = $result->actionData;
    $result = $interpreter->execute($ast, $result->variables, $result->resumeFrom);
    $iter++;
}

echo "Prints: " . implode(", ", $prints) . "\n";
echo "N = " . ($result->variables['N'] ?? '?') . "\n";
echo "Expected: 3, 2, 1, Done - N = 0\n";
