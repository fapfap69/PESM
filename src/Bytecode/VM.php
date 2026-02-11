<?php
/**
 * PESM - Bytecode Virtual Machine
 * Stack-based execution engine with interrupt/resume support
 */

namespace PESM\Bytecode;

require_once __DIR__ . '/../Runtime/Result.php';
require_once __DIR__ . '/../Runtime/GlobalContext.php';
require_once __DIR__ . '/../Runtime/Commands.php';

use PESM\Runtime\Result;
use PESM\Runtime\GlobalContext;
use PESM\Runtime\Commands;

class VM {
    private array $bytecode = [];
    private int $pc = 0;
    private array $stack = [];
    private int $framePointer = -1;
    private ?GlobalContext $globals = null;
    private ?Commands $commands = null;
    
    private int $maxStackSize;
    
    public function __construct(int $maxStackSize = 1000) {
        $this->maxStackSize = $maxStackSize;
    }
    
    public function execute(
        array $bytecode,
        GlobalContext $globals,
        ?array $state = null,
        ?int $resumeFrom = null,
        mixed $returnValue = null,
        ?Commands $commands = null
    ): Result {
        $this->bytecode = $bytecode;
        $this->globals = $globals;
        $this->commands = $commands ?? new Commands();
        
        // Restore state se resume
        if ($state) {
            $this->stack = $state['stack'] ?? [];
        } else {
            // Prima esecuzione: stack con [framePointer=-1, returnAddr=0]
            $this->stack = [-1, 0];
        }
        
        // SEMPRE inizia con "RETURN" implicito: pop PC e BP
        // Prima esecuzione: pop(0), pop(-1) → esegue trampoline JUMP
        // Resume: pop(returnAddr), pop(framePointer) → riprende da dove interrotto
        $this->pc = $this->pop();
        $this->framePointer = $this->pop();
        
        // Push return value se resume da INT_VALUE (deprecato, ora nello stack)
        if ($returnValue !== null) {
            $this->push($returnValue);
        }
        
        try {
            while ($this->pc < count($this->bytecode)) {
                $instr = $this->bytecode[$this->pc];
                $this->executeInstruction($instr);
            }
            
            return new Result(
                status: 'success',
                variables: $this->globals->variables
            );
            
        } catch (InterruptException $e) {
            return new Result(
                status: 'interrupted',
                variables: $this->globals->variables,
                action: $e->action,
                actionData: $e->actionData,
                resumeFrom: $e->resumeFrom,
                state: $e->state,
                expectsReturn: $e->expectsReturn,
                targetVar: $e->targetVar
            );
            
        } catch (\Exception $e) {
            return new Result(
                status: 'error',
                error: $e->getMessage(),
                variables: $this->globals->variables
            );
        }
    }
    
