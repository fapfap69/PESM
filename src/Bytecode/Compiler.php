<?php
/**
 * PESM - Bytecode Compiler
 * Compiles AST to bytecode instructions
 */

namespace PESM\Bytecode;

use PESM\Parser\AST\Node;

require_once __DIR__ . '/Instruction.php';
require_once __DIR__ . '/../Runtime/Commands.php';

use PESM\Runtime\Commands;

class Compiler {
    private array $bytecode = [];
    private array $labels = [];
    private int $labelCounter = 0;
    
    // Custom commands registry (from COMMAND declarations)
    private array $customCommands = [];
    
    // Local variable tracking
    private array $localVars = [];  // name => offset
    private int $localCount = 0;
    private bool $inFunction = false;
    private array $functionParams = [];  // parametri funzione corrente
    
    // Loop context tracking for BREAK/CONTINUE
    private array $loopStack = [];  // [{startLabel, endLabel}, ...]
    
    public function compile(Node $ast): array {
        $this->bytecode = [];
        $this->labels = [];
        $this->labelCounter = 0;
        $this->customCommands = [];
        
        // Pre-scan for COMMAND declarations
        if ($ast instanceof \PESM\Parser\AST\ProgramNode) {
            foreach ($ast->statements as $stmt) {
                if ($stmt instanceof \PESM\Parser\AST\CommandDeclNode) {
                    foreach ($stmt->commands as $cmd) {
                        $this->customCommands[] = strtoupper($cmd);
                    }
                }
            }
        }
        
        // Trampoline: JUMP alla prima istruzione reale
        // Questo permette a VM di iniziare sempre con un "RETURN" implicito
        $startLabel = $this->newLabel();
        $this->emit('JUMP', $startLabel);
        
        // Prima istruzione reale
        $this->placeLabel($startLabel);
        
        $this->visit($ast);
        $this->emit('HLT');
        
        return $this->resolveLabels();
    }
    
    private function visit(Node $node): void {
        $class = get_class($node);
        $method = 'visit' . substr($class, strrpos($class, '\\') + 1);
        
        if (method_exists($this, $method)) {
            $this->$method($node);
        } else {
            throw new \Exception("No compiler for node: $class");
        }
    }
    
    // === Program ===
    
    private function visitProgramNode(\PESM\Parser\AST\ProgramNode $node): void {
        foreach ($node->statements as $stmt) {
            $this->visit($stmt);
        }
    }
    
    // === Comments ===
    
    private function visitCommentNode(\PESM\Parser\AST\CommentNode $node): void {
        // Comments are ignored - no bytecode emitted
    }
    
    // === Literals ===
    
    private function visitLiteralNode(\PESM\Parser\AST\LiteralNode $node): void {
        // Normalize numeric strings to numbers
        $value = $node->value;
        if (is_string($value) && is_numeric($value)) {
            $value = strpos($value, '.') !== false ? (float)$value : (int)$value;
        }
        $this->emit('PUSH', $value);
    }
    
    private function visitVariableNode(\PESM\Parser\AST\VariableNode $node): void {
        // Check se è un parametro funzione
        if ($this->inFunction && isset($this->functionParams[$node->name])) {
            $this->emit('LOAD_ARG', $this->functionParams[$node->name]);
        } elseif ($this->inFunction && isset($this->localVars[$node->name])) {
            $this->emit('LOAD_LOCAL', $this->localVars[$node->name]);
        } else {
            $this->emit('LOAD_GLOBAL', $node->name);
        }
    }
    
    // === Assignment ===
    
    private function visitAssignmentNode(\PESM\Parser\AST\AssignmentNode $node): void {
        // Store in variabile
        if (is_string($node->target)) {
            // Compila espressione (push valore su stack)
            $this->visit($node->expression);
            
            if ($this->inFunction && isset($this->localVars[$node->target])) {
                $this->emit('STORE_LOCAL', $this->localVars[$node->target]);
            } else {
                $this->emit('STORE_GLOBAL', $node->target);
            }
        } elseif ($node->target instanceof \PESM\Parser\AST\ArrayAccessNode) {
            // Collect all indices for nested access: arr[i][j][k]
            $indices = [];
            $base = $node->target;
            
            while ($base instanceof \PESM\Parser\AST\ArrayAccessNode) {
                array_unshift($indices, $base->index);
                $base = $base->array;
            }
            
            // Get variable name
            if (!($base instanceof \PESM\Parser\AST\VariableNode)) {
                throw new \Exception("Array assignment requires variable base");
            }
            $varName = $base->name;
            
            // Compila espressione (push valore su stack)
            $this->visit($node->expression);
            
            // Load current array value
            if ($this->inFunction && isset($this->localVars[$varName])) {
                $this->emit('LOAD_LOCAL', $this->localVars[$varName]);
            } else {
                $this->emit('LOAD_GLOBAL', $varName);
            }
            
            // Push all indices
            foreach ($indices as $idx) {
                $this->visit($idx);
            }
            
            // STORE_INDEX_NESTED with count of indices
            $this->emit('STORE_INDEX_NESTED', count($indices));
            
            // Store modified array back
            if ($this->inFunction && isset($this->localVars[$varName])) {
                $this->emit('STORE_LOCAL', $this->localVars[$varName]);
            } else {
                $this->emit('STORE_GLOBAL', $varName);
            }
        } else {
            throw new \Exception("Invalid assignment target");
        }
    }
    
