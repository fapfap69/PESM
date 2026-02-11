#!/usr/bin/env php
<?php
require_once __DIR__ . '/../../../vendor/autoload.php';
require_once __DIR__ . '/PYTHONLIKEParser.php';
require_once __DIR__ . '/../../../src/Parser/ASTBuilder.php';
require_once __DIR__ . '/../../../src/Parser/ArrayToNodeConverter.php';
require_once __DIR__ . '/../../../src/Parser/AST/Node.php';
require_once __DIR__ . '/../../../src/Parser/AST/Nodes.php';
require_once __DIR__ . '/../../../src/Parser/AST/AdditionalNodes.php';
require_once __DIR__ . '/../../../src/Bytecode/Compiler.php';
require_once __DIR__ . '/../../../src/Bytecode/VM.php';

use PYTHONLIKE\PYTHONLIKEParser;
use PESM\Parser\ASTBuilder;
use PESM\Parser\ArrayToNodeConverter;
use PESM\Bytecode\Compiler;
use PESM\Bytecode\VM;

$code = 'x = 5
y = 10
sum = x + y
print(sum)';

echo "PYTHON-LIKE test (5 + 10 = 15):\n";
echo "=================================\n\n";

$parser = new PYTHONLIKEParser($code);
$parseTree = $parser->match_Program();

if (!$parseTree) {
    die("❌ Parse failed\n");
}
echo "✅ Parse successful\n";

$builder = new ASTBuilder();
$astArray = $builder->build($parseTree);
echo "✅ AST built\n";

$converter = new ArrayToNodeConverter();
$ast = $converter->convert($astArray);
echo "✅ AST converted\n";

$compiler = new Compiler();
$bytecode = $compiler->compile($ast);
echo "✅ Bytecode compiled\n";

$vm = new VM();
$result = $vm->execute($bytecode);

if ($result->status === 'interrupted') {
    echo "OUTPUT: {$result->actionData}\n";
}

echo "\nStatus: {$result->status}\n";
echo "sum = " . ($result->variables['sum'] ?? 'undefined') . "\n";

if (isset($result->variables['sum']) && $result->variables['sum'] == 15) {
    echo "\n✅ PYTHON-LIKE test passed: sum = 15\n";
} else {
    echo "\n❌ PYTHON-LIKE test failed\n";
}
