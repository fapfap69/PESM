#!/usr/bin/env php
<?php
/**
 * Build BASIC Language Parser
 */

require_once __DIR__ . '/../../../vendor/autoload.php';

use Smuuf\Peg\Builder;
use PESM\Parser\GrammarAnalyzer;
use PESM\Parser\ConverterGenerator;

echo "Building BASIC parser...\n";

$grammarFile = __DIR__ . '/basic.peg';
$parserOutput = __DIR__ . '/BasicParser.php';
$converterOutput = __DIR__ . '/BasicConverter.php';

// Generate parser
$builder = new Builder();
$parser = $builder->build(file_get_contents($grammarFile));
file_put_contents($parserOutput, "<?php\n\nnamespace BASIC;\n\n" . $parser);

// Generate converter
$analyzer = new GrammarAnalyzer();
$metadata = $analyzer->analyze($grammarFile);
$generator = new ConverterGenerator($metadata);
$converter = $generator->generate();
file_put_contents($converterOutput, str_replace('namespace PESM\\Parser;', 'namespace BASIC;', $converter));

echo "✅ BASIC parser generated!\n";
echo "   - $parserOutput\n";
echo "   - $converterOutput\n";
