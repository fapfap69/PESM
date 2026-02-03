<?php
require_once __DIR__ . '/../../vendor/autoload.php';
require_once __DIR__ . '/../languages/basic/BASICParser.php';
require_once __DIR__ . '/../languages/basic/BASICConverter.php';
require_once __DIR__ . '/../../src/Runtime/Interpreter.php';
require_once __DIR__ . '/../../src/Parser/AST/Node.php';
require_once __DIR__ . '/../../src/Parser/AST/Nodes.php';

$script = 'LET N = 10

START:
IF N = 0 THEN GOTO END
PRINT N
LET N = N - 1
GOTO START

END:
PRINT "Liftoff!"';

$parser = new BASIC\GeneratedParser($script);
$parseResult = $parser->match_Program();

if (!$parseResult) {
    echo "Parse FAILED\n";
    exit(1);
}

echo "Parse OK - statements: " . count($parseResult['statements']) . "\n";
foreach ($parseResult['statements'] as $i => $stmt) {
    echo "  [$i] " . ($stmt['_matchrule'] ?? '?') . " - " . substr($stmt['text'], 0, 30) . "\n";
}
echo "\n";

$converter = new BASIC\GeneratedConverter();
$ast = $converter->convert($parseResult);

echo "AST statements: " . count($ast->statements) . "\n";
foreach ($ast->statements as $i => $stmt) {
    echo "  [$i] " . get_class($stmt);
    if ($stmt instanceof PESM\Parser\AST\LabelNode) {
        echo " name='" . $stmt->name . "'";
    } elseif ($stmt instanceof PESM\Parser\AST\GotoNode) {
        echo " label='" . $stmt->label . "'";
    }
    echo "\n";
}

$interpreter = new PESM\Runtime\Interpreter();
$result = $interpreter->execute($ast);

$prints = [];
$maxIterations = 100;
$iterations = 0;
while ($result->status === 'interrupted' && $iterations < $maxIterations) {
    $prints[] = $result->actionData;
    $result = $interpreter->execute($ast, $result->variables, $result->resumeFrom);
    $iterations++;
}

if ($iterations >= $maxIterations) {
    echo "ERROR: Too many iterations (loop infinito?)\n";
}

echo "Prints: " . implode(", ", $prints) . "\n";
echo "N finale = " . ($result->variables['N'] ?? '?') . "\n";
echo "Expected: 10, 9, 8, 7, 6, 5, 4, 3, 2, 1, Liftoff! - N finale = 0\n";