    // === Binary Operations ===
    
    private function visitBinaryOpNode(\PESM\Parser\AST\BinaryOpNode $node): void {
        $this->visit($node->left);
        $this->visit($node->right);
        
        $opcode = match($node->operator) {
            '+' => 'ADD',
            '-' => 'SUB',
            '*' => 'MUL',
            '/' => 'DIV',
            '%' => 'MOD',
            '=', '==' => 'EQ',
            '!=', '<>' => 'NE',
            '<' => 'LT',
            '<=' => 'LE',
            '>' => 'GT',
            '>=' => 'GE',
            'AND' => 'AND',
            'OR' => 'OR',
            'range' => 'RANGE',
            default => throw new \Exception("Unknown operator: {$node->operator}")
        };
        
        $this->emit($opcode);
    }
    
    private function visitUnaryOpNode(\PESM\Parser\AST\UnaryOpNode $node): void {
        $this->visit($node->operand);
        
        $opcode = match($node->operator) {
            '-' => 'NEG',
            'NOT' => 'NOT',
            '+' => 'NOP',
            default => throw new \Exception("Unknown unary operator: {$node->operator}")
        };
        
        if ($opcode !== 'NOP') {
            $this->emit($opcode);
        }
    }
    
    // === Control Flow ===
    
    private function visitIfNode(\PESM\Parser\AST\IfNode $node): void {
        // Compila condizione
        $this->visit($node->condition);
        
        $elseLabel = $this->newLabel();
        $endLabel = $this->newLabel();
        
        $this->emit('JUMP_IF_FALSE', $elseLabel);
        
        // Then body
        foreach ($node->thenBody as $stmt) {
            $this->visit($stmt);
        }
        $this->emit('JUMP', $endLabel);
        
        // Else body
        $this->placeLabel($elseLabel);
        foreach ($node->elseBody as $stmt) {
            $this->visit($stmt);
        }
        
        $this->placeLabel($endLabel);
    }
    
    private function visitWhileNode(\PESM\Parser\AST\WhileNode $node): void {
        $startLabel = $this->newLabel();
        $endLabel = $this->newLabel();
        
        // Push loop context
        $this->loopStack[] = ['start' => $startLabel, 'end' => $endLabel];
        
        $this->placeLabel($startLabel);
        
        // Condizione
        $this->visit($node->condition);
        $this->emit('JUMP_IF_FALSE', $endLabel);
        
        // Body
        foreach ($node->body as $stmt) {
            $this->visit($stmt);
        }
        
        $this->emit('JUMP', $startLabel);
        $this->placeLabel($endLabel);
        
        // Pop loop context
        array_pop($this->loopStack);
    }
    
    private function visitDoWhileNode(\PESM\Parser\AST\DoWhileNode $node): void {
        $startLabel = $this->newLabel();
        $endLabel = $this->newLabel();
        
        // Push loop context
        $this->loopStack[] = ['start' => $startLabel, 'end' => $endLabel];
        
        $this->placeLabel($startLabel);
        
        // Body (esegue prima)
        foreach ($node->body as $stmt) {
            $this->visit($stmt);
        }
        
        // Condizione (dopo body)
        $this->visit($node->condition);
        $this->emit('JUMP_IF_TRUE', $startLabel);
        
        $this->placeLabel($endLabel);
        
        // Pop loop context
        array_pop($this->loopStack);
    }
    
    private function visitRepeatUntilNode(\PESM\Parser\AST\RepeatUntilNode $node): void {
        $startLabel = $this->newLabel();
        $endLabel = $this->newLabel();
        
        // Push loop context
        $this->loopStack[] = ['start' => $startLabel, 'end' => $endLabel];
        
        $this->placeLabel($startLabel);
        
        // Body (esegue prima)
        foreach ($node->body as $stmt) {
            $this->visit($stmt);
        }
        
        // Condizione (invertita: continua se false)
        $this->visit($node->condition);
        $this->emit('JUMP_IF_FALSE', $startLabel);
        
        $this->placeLabel($endLabel);
        
        // Pop loop context
        array_pop($this->loopStack);
    }
    
