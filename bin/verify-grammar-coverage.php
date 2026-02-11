#!/usr/bin/env php
<?php
/**
 * Verifica che la grammatica PESM copra tutti i nodi AST definiti
 */

// Nodi AST definiti
$astNodes = [
    'LiteralNode' => ['grammar' => 'String | Number', 'found' => false],
    'VariableNode' => ['grammar' => 'Identifier', 'found' => false],
    'AssignmentNode' => ['grammar' => 'Assignment', 'found' => false],
    'BinaryOpNode' => ['grammar' => 'Logical | Comparison | Additive | Multiplicative', 'found' => false],
    'UnaryOpNode' => ['grammar' => 'Unary', 'found' => false],
    'ArrayAccessNode' => ['grammar' => 'Postfix (with [])', 'found' => false],
    'PropertyAccessNode' => ['grammar' => 'Postfix (with .)', 'found' => false],
    'ArrayLiteralNode' => ['grammar' => 'ArrayLiteral', 'found' => false],
    'ObjectLiteralNode' => ['grammar' => 'ObjectLiteral', 'found' => false],
    'BlockNode' => ['grammar' => 'Block', 'found' => false],
    'IfNode' => ['grammar' => 'IfStatement', 'found' => false],
    'WhileNode' => ['grammar' => 'WhileStatement', 'found' => false],
    'DoWhileNode' => ['grammar' => 'DoWhileStatement', 'found' => false],
    'RepeatUntilNode' => ['grammar' => 'RepeatUntilStatement', 'found' => false],
    'ForeachNode' => ['grammar' => 'ForeachInStmt | ForeachRangeStmt', 'found' => false],
    'SwitchNode' => ['grammar' => 'SwitchStatement', 'found' => false],
    'BreakNode' => ['grammar' => 'BreakStmt', 'found' => false],
    'ContinueNode' => ['grammar' => 'ContinueStmt', 'found' => false],
    'FunctionDefNode' => ['grammar' => 'FunctionDef', 'found' => false],
    'FunctionCallNode' => ['grammar' => 'IdentifierOrCall (with args)', 'found' => false],
    'ReturnNode' => ['grammar' => 'ReturnStmt', 'found' => false],
    'LabelNode' => ['grammar' => 'LabelStmt', 'found' => false],
    'GotoNode' => ['grammar' => 'GotoStmt', 'found' => false],
    'InterruptSimpleNode' => ['grammar' => 'InterruptSimpleStmt', 'found' => false],
    'InterruptInputNode' => ['grammar' => 'InterruptWithVarStmt', 'found' => false],
    'StructDefNode' => ['grammar' => 'StructDef', 'found' => false],
    'MakeStructNode' => ['grammar' => 'MakeStruct', 'found' => false],
    'RangeNode' => ['grammar' => 'FOREACH x = a TO b (implicit)', 'found' => false],
];

// Leggi grammatica
$grammarFile = __DIR__ . '/../grammar/pesm.peg';
if (!file_exists($grammarFile)) {
    die("❌ Grammar file not found: $grammarFile\n");
}

$grammar = file_get_contents($grammarFile);

// Verifica presenza costrutti
$astNodes['LiteralNode']['found'] = strpos($grammar, 'String:') !== false && strpos($grammar, 'Number:') !== false;
$astNodes['VariableNode']['found'] = strpos($grammar, 'Identifier:') !== false;
$astNodes['AssignmentNode']['found'] = strpos($grammar, 'Assignment:') !== false;
$astNodes['BinaryOpNode']['found'] = strpos($grammar, 'Logical:') !== false && strpos($grammar, 'Additive:') !== false;
$astNodes['UnaryOpNode']['found'] = strpos($grammar, 'Unary:') !== false;
$astNodes['ArrayAccessNode']['found'] = strpos($grammar, 'Postfix:') !== false && strpos($grammar, '"["') !== false;
$astNodes['PropertyAccessNode']['found'] = strpos($grammar, 'Postfix:') !== false && strpos($grammar, '"."') !== false;
$astNodes['ArrayLiteralNode']['found'] = strpos($grammar, 'ArrayLiteral:') !== false;
$astNodes['ObjectLiteralNode']['found'] = strpos($grammar, 'ObjectLiteral:') !== false;
$astNodes['BlockNode']['found'] = strpos($grammar, 'Block:') !== false;
$astNodes['IfNode']['found'] = strpos($grammar, 'IfStatement:') !== false;
$astNodes['WhileNode']['found'] = strpos($grammar, 'WhileStatement:') !== false;
$astNodes['DoWhileNode']['found'] = strpos($grammar, 'DoWhileStatement:') !== false;
$astNodes['RepeatUntilNode']['found'] = strpos($grammar, 'RepeatUntilStatement:') !== false;
$astNodes['ForeachNode']['found'] = strpos($grammar, 'ForeachInStmt:') !== false && strpos($grammar, 'ForeachRangeStmt:') !== false;
$astNodes['SwitchNode']['found'] = strpos($grammar, 'SwitchStatement:') !== false;
$astNodes['BreakNode']['found'] = strpos($grammar, 'BreakStmt:') !== false;
$astNodes['ContinueNode']['found'] = strpos($grammar, 'ContinueStmt:') !== false;
$astNodes['FunctionDefNode']['found'] = strpos($grammar, 'FunctionDef:') !== false;
$astNodes['FunctionCallNode']['found'] = strpos($grammar, 'IdentifierOrCall:') !== false;
$astNodes['ReturnNode']['found'] = strpos($grammar, 'ReturnStmt:') !== false;
$astNodes['LabelNode']['found'] = strpos($grammar, 'LabelStmt:') !== false;
$astNodes['GotoNode']['found'] = strpos($grammar, 'GotoStmt:') !== false;
$astNodes['InterruptSimpleNode']['found'] = strpos($grammar, 'InterruptSimpleStmt:') !== false;
$astNodes['InterruptInputNode']['found'] = strpos($grammar, 'InterruptWithVarStmt:') !== false;
$astNodes['StructDefNode']['found'] = strpos($grammar, 'StructDef:') !== false;
$astNodes['MakeStructNode']['found'] = strpos($grammar, 'MakeStruct:') !== false;
$astNodes['RangeNode']['found'] = strpos($grammar, 'ForeachRangeStmt:') !== false; // Range implicito in FOREACH

// Report
echo "\n";
echo "═══════════════════════════════════════════════════════════\n";
echo "  PESM Grammar Coverage Verification\n";
echo "═══════════════════════════════════════════════════════════\n\n";

$covered = 0;
$total = count($astNodes);

foreach ($astNodes as $node => $info) {
    $status = $info['found'] ? '✓' : '✗';
    $color = $info['found'] ? "\033[32m" : "\033[31m";
    $reset = "\033[0m";
    
    if ($info['found']) $covered++;
    
    printf("%s%s%s %-25s → %s\n", $color, $status, $reset, $node, $info['grammar']);
}

echo "\n";
echo "───────────────────────────────────────────────────────────\n";
printf("Coverage: %d/%d (%.1f%%)\n", $covered, $total, ($covered / $total) * 100);
echo "───────────────────────────────────────────────────────────\n\n";

if ($covered === $total) {
    echo "✓ \033[32mAll AST nodes are covered by the grammar!\033[0m\n\n";
    exit(0);
} else {
    echo "✗ \033[31mSome AST nodes are missing from the grammar!\033[0m\n\n";
    exit(1);
}
