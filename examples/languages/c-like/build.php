#!/usr/bin/env php
<?php
require_once __DIR__ . '/../../../vendor/autoload.php';
use Smuuf\Peg\Builder;
use PESM\Parser\GrammarAnalyzer;
use PESM\Parser\ConverterGenerator;

echo "Building C-like parser...\n";

$builder = new Builder();
$parser = $builder->build(file_get_contents(__DIR__ . '/clike.peg'));
file_put_contents(__DIR__ . '/ClikeParser.php', "<?php\n\nnamespace CLIKE;\n\n" . $parser);

$analyzer = new GrammarAnalyzer();
$metadata = $analyzer->analyze(__DIR__ . '/clike.peg');
$generator = new ConverterGenerator($metadata);
$converter = $generator->generate();
file_put_contents(__DIR__ . '/ClikeConverter.php', str_replace('namespace PESM\\Parser;', 'namespace CLIKE;', $converter));

echo "✅ C-like parser generated!\n";
