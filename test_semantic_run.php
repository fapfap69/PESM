<?php
require 'vendor/autoload.php';

$compiler = new \hafriedlander\Peg\Compiler();
$grammar = file_get_contents('test_semantic.peg');
$code = $compiler->compile($grammar);

$wrapped = "<?php\nclass TestParser extends \\hafriedlander\\Peg\\Parser\\Packrat {\n" . $code . "\n}\n";
file_put_contents('TestParser.php', $wrapped);

require 'TestParser.php';

$parser = new TestParser('abc def');
$result = $parser->match_TestRule();
echo json_encode($result, JSON_PRETTY_PRINT);
