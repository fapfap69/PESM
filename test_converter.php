<?php
require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/src/Parser/GeneratedParser.php';
require_once __DIR__ . '/src/Parser/GeneratedConverter.php';
require_once __DIR__ . '/src/Parser/AST/Node.php';
require_once __DIR__ . '/src/Parser/AST/ProgramNode.php';
require_once __DIR__ . '/src/Parser/AST/Nodes.php';

$parser = new PESM\Parser\GeneratedParser('x=42');
$result = $parser->match_Program();

echo "Parse result:\n";
echo json_encode($result, JSON_PRETTY_PRINT) . "\n\n";

$converter = new PESM\Parser\GeneratedConverter();
try {
    $ast = $converter->convert($result);
    echo "Success!\n";
    var_dump($ast);
} catch (Exception $e) {
    echo "Error: " . $e->getMessage() . "\n";
    echo $e->getTraceAsString();
}