    private function visitBreakNode(\PESM\Parser\AST\BreakNode $node): void {
        if (empty($this->loopStack)) {
            throw new \Exception("BREAK outside loop");
        }
        $loop = $this->loopStack[count($this->loopStack) - 1];
        
        // Se FOREACH, cleanup iterator stack (3 POP)
        if ($loop['isForeach'] ?? false) {
            $this->emit('POP');  // length
            $this->emit('POP');  // index
            $this->emit('POP');  // array
        }
        
        $this->emit('JUMP', $loop['end']);
    }
    
    private function visitContinueNode(\PESM\Parser\AST\ContinueNode $node): void {
        if (empty($this->loopStack)) {
            throw new \Exception("CONTINUE outside loop");
        }
        $loop = $this->loopStack[count($this->loopStack) - 1];
        $this->emit('JUMP', $loop['start']);
    }
    
    private function visitSwitchNode(\PESM\Parser\AST\SwitchNode $node): void {
        // Compile switch expression
        $this->visit($node->expression);
        
        $endLabel = $this->newLabel();
        $caseLabels = [];
        $defaultLabel = null;
        
        // Push loop context for BREAK support
        $this->loopStack[] = ['start' => null, 'end' => $endLabel];
        
        // Generate labels for each case
        foreach ($node->cases as $i => $case) {
            $caseLabels[$i] = $this->newLabel();
        }
        if (!empty($node->defaultBody)) {
            $defaultLabel = $this->newLabel();
        }
        
        // Generate comparison jumps
        foreach ($node->cases as $i => $case) {
            $this->emit('DUP');  // Duplicate switch value
            $this->visit($case['value']);
            $this->emit('EQ');
            $this->emit('JUMP_IF_TRUE', $caseLabels[$i]);
        }
        
        // No match: jump to default or end
        $this->emit('POP');  // Remove switch value
        if ($defaultLabel) {
            $this->emit('JUMP', $defaultLabel);
        } else {
            $this->emit('JUMP', $endLabel);
        }
        
        // Generate case bodies
        foreach ($node->cases as $i => $case) {
            $this->placeLabel($caseLabels[$i]);
            $this->emit('POP');  // Remove switch value
            foreach ($case['body'] as $stmt) {
                $this->visit($stmt);
            }
            $this->emit('JUMP', $endLabel);
        }
        
        // Generate default body
        if ($defaultLabel) {
            $this->placeLabel($defaultLabel);
            foreach ($node->defaultBody as $stmt) {
                $this->visit($stmt);
            }
        }
        
        $this->placeLabel($endLabel);
        
        // Pop loop context
        array_pop($this->loopStack);
    }
    
    private function visitForeachNode(\PESM\Parser\AST\ForeachNode $node): void {
        // Compila iterable
        $this->visit($node->iterable);
        
        $startLabel = $this->newLabel();
        $endLabel = $this->newLabel();
        
        // Push loop context
        $this->loopStack[] = ['start' => $startLabel, 'end' => $endLabel, 'isForeach' => true];
        
        $this->emit('ITER_START');
        
        $this->placeLabel($startLabel);
        $this->emit('ITER_NEXT', $endLabel);
        
        // Store iterator value
        if ($this->inFunction && isset($this->localVars[$node->variable])) {
            $this->emit('STORE_LOCAL', $this->localVars[$node->variable]);
        } else {
            $this->emit('STORE_GLOBAL', $node->variable);
        }
        
        // Body
        foreach ($node->body as $stmt) {
            $this->visit($stmt);
        }
        
        $this->emit('JUMP', $startLabel);
        $this->placeLabel($endLabel);
        $this->emit('ITER_END');
        
        // Pop loop context
        array_pop($this->loopStack);
    }
    
    // === GOTO/Label ===
    
    private function visitLabelNode(\PESM\Parser\AST\LabelNode $node): void {
        $this->placeLabel('label_' . $node->name);
    }
    
    private function visitGotoNode(\PESM\Parser\AST\GotoNode $node): void {
        $this->emit('JUMP', 'label_' . $node->label);
    }
    
    // === Arrays & Objects ===
    
    private function visitArrayLiteralNode(\PESM\Parser\AST\ArrayLiteralNode $node): void {
        foreach ($node->elements as $elem) {
            $this->visit($elem);
        }
        $this->emit('MAKE_ARRAY', count($node->elements));
    }
    
