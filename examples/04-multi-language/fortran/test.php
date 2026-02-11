#!/usr/bin/env php
<?php
require_once __DIR__ . '/../../../vendor/autoload.php';
require_once __DIR__ . '/FORTRANParser.php';
require_once __DIR__ . '/../../../src/Parser/ASTBuilder.php';
require_once __DIR__ . '/../../../src/Parser/ArrayToNodeConverter.php';
require_once __DIR__ . '/../../../src/Parser/AST/Node.php';
require_once __DIR__ . '/../../../src/Parser/AST/Nodes.php';
require_once __DIR__ . '/../../../src/Parser/AST/AdditionalNodes.php';
require_once __DIR__ . '/../../../src/Bytecode/Compiler.php';
require_once __DIR__ . '/../../../src/Bytecode/VM.php';
require_once __DIR__ . '/../../../src/Runtime/GlobalContext.php';
require_once __DIR__ . '/../../../src/Runtime/Commands.php';

use FORTRAN\FORTRANParser;
use PESM\Parser\ASTBuilder;
use PESM\Parser\ArrayToNodeConverter;
use PESM\Bytecode\Compiler;
use PESM\Bytecode\VM;
use PESM\Runtime\GlobalContext;
use PESM\Runtime\Commands;

$code = '      N = 5
      RESULT = 1
      I = 1

10    IF (I > N) GOTO 20
      RESULT = RESULT * I
      I = I + 1
      GOTO 10

20    MESSAGE RESULT';

echo "FORTRAN factorial test (5! = 120):\n";
echo "===================================\n\n";

$parser = new FORTRANParser($code);
$parseTree = $parser->match_Program();

if (!$parseTree) {
    die("❌ Parse failed\n");
}
echo "✅ Parse tree generated\n";

$builder = new ASTBuilder();
$astArray = $builder->build($parseTree);
echo "✅ AST built\n";

$converter = new ArrayToNodeConverter();
$ast = $converter->convert($astArray);
echo "✅ AST converted to Nodes\n";

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
echo "RESULT = " . ($result->variables['RESULT'] ?? 'undefined') . "\n";

if (isset($result->variables['RESULT']) && $result->variables['RESULT'] == 120) {
    echo "\n✅ FORTRAN test passed: 5! = 120\n";
} else {
    echo "\n❌ FORTRAN test failed\n";
}
