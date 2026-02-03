<?php
require_once __DIR__ . '/../../vendor/autoload.php';
require_once __DIR__ . '/../languages/basic/BASICParser.php';
require_once __DIR__ . '/../languages/basic/BASICConverter.php';
require_once __DIR__ . '/../../src/Runtime/Interpreter.php';
require_once __DIR__ . '/../../src/Parser/AST/Node.php';
require_once __DIR__ . '/../../src/Parser/AST/Nodes.php';

$script = 'PRINT "A"
GOTO END
PRINT "B"
END:
PRINT "C"';

$parser = new BASIC\GeneratedParser($script);
$parseResult = $parser->match_Program();
$converter = new BASIC\GeneratedConverter();
$ast = $converter->convert($parseResult);

$interpreter = new PESM\Runtime\Interpreter();
$result = $interpreter->execute($ast);

$prints = [];
while ($result->status === 'interrupted') {
    $prints[] = $result->actionData;
    $result = $interpreter->execute($ast, $result->variables, $result->resumeFrom);
}

echo "Prints: " . implode(", ", $prints) . "\n";
echo "Expected: A, C\n";
