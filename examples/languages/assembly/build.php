#!/usr/bin/env php
<?php
require_once __DIR__ . '/../../../vendor/autoload.php';
use Smuuf\Peg\Builder;
use PESM\Parser\GrammarAnalyzer;
use PESM\Parser\ConverterGenerator;

echo "Building Assembly parser...\n";

$builder = new Builder();
$parser = $builder->build(file_get_contents(__DIR__ . '/asm.peg'));
file_put_contents(__DIR__ . '/AsmParser.php', "<?php\n\nnamespace ASM;\n\n" . $parser);

$analyzer = new GrammarAnalyzer();
$metadata = $analyzer->analyze(__DIR__ . '/asm.peg');
$generator = new ConverterGenerator($metadata);
$converter = $generator->generate();
file_put_contents(__DIR__ . '/AsmConverter.php', str_replace('namespace PESM\\Parser;', 'namespace ASM;', $converter));

echo "✅ Assembly parser generated!\n";
