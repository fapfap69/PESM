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
END
PRINT SUM";

$parser = new BASIC\GeneratedParser($script);
$parseResult = $parser->match_Program();

$converter = new BASIC\GeneratedConverter();

$ast = $converter->convert($parseResult);
echo "AST: " . get_class($ast) . "\n";
echo "AST statements: " . count($ast->statements) . "\n";
foreach ($ast->statements as $i => $stmt) {
    echo "  [$i] " . get_class($stmt);
    if ($stmt instanceof PESM\Parser\AST\VariableNode) {
        echo " name=" . $stmt->name;
    }
    echo "\n";
}

$interpreter = new PESM\Runtime\Interpreter();
$result = $interpreter->execute($ast);

while ($result->status === 'interrupted') {
    echo "Interrupt: " . ($result->action ?? '?') . " = " . json_encode($result->actionData) . "\n";
    $result = $interpreter->execute($ast, $result->variables, $result->resumeFrom);
}

echo "\nStatus: " . $result->status . "\n";
echo "SUM = " . ($result->variables['SUM'] ?? '?') . "\n";
echo "I = " . ($result->variables['I'] ?? '?') . "\n";
echo "Expected: SUM = 55, I = 10\n";
