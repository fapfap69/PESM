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

echo "AST statements:\n";
foreach ($ast->statements as $i => $stmt) {
    echo "  [$i] id=" . $stmt->id . " " . get_class($stmt);
    if ($stmt instanceof PESM\Parser\AST\LabelNode) {
        echo " name=" . $stmt->name;
    }
    echo "\n";
}
echo "\n";

$interpreter = new PESM\Runtime\Interpreter();
$result = $interpreter->execute($ast);

$iteration = 0;
while ($result->status === 'interrupted' && $iteration < 5) {
    echo "Iteration $iteration: PRINT \"" . $result->actionData . "\", resumeFrom=" . $result->resumeFrom . "\n";
    $result = $interpreter->execute($ast, $result->variables, $result->resumeFrom);
    $iteration++;
}

echo "\nFinal N = " . ($result->variables['N'] ?? '?') . "\n";
