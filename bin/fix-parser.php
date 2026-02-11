#!/usr/bin/env php
<?php
error_reporting(E_ERROR | E_PARSE);

$file = __DIR__ . '/../src/Parser/GeneratedParser.php';
$content = file_get_contents($file);

// Rimuovi warnings
$lines = explode("\n", $content);
$clean = [];
$inCode = false;

foreach ($lines as $line) {
    if (preg_match('/^protected \$match_/', $line)) {
        $inCode = true;
    }
    if ($inCode && !preg_match('/^(PHP |Deprecated:|Warning:)/', $line)) {
        $clean[] = $line;
    }
}

// Rimuovi commenti finali
$output = [];
foreach ($clean as $line) {
    if (preg_match('/^#node\(|^(IfStatement|ForeachStatement|MessageStmt|AcceptStmt|RefuseStmt|String):/', $line)) {
        break;
    }
    $output[] = $line;
}

// Scrivi file pulito
file_put_contents($file, implode("\n", [
    '<?php',
    'namespace PESM\Parser;',
    'class GeneratedParser extends \hafriedlander\Peg\Parser\Packrat {',
    ...array_slice($output, 0, -1),
    '}'
]));

echo "✓ Parser fixed\n";