    private function visitObjectLiteralNode(\PESM\Parser\AST\ObjectLiteralNode $node): void {
        foreach ($node->pairs as $pair) {
            $this->visit($pair['key']);
            $this->visit($pair['value']);
        }
        $this->emit('MAKE_OBJECT', count($node->pairs));
    }
    
    private function visitArrayAccessNode(\PESM\Parser\AST\ArrayAccessNode $node): void {
        $this->visit($node->array);
        $this->visit($node->index);
        $this->emit('LOAD_INDEX');
    }
    
    // === Functions ===
    
    private function visitFunctionCallNode(\PESM\Parser\AST\FunctionCallNode $node): void {
        // Push argomenti (in ordine)
        foreach ($node->arguments as $arg) {
            $this->visit($arg);
        }
        
        // Check if it's a built-in (standard or custom declared)
        $standardBuiltIns = Commands::getStandardBuiltIns();
        $isBuiltIn = in_array(strtoupper($node->name), $standardBuiltIns) || 
                     in_array(strtoupper($node->name), $this->customCommands);
        
        if ($isBuiltIn) {
            // Built-in function call
            $this->emit('CALL_BUILTIN', [strtoupper($node->name), count($node->arguments)]);
        } else {
            // User-defined function call
            $funcLabel = 'func_' . $node->name;
            $this->emit('CALL', [$funcLabel, count($node->arguments)]);
        }
    }
    
    private function visitFunctionDefNode(\PESM\Parser\AST\FunctionDefNode $node): void {
        $endLabel = $this->newLabel();
        
        // Salta definizione durante esecuzione normale
        $this->emit('JUMP', $endLabel);
        
        $funcLabel = 'func_' . $node->name;
        $this->placeLabel($funcLabel);
        
        // Setup local tracking
        $savedInFunction = $this->inFunction;
        $savedLocalVars = $this->localVars;
        $savedLocalCount = $this->localCount;
        $savedFunctionParams = $this->functionParams;
        
        $this->inFunction = true;
        $this->localVars = [];
        $this->localCount = 0;
        $this->functionParams = [];
        
        // Registra parametri (offset inverso: ultimo parametro = offset 0)
        foreach (array_reverse($node->parameters) as $i => $param) {
            $this->functionParams[$param] = $i;
        }
        
        // Analizza body per trovare variabili locali
        $this->analyzeLocals($node->body);
        
        $this->emit('ENTER_FRAME', [$this->localCount, count($node->parameters)]);
        
        // Body
        foreach ($node->body as $stmt) {
            $this->visit($stmt);
        }
        
        // Assicura RETURN alla fine
        $this->emit('PUSH', null);
        $this->emit('EXIT_FRAME');
        $this->emit('RETURN');
        
        // Restore tracking
        $this->inFunction = $savedInFunction;
        $this->localVars = $savedLocalVars;
        $this->localCount = $savedLocalCount;
        $this->functionParams = $savedFunctionParams;
        
        $this->placeLabel($endLabel);
    }
    
    private function analyzeLocals(array $statements): void {
        foreach ($statements as $stmt) {
            if ($stmt instanceof \PESM\Parser\AST\AssignmentNode && is_string($stmt->target)) {
                if (!isset($this->localVars[$stmt->target])) {
                    $this->localVars[$stmt->target] = $this->localCount++;
                }
            }
            // Ricorsione per IF, WHILE, FOREACH
            if ($stmt instanceof \PESM\Parser\AST\IfNode) {
                $this->analyzeLocals($stmt->thenBody);
                $this->analyzeLocals($stmt->elseBody);
            } elseif ($stmt instanceof \PESM\Parser\AST\WhileNode) {
                $this->analyzeLocals($stmt->body);
            } elseif ($stmt instanceof \PESM\Parser\AST\ForeachNode) {
                // Variable del foreach è locale
                if (!isset($this->localVars[$stmt->variable])) {
                    $this->localVars[$stmt->variable] = $this->localCount++;
                }
                $this->analyzeLocals($stmt->body);
            } elseif ($stmt instanceof \PESM\Parser\AST\BlockNode) {
                $this->analyzeLocals($stmt->statements);
            }
        }
    }
    
    private function visitReturnNode(\PESM\Parser\AST\ReturnNode $node): void {
        if ($node->expression) {
            $this->visit($node->expression);
        } else {
            $this->emit('PUSH', null);
        }
        $this->emit('RETURN');
    }
    
    // === Interrupts ===
    
