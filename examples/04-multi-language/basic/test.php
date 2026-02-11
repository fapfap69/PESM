#!/usr/bin/env php
<?php
require_once __DIR__ . '/../../../vendor/autoload.php';
require_once __DIR__ . '/BASICParser.php';
require_once __DIR__ . '/../../../src/Parser/ASTBuilder.php';
require_once __DIR__ . '/../../../src/Parser/ArrayToNodeConverter.php';
require_once __DIR__ . '/../../../src/Parser/AST/Node.php';
require_once __DIR__ . '/../../../src/Parser/AST/Nodes.php';
require_once __DIR__ . '/../../../src/Parser/AST/AdditionalNodes.php';
require_once __DIR__ . '/../../../src/Bytecode/Compiler.php';
require_once __DIR__ . '/../../../src/Bytecode/VM.php';

use BASIC\BASICParser;
use PESM\Parser\ASTBuilder;
use PESM\Parser\ArrayToNodeConverter;
use PESM\Bytecode\Compiler;
use PESM\Bytecode\VM;

$code = 'LET SUM = 0
FOR I = 1 TO 10
  LET SUM = SUM + I
NEXT
PRINT SUM';

echo "BASIC Code:\n$code\n\n";

// Parse
$parser = new BASICParser($code);
$parseTree = $parser->match_Program();

if (!$parseTree) {
    die("Parse failed\n");
}
echo "✅ Parse tree generated\n";

// Build AST
$builder = new ASTBuilder();
$astArray = $builder->build($parseTree);
echo "✅ AST built\n";

// Convert to Node objects
$converter = new ArrayToNodeConverter();
$ast = $converter->convert($astArray);
echo "✅ AST converted to Nodes\n";

// Compile
$compiler = new Compiler();
$bytecode = $compiler->compile($ast);
echo "✅ Bytecode compiled\n";

// Execute
$vm = new VM();
$result = $vm->execute($bytecode);

echo "Status: {$result->status}\n";
if (!empty($result->variables)) {
    echo "Variables: ";
    foreach ($result->variables as $name => $value) {
        echo "$name=$value ";
    }
    echo "\n";
}

if (isset($result->variables['SUM']) && $result->variables['SUM'] == 55) {
    echo "✅ BASIC test passed: SUM = 55\n";
} else {
    echo "❌ BASIC test failed\n";
}
