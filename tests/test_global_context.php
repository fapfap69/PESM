<?php
/**
 * Test GlobalContext persistence
 */

require_once __DIR__ . '/../src/Runtime/GlobalContext.php';
require_once __DIR__ . '/../src/ScriptEngine.php';

use PESM\Runtime\GlobalContext;
use PESM\ScriptEngine;

echo "=== GlobalContext Persistence Test ===\n\n";

// Test 1: No persistence
echo "Test 1: No persistence (default)\n";
$ctx1 = new GlobalContext();
$ctx1->variables['x'] = 100;
$ctx1->save();  // No-op
echo "ID: " . $ctx1->getId() . "\n";
echo "Mode: " . $ctx1->getMode() . "\n\n";

// Test 2: Eternal persistence
echo "Test 2: Eternal persistence\n";
$ctx2 = new GlobalContext('workflow_123', 'eternal');
$ctx2->variables['status'] = 'running';
$ctx2->variables['counter'] = 42;
$ctx2->structs['Person'] = ['name', 'age'];
$ctx2->save();
echo "Saved to: " . sys_get_temp_dir() . "/pesm_contexts/workflow_123.json\n";
echo "Variables: " . json_encode($ctx2->variables) . "\n\n";

// Test 3: Reload eternal
echo "Test 3: Reload eternal context\n";
$ctx3 = new GlobalContext('workflow_123', 'eternal');
echo "Loaded variables: " . json_encode($ctx3->variables) . "\n";
echo "Loaded structs: " . json_encode($ctx3->structs) . "\n\n";

// Test 4: Session persistence
echo "Test 4: Session persistence\n";
session_start();
$ctx4 = new GlobalContext(null, 'session');
$ctx4->variables['user'] = 'Mario';
$ctx4->save();
echo "ID: " . $ctx4->getId() . "\n";
echo "Variables: " . json_encode($ctx4->variables) . "\n\n";

// Test 5: ScriptEngine with persistence
echo "Test 5: ScriptEngine with eternal persistence\n";
$engine = new ScriptEngine(null, null, null, 'eternal');
$result = $engine->execute('
    workflow_var = "test"
    counter = 999
');
echo "Context ID: " . $engine->getContext()->getId() . "\n";
echo "Variables: " . json_encode($engine->getContext()->variables) . "\n\n";

// Test 6: List all contexts
echo "Test 6: List all persisted contexts\n";
$contexts = GlobalContext::listAll();
foreach ($contexts as $ctx) {
    echo "  - {$ctx['id']} ({$ctx['mode']}): {$ctx['variables']} vars, {$ctx['structs']} structs, age: {$ctx['age']}s\n";
}
echo "\n";

// Test 7: Cleanup
echo "Test 7: Cleanup\n";
$deleted = GlobalContext::cleanup('temp');
echo "Deleted $deleted temp contexts\n\n";

// Test 8: Reset context
echo "Test 8: Reset context\n";
$ctx2->reset();
echo "After reset: " . json_encode($ctx2->variables) . "\n\n";

// Test 9: Delete context
echo "Test 9: Delete context\n";
$ctx2->delete();
echo "Context workflow_123 deleted\n\n";

echo "=== All Tests Completed ===\n";
