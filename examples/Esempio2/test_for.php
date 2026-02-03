<?php
require_once '../../vendor/autoload.php';
require_once '../languages/basic/BASICParser.php';

$script = 'SUM = 0
FOR I = 1 TO 10
SUM = SUM + I
END
PRINT SUM';

$parser = new BASIC\GeneratedParser();
$result = $parser->match_Program($script);
echo "Match: " . ($result ? "OK" : "FAIL") . "\n";
if ($result) {
    echo "Statements: " . count($result['statements']) . "\n";
    foreach ($result['statements'] as $i => $stmt) {
        $rule = $stmt['_matchrule'] ?? 'unknown';
        echo "  [$i] $rule\n";
        if ($rule === 'ForStmt' && isset($stmt['loopBody'])) {
            echo "      loopBody: " . count($stmt['loopBody']) . " statements\n";
        }
    }
}