    private function executeInstruction(Instruction $instr): void {
        switch ($instr->opcode) {
            // Stack operations
            case 'PUSH':
                $this->push($instr->operand);
                break;
                
            case 'POP':
                $this->pop();
                break;
                
            case 'DUP':
                $value = $this->peek();
                $this->push($value);
                break;
                
            // Global variables
            case 'LOAD_GLOBAL':
                $name = $instr->operand;
                if (!isset($this->globals->variables[$name])) {
                    throw new \Exception("Undefined variable: $name");
                }
                $this->push($this->globals->variables[$name]);
                break;
                
            case 'STORE_GLOBAL':
                $name = $instr->operand;
                $value = $this->pop();
                $this->globals->variables[$name] = $value;
                break;
                
            // Local variables
            case 'LOAD_LOCAL':
                $offset = $instr->operand;
                $pos = $this->framePointer + 1 + $offset;
                if ($pos >= count($this->stack)) {
                    throw new \Exception("Invalid local variable offset: $offset");
                }
                $this->push($this->stack[$pos]);
                break;
                
            case 'STORE_LOCAL':
                $offset = $instr->operand;
                $value = $this->pop();
                $pos = $this->framePointer + 1 + $offset;
                if ($pos >= count($this->stack)) {
                    throw new \Exception("Invalid local variable offset: $offset");
                }
                $this->stack[$pos] = $value;
                break;
                
            case 'LOAD_ARG':
                $offset = $instr->operand;
                // Args: framePointer - 2 - argc + offset
                // Ma argc non è salvato... usiamo convenzione
                $pos = $this->framePointer - 2 - $offset;
                if ($pos < 0 || $pos >= count($this->stack)) {
                    throw new \Exception("Invalid argument offset: $offset");
                }
                $this->push($this->stack[$pos]);
                break;
                
            // Arithmetic
            case 'ADD':
                $b = $this->pop();
                $a = $this->pop();
                // String concatenation
                if (is_string($a) || is_string($b)) {
                    $this->push($a . $b);
                } else {
                    $this->typeCheck($a, $b, 'ADD');
                    $this->push($a + $b);
                }
                break;
                
            case 'SUB':
                $b = $this->pop();
                $a = $this->pop();
                $this->typeCheck($a, $b, 'SUB');
                $this->push($a - $b);
                break;
                
            case 'MUL':
                $b = $this->pop();
                $a = $this->pop();
                $this->typeCheck($a, $b, 'MUL');
                $this->push($a * $b);
                break;
                
            case 'DIV':
                $b = $this->pop();
                $a = $this->pop();
                $this->typeCheck($a, $b, 'DIV');
                if ($b == 0) {
                    throw new \Exception("Division by zero");
                }
                $this->push($a / $b);
                break;
                
            case 'MOD':
                $b = $this->pop();
                $a = $this->pop();
                $this->typeCheck($a, $b, 'MOD');
                $this->push($a % $b);
                break;
                
            case 'NEG':
                $a = $this->pop();
                $this->push(-$a);
                break;
                
            // Comparison
            case 'EQ':
                $b = $this->pop();
                $a = $this->pop();
                $this->push($a == $b);
                break;
                
            case 'NE':
                $b = $this->pop();
                $a = $this->pop();
                $this->push($a != $b);
                break;
                
            case 'LT':
                $b = $this->pop();
                $a = $this->pop();
                $this->push($a < $b);
                break;
                
            case 'LE':
                $b = $this->pop();
                $a = $this->pop();
                $this->push($a <= $b);
                break;
                
            case 'GT':
                $b = $this->pop();
                $a = $this->pop();
                $this->push($a > $b);
                break;
                
            case 'GE':
                $b = $this->pop();
                $a = $this->pop();
                $this->push($a >= $b);
                break;
                
            // Logic
            case 'AND':
                $b = $this->pop();
                $a = $this->pop();
                $this->push($a && $b);
                break;
                
            case 'OR':
                $b = $this->pop();
                $a = $this->pop();
                $this->push($a || $b);
                break;
                
            case 'NOT':
                $a = $this->pop();
                $this->push(!$a);
                break;
                
            // Control flow
            case 'JUMP':
                $this->pc = $instr->operand;
                return;  // Skip pc++
                
            case 'JUMP_IF_FALSE':
                $cond = $this->pop();
                if (!$cond) {
                    $this->pc = $instr->operand;
                    return;
                }
                break;
                
            case 'JUMP_IF_TRUE':
                $cond = $this->pop();
                if ($cond) {
                    $this->pc = $instr->operand;
                    return;
                }
                break;
                
            // Functions
            case 'ENTER_FRAME':
                [$localCount, $argc] = $instr->operand;
                // Alloca spazio per locali
                for ($i = 0; $i < $localCount; $i++) {
                    $this->push(null);
                }
                break;
                
            case 'EXIT_FRAME':
                // Rimuove locali (fino a frame pointer)
                if ($this->framePointer >= 0) {
                    $localCount = count($this->stack) - $this->framePointer - 1;
                    array_splice($this->stack, $this->framePointer + 1, $localCount);
                }
                break;
                
            case 'CALL':
                [$funcAddr, $argc] = $instr->operand;
                
                // Push return address
                $this->push($this->pc + 1);
                // Push frame pointer
                $this->push($this->framePointer);
                // Set new frame pointer
                $this->framePointer = count($this->stack) - 1;
                // Jump to function
                $this->pc = $funcAddr;
                return;
                
            case 'RETURN':
                $returnValue = $this->pop();
                // Restore frame pointer
                $this->framePointer = $this->pop();
                // Get return address
                $returnAddr = $this->pop();
                // Remove args (sono prima del return addr)
                // Nota: args sono già stati usati, non serve rimuoverli
                // Push return value
                $this->push($returnValue);
                $this->pc = $returnAddr;
                return;
                
            // Built-in function call
            case 'CALL_BUILTIN':
                [$funcName, $argc] = $instr->operand;
                
                // Pop arguments
                $args = [];
                for ($i = 0; $i < $argc; $i++) {
                    $args[] = $this->pop();
                }
                $args = array_reverse($args);
                
                // Execute built-in
                if (!$this->commands->has($funcName)) {
                    throw new \Exception("Built-in function not found: $funcName");
                }
                
                $result = $this->commands->execute($funcName, $args, $this->globals);
                $this->push($result);
                break;
                
            // Arrays
            case 'MAKE_ARRAY':
                $size = $instr->operand;
                $elements = [];
                for ($i = 0; $i < $size; $i++) {
                    $elements[] = $this->pop();
                }
                $this->push(array_reverse($elements));
                break;
                
            case 'MAKE_OBJECT':
                $size = $instr->operand;
                $obj = [];
                for ($i = 0; $i < $size; $i++) {
                    $value = $this->pop();
                    $key = $this->pop();
                    $obj[$key] = $value;
                }
                $this->push($obj);
                break;
                
            case 'LOAD_INDEX':
                $index = $this->pop();
                $array = $this->pop();
                if (!is_array($array)) {
                    throw new \Exception("Cannot index non-array");
                }
                $this->push($array[$index] ?? null);
                break;
                
            // STRUCT operations
            case 'DEFINE_STRUCT':
                [$name, $fields] = $instr->operand;
                $this->globals->structs[$name] = $fields;
                break;
                
            case 'MAKE_STRUCT':
                [$structName, $argCount] = $instr->operand;
                
                if (!isset($this->globals->structs[$structName])) {
                    throw new \Exception("Struct not defined: $structName");
                }
                
                $fields = $this->globals->structs[$structName];
                $instance = [];
                
                // Pop arguments (name, value pairs)
                $args = [];
                for ($i = 0; $i < $argCount; $i++) {
                    $value = $this->pop();
                    $name = $this->pop();
                    $args[] = ['name' => $name, 'value' => $value];
                }
                $args = array_reverse($args);
                
                // Check if named or positional
                $hasNamedArgs = $args[0]['name'] !== null;
                
                if ($hasNamedArgs) {
                    // Named arguments
                    foreach ($args as $arg) {
                        $instance[$arg['name']] = $arg['value'];
                    }
                } else {
                    // Positional arguments
                    foreach ($fields as $i => $field) {
                        $instance[$field] = $args[$i]['value'] ?? null;
                    }
                }
                
                $this->push($instance);
                break;
                
            case 'STORE_INDEX':
                $index = $this->pop();
                $array = $this->pop();
                $value = $this->pop();
                if (!is_array($array)) {
                    $array = [];
                }
                $array[$index] = $value;
                // Push modified array back
                $this->push($array);
                break;
                
            case 'STORE_INDEX_NESTED':
                // Stack: [value, array, idx1, idx2, ..., idxN]
                // operand = N (number of indices)
                $depth = $instr->operand;
                
                // Pop all indices
                $indices = [];
                for ($i = 0; $i < $depth; $i++) {
                    $indices[] = $this->pop();
                }
                $indices = array_reverse($indices);
                
                // Pop array
                $array = $this->pop();
                if (!is_array($array)) {
                    $array = [];
                }
                
                // Pop value
                $value = $this->pop();
                
                // Navigate and assign
                $ref = &$array;
                $lastIdx = array_pop($indices);
                
                foreach ($indices as $idx) {
                    if (!isset($ref[$idx]) || !is_array($ref[$idx])) {
                        $ref[$idx] = [];
                    }
                    $ref = &$ref[$idx];
                }
                
                $ref[$lastIdx] = $value;
                
                // Push modified array back
                $this->push($array);
                break;
                
            case 'RANGE':
                $to = $this->pop();
                $from = $this->pop();
                $this->push(range($from, $to));
                break;
                
            // Iterators
            case 'RANGE':
                // Pop end and start from stack
                $end = $this->pop();
                $start = $this->pop();
                // Create range array and push it
                $this->push(range($start, $end));
                break;
                
            case 'ITER_START':
                // Stack: [array] → [array, 0, length]
                $array = $this->pop();
                if (!is_array($array)) {
                    throw new \Exception("FOREACH requires array");
                }
                $this->push($array);           // array
                $this->push(0);                // index
                $this->push(count($array));    // length
                break;
                
            case 'ITER_NEXT':
                // Stack top: [array, index, length]
                $length = $this->peek();  // Peek invece di pop
                $index = $this->stack[count($this->stack) - 2];
                $array = $this->stack[count($this->stack) - 3];
                
                if ($index >= $length) {
                    // Finito: cleanup e salta
                    $this->pop();  // length
                    $this->pop();  // index
                    $this->pop();  // array
                    $this->pc = $instr->operand;
                    return;
                }
                
                // Push elemento corrente
                $this->push($array[$index]);
                
                // Incrementa index nello stack
                $this->stack[count($this->stack) - 3] = $index + 1;
                break;
                
            case 'ITER_END':
                // Cleanup: pop array, index, length (già fatto da ITER_NEXT quando finisce)
                // Questo viene chiamato solo se loop completa normalmente
                break;
                
            // Interrupts
            case 'INT_VOID':
            case 'INT_VALUE':
                $operand = $instr->operand;
                $name = $operand[0];
                $argc = $operand[1];
                $targetVar = $operand[2] ?? null;
                
                $args = [];
                for ($i = 0; $i < $argc; $i++) {
                    $args[] = $this->pop();
                }
                $args = array_reverse($args);
                
                // Push framePointer e return address (ordine: BP, PC per pop inverso)
                $this->push($this->framePointer);
                $this->push($this->pc + 1);
                
                throw new InterruptException(
                    action: $name,
                    actionData: $args[0] ?? null,
                    resumeFrom: $this->pc + 1,
                    expectsReturn: $instr->opcode === 'INT_VALUE',
                    targetVar: $targetVar,
                    state: [
                        'stack' => $this->stack
                    ]
                );
                
            case 'HLT':
                // Fine programma - esce dal loop
                $this->pc = count($this->bytecode);
                return;
                
            default:
                throw new \Exception("Unknown opcode: {$instr->opcode}");
        }
        
        $this->pc++;
    }
    
    private function push(mixed $value): void {
        if (count($this->stack) >= $this->maxStackSize) {
            throw new \Exception("Stack overflow (max: {$this->maxStackSize})");
        }
        $this->stack[] = $value;
    }
    
    private function pop(): mixed {
        if (empty($this->stack)) {
            throw new \Exception("Stack underflow");
        }
        return array_pop($this->stack);
    }
    
    private function peek(): mixed {
        if (empty($this->stack)) {
            throw new \Exception("Stack underflow");
        }
        return $this->stack[count($this->stack) - 1];
    }
    
    private function typeCheck(mixed $a, mixed $b, string $op): void {
        if (!is_numeric($a) || !is_numeric($b)) {
            throw new \Exception("Type error: $op requires numeric operands");
        }
    }
}

/**
 * Exception per gestire interrupt
 */
class InterruptException extends \Exception {
    public function __construct(
        public string $action,
        public mixed $actionData,
        public int $resumeFrom,
        public bool $expectsReturn,
        public ?string $targetVar,
        public array $state
    ) {
        parent::__construct("Interrupt: $action");
    }
}