    private function visitInterruptNode(\PESM\Parser\AST\InterruptNode $node): void {
        // Push expression se presente
        $argc = 0;
        if ($node->expression) {
            $this->visit($node->expression);
            $argc = 1;
        }
        
        // Determina tipo interrupt
        $expectsReturn = in_array($node->type, ['input', 'prompt']);
        $opcode = $expectsReturn ? 'INT_VALUE' : 'INT_VOID';
        
        // Per INPUT, passa anche targetVar
        $operand = $node->targetVar 
            ? [$node->type, $argc, $node->targetVar]
            : [$node->type, $argc];
        
        $this->emit($opcode, $operand);
    }
    
    private function visitInterruptSimpleNode(\PESM\Parser\AST\InterruptSimpleNode $node): void {
        // Push expression
        $this->visit($node->expression);
        
        // InterruptSimpleNode always emits INT_VOID (no return value expected)
        $this->emit('INT_VOID', [$node->type, 1]);
    }
    
    private function visitInterruptInputNode(\PESM\Parser\AST\InterruptInputNode $node): void {
        // Push expression
        $this->visit($node->expression);
        
        // Emit INT_VALUE (expects return value) with targetVar
        $this->emit('INT_VALUE', [$node->type, 1, $node->targetVar]);
    }
    
    // === Block ===
    
    private function visitBlockNode(\PESM\Parser\AST\BlockNode $node): void {
        foreach ($node->statements as $stmt) {
            $this->visit($stmt);
        }
    }
    
    private function visitRangeNode(\PESM\Parser\AST\RangeNode $node): void {
        // Compile start and end expressions
        $this->visit($node->start);
        $this->visit($node->end);
        
        // Emit RANGE instruction to create array from start to end
        $this->emit('RANGE');
    }
    
    // === STRUCT ===
    
    private function visitStructDefNode(\PESM\Parser\AST\StructDefNode $node): void {
        // STRUCT definition: register in runtime
        $this->emit('DEFINE_STRUCT', [$node->name, $node->fields]);
    }
    
    // === COMMAND Declaration ===
    
    private function visitCommandDeclNode(\PESM\Parser\AST\CommandDeclNode $node): void {
        // Register custom commands for compilation
        foreach ($node->commands as $cmd) {
            $this->customCommands[] = strtoupper($cmd);
        }
        // No bytecode emission - this is compile-time only
    }
    
    private function visitMakeStructNode(\PESM\Parser\AST\MakeStructNode $node): void {
        // Push arguments
        foreach ($node->arguments as $arg) {
            if ($arg['name']) {
                // Named argument: push name then value
                // name should be a string, not a Node
                if (is_string($arg['name'])) {
                    $this->emit('PUSH', $arg['name']);
                } else {
                    throw new \Exception("Named argument name must be string, got: " . gettype($arg['name']));
                }
                $this->visit($arg['value']);
            } else {
                // Positional: push null as name, then value
                $this->emit('PUSH', null);
                $this->visit($arg['value']);
            }
        }
        
        // MAKE_STRUCT: struct name, arg count
        $this->emit('MAKE_STRUCT', [$node->structName, count($node->arguments)]);
    }
    
    private function visitPropertyAccessNode(\PESM\Parser\AST\PropertyAccessNode $node): void {
        // Compile object expression
        $this->visit($node->object);
        
        // Push property name
        $this->emit('PUSH', $node->property);
        
        // Load property (same as array access)
        $this->emit('LOAD_INDEX');
    }
    
    // === Helpers ===
    
    private function emit(string $opcode, mixed $operand = null): void {
        $this->bytecode[] = new Instruction($opcode, $operand);
    }
    
    private function newLabel(): string {
        return 'L' . $this->labelCounter++;
    }
    
    private function placeLabel(string $label): void {
        $this->labels[$label] = count($this->bytecode);
    }
    
    private function resolveLabels(): array {
        $resolved = [];
        
        foreach ($this->bytecode as $instr) {
            if (in_array($instr->opcode, ['JUMP', 'JUMP_IF_FALSE', 'JUMP_IF_TRUE', 'ITER_NEXT'])) {
                if (is_string($instr->operand)) {
                    if (isset($this->labels[$instr->operand])) {
                        $instr->operand = $this->labels[$instr->operand];
                    } else {
                        throw new \Exception("Undefined label: {$instr->operand}");
                    }
                }
            }
            
            // CALL: risolvi label funzione in indirizzo
            if ($instr->opcode === 'CALL') {
                [$label, $argc] = $instr->operand;
                if (isset($this->labels[$label])) {
                    $instr->operand = [$this->labels[$label], $argc];
                } else {
                    throw new \Exception("Undefined function: $label (function must be defined before use)");
                }
            }
            
            $resolved[] = $instr;
        }
        
        return $resolved;
    }
}
