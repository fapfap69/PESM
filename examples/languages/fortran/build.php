#!/usr/bin/env php
<?php
require_once __DIR__ . '/../../../vendor/autoload.php';
use Smuuf\Peg\Builder;
use PESM\Parser\GrammarAnalyzer;
use PESM\Parser\ConverterGenerator;

echo "Building FORTRAN parser...\n";

$builder = new Builder();
$parser = $builder->build(file_get_contents(__DIR__ . '/fortran.peg'));
file_put_contents(__DIR__ . '/FortranParser.php', "<?php\n\nnamespace FORTRAN;\n\n" . $parser);

$analyzer = new GrammarAnalyzer();
$metadata = $analyzer->analyze(__DIR__ . '/fortran.peg');
$generator = new ConverterGenerator($metadata);
$converter = $generator->generate();
file_put_contents(__DIR__ . '/FortranConverter.php', str_replace('namespace PESM\\Parser;', 'namespace FORTRAN;', $converter));

echo "✅ FORTRAN parser generated!\n";
