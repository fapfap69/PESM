#!/usr/bin/env php
<?php
require_once __DIR__ . '/../../../vendor/autoload.php';
require_once __DIR__ . '/CLIKEParser.php';
require_once __DIR__ . '/../../../src/Parser/ASTBuilder.php';
require_once __DIR__ . '/../../../src/Parser/ArrayToNodeConverter.php';
require_once __DIR__ . '/../../../src/Parser/AST/Node.php';
require_once __DIR__ . '/../../../src/Parser/AST/Nodes.php';
require_once __DIR__ . '/../../../src/Parser/AST/AdditionalNodes.php';
require_once __DIR__ . '/../../../src/Bytecode/Compiler.php';
require_once __DIR__ . '/../../../src/Bytecode/VM.php';
require_once __DIR__ . '/../../../src/Runtime/GlobalContext.php';
require_once __DIR__ . '/../../../src/Runtime/Commands.php';

use CLIKE\CLIKEParser;
use PESM\Parser\ASTBuilder;
use PESM\Parser\ArrayToNodeConverter;
use PESM\Bytecode\Compiler;
use PESM\Bytecode\VM;
use PESM\Runtime\GlobalContext;
use PESM\Runtime\Commands;

$code = 'n = 5;
result = 1;
i = 1;

while (i <= n) {
    result = result * i;
    i = i + 1;
}

print(result);';

echo "C-LIKE factorial test (5! = 120):\n";
echo "==================================\n\n";

$parser = new CLIKEParser($code);
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
$context = new GlobalContext();
$commands = new Commands();
$result = $vm->execute($bytecode, $context, [], null, null, $commands);

if ($result->status === 'interrupted') {
    echo "OUTPUT: {$result->actionData}\n";
}

echo "\nStatus: {$result->status}\n";
echo "result = " . ($result->variables['result'] ?? 'undefined') . "\n";

if (isset($result->variables['result']) && $result->variables['result'] == 120) {
    echo "\n✅ C-LIKE test passed: 5! = 120\n";
} else {
    echo "\n❌ C-LIKE test failed\n";
}
