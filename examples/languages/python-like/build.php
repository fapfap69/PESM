#!/usr/bin/env php
<?php
require_once __DIR__ . '/../../../vendor/autoload.php';
use Smuuf\Peg\Builder;
use PESM\Parser\GrammarAnalyzer;
use PESM\Parser\ConverterGenerator;

echo "Building Python-like parser...\n";

$builder = new Builder();
$parser = $builder->build(file_get_contents(__DIR__ . '/python.peg'));
file_put_contents(__DIR__ . '/PythonParser.php', "<?php\n\nnamespace PYTHON;\n\n" . $parser);

$analyzer = new GrammarAnalyzer();
$metadata = $analyzer->analyze(__DIR__ . '/python.peg');
$generator = new ConverterGenerator($metadata);
$converter = $generator->generate();
file_put_contents(__DIR__ . '/PythonConverter.php', str_replace('namespace PESM\\Parser;', 'namespace PYTHON;', $converter));

echo "✅ Python-like parser generated!\n";
