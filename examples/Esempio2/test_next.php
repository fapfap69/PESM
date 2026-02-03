<?php
require_once __DIR__ . '/../../vendor/autoload.php';
require_once __DIR__ . '/../languages/basic/BASICParser.php';
require_once __DIR__ . '/../languages/basic/BASICConverter.php';
require_once __DIR__ . '/../../src/Runtime/Interpreter.php';
require_once __DIR__ . '/../../src/Parser/AST/Node.php';
require_once __DIR__ . '/../../src/Parser/AST/Nodes.php';

$script = "SUM = 0
FOR I = 1 TO 10
SUM = SUM + I
NEXT
PRINT SUM";

$parser = new BASIC\GeneratedParser($script);
$parseResult = $parser->match_Program();

if (!$parseResult) {
    echo "Parse FAILED\n";
    exit(1);
}

$converter = new BASIC\GeneratedConverter();
$ast = $converter->convert($parseResult);

$interpreter = new PESM\Runtime\Interpreter();
$result = $interpreter->execute($ast);

while ($result->status === 'interrupted') {
    echo "PRINT: " . $result->actionData . "\n";
    $result = $interpreter->execute($ast, $result->variables, $result->resumeFrom);
}

echo "SUM = " . ($result->variables['SUM'] ?? '?') . "\n";
echo "I = " . ($result->variables['I'] ?? '?') . "\n";
echo "Expected: SUM = 55, I = 10\n";
