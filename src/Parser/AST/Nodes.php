<?php
/**
 * PESM - Essential AST Nodes
 * Core nodes for the PESM language
 */

namespace PESM\Parser\AST;

// Literal Node
class LiteralNode extends Node {
    public function __construct(public mixed $value) {
        parent::__construct();
    }
    
    public function execute($context, $flow, $commands) {
        return $this->value;
    }
    
    public function toArray(): array {
        return array_merge(parent::toArray(), ['value' => $this->value]);
    }
}

// Variable Node
class VariableNode extends Node {
    public function __construct(public string $name) {
        parent::__construct();
    }
    
    public function execute($context, $flow, $commands) {
        return $context->get($this->name);
    }
    
    public function toArray(): array {
        return array_merge(parent::toArray(), ['name' => $this->name]);
    }
}

// Assignment Node
class AssignmentNode extends Node {
    public function __construct(
        public string $variable,
        public Node $expression
    ) {
        parent::__construct();
    }
    
    public function execute($context, $flow, $commands) {
        $value = $this->expression->execute($context, $flow, $commands);
        $context->set($this->variable, $value);
        return $value;
    }
    
    public function getChildren(): array {
        return [$this->expression];
    }
}

// Binary Operation Node
class BinaryOpNode extends Node {
    public function __construct(
        public Node $left,
        public string $operator,
        public Node $right
    ) {
        parent::__construct();
    }
    
    public function execute($context, $flow, $commands) {
        $l = $this->left->execute($context, $flow, $commands);
        $r = $this->right->execute($context, $flow, $commands);
        
        // Special case for range
        if ($this->operator === 'range') {
            return range($l, $r);
        }
        
        return match($this->operator) {
            '+' => $l + $r,
            '-' => $l - $r,
            '*' => $l * $r,
            '/' => $l / $r,
            '%' => $l % $r,
            '==' => $l == $r,
            '!=' => $l != $r,
            '>' => $l > $r,
            '>=' => $l >= $r,
            '<' => $l < $r,
            '<=' => $l <= $r,
            'AND' => $l && $r,
            'OR' => $l || $r,
            default => throw new \Exception("Unknown operator: {$this->operator}")
        };
    }
    
    public function getChildren(): array {
        return [$this->left, $this->right];
    }
}

// Array Access Node
class ArrayAccessNode extends Node {
    public function __construct(
        public Node $array,
        public Node $index
    ) {
        parent::__construct();
    }
    
    public function execute($context, $flow, $commands) {
        $arr = $this->array->execute($context, $flow, $commands);
        $idx = $this->index->execute($context, $flow, $commands);
        return $arr[$idx] ?? null;
    }
    
    public function getChildren(): array {
        return [$this->array, $this->index];
    }
}

// IF Node
class IfNode extends Node {
    public function __construct(
        public Node $condition,
        public array $thenBody,
        public array $elseBody = []
    ) {
        parent::__construct();
    }
    
    public function execute($context, $flow, $commands) {
        $condValue = $this->condition->execute($context, $flow, $commands);
        
        $body = $condValue ? $this->thenBody : $this->elseBody;
        
        foreach ($body as $stmt) {
            $stmt->execute($context, $flow, $commands);
            if ($flow->hasReturnValue() || $flow->getAction() || $flow->needsInterrupt()) {
                break;
            }
        }
    }
    
    public function getChildren(): array {
        return array_merge([$this->condition], $this->thenBody, $this->elseBody);
    }
}

// FOREACH Node
class ForeachNode extends Node {
    public function __construct(
        public string $variable,
        public Node $iterable,
        public array $body
    ) {
        parent::__construct();
    }
    
    public function execute($context, $flow, $commands) {
        $items = $this->iterable->execute($context, $flow, $commands);
        
        if (!is_array($items)) {
            throw new \Exception("FOREACH requires an array");
        }
        
        foreach ($items as $item) {
            $context->set($this->variable, $item);
            
            foreach ($this->body as $stmt) {
                $stmt->execute($context, $flow, $commands);
                
                if ($flow->shouldBreak()) {
                    $flow->reset();
                    return;
                }
                if ($flow->shouldContinue()) {
                    $flow->reset();
                    break;
                }
                if ($flow->hasReturnValue() || $flow->getAction()) {
                    return;
                }
            }
        }
    }
    
    public function getChildren(): array {
        return array_merge([$this->iterable], $this->body);
    }
}

// Function Call Node
class FunctionCallNode extends Node {
    public function __construct(
        public string $name,
        public array $arguments
    ) {
        parent::__construct();
    }
    
    public function execute($context, $flow, $commands) {
        // Evaluate arguments
        $args = array_map(
            fn($arg) => $arg->execute($context, $flow, $commands),
            $this->arguments
        );
        
        // Check user-defined functions
        if ($context->hasFunction($this->name)) {
            return $this->executeUserFunction($context, $flow, $commands, $args);
        }
        
        // Check built-in functions
        if ($commands->has($this->name)) {
            return $commands->execute($this->name, $args, $context);
        }
        
        throw new \Exception("Function not found: {$this->name}");
    }
    
    private function executeUserFunction($context, $flow, $commands, $args) {
        $funcDef = $context->getFunction($this->name);
        
        $context->pushScope();
        
        foreach ($funcDef->parameters as $i => $param) {
            $context->set($param, $args[$i] ?? null);
        }
        
        $returnValue = null;
        foreach ($funcDef->body as $stmt) {
            $stmt->execute($context, $flow, $commands);
            
            if ($flow->hasReturnValue()) {
                $returnValue = $flow->getReturnValue();
                $flow->clearReturn();
                break;
            }
        }
        
        $context->popScope();
        
        return $returnValue;
    }
    
    public function getChildren(): array {
        return $this->arguments;
    }
}

// MESSAGE Command Node
class MessageNode extends Node {
    public function __construct(public Node $expression) {
        parent::__construct();
    }
    
    public function execute($context, $flow, $commands) {
        $value = $this->expression->execute($context, $flow, $commands);
        $context->setMessage((string)$value);
    }
    
    public function getChildren(): array {
        return [$this->expression];
    }
}

// ACCEPT Command Node
class AcceptNode extends Node {
    public function __construct(public ?Node $state = null) {
        parent::__construct();
    }
    
    public function execute($context, $flow, $commands) {
        $stateName = $this->state 
            ? $this->state->execute($context, $flow, $commands)
            : null;
        $flow->setAction('accept', $stateName);
    }
}

// REFUSE Command Node
class RefuseNode extends Node {
    public function __construct(public ?Node $state = null) {
        parent::__construct();
    }
    
    public function execute($context, $flow, $commands) {
        $stateName = $this->state 
            ? $this->state->execute($context, $flow, $commands)
            : null;
        $flow->setAction('refuse', $stateName);
    }
}

// RETURN Statement Node
class ReturnNode extends Node {
    public function __construct(public ?Node $expression = null) {
        parent::__construct();
    }
    
    public function execute($context, $flow, $commands) {
        $value = $this->expression 
            ? $this->expression->execute($context, $flow, $commands)
            : null;
        $flow->setReturn($value);
    }
}

// Function Definition Node
class FunctionDefNode extends Node {
    public function __construct(
        public string $name,
        public array $parameters,
        public array $body
    ) {
        parent::__construct();
    }
    
    public function execute($context, $flow, $commands) {
        $context->defineFunction($this->name, $this);
    }
    
    public function getChildren(): array {
        return $this->body;
    }
}

// Unary Operation Node
class UnaryOpNode extends Node {
    public function __construct(
        public string $operator,
        public Node $operand
    ) {
        parent::__construct();
    }
    
    public function execute($context, $flow, $commands) {
        $val = $this->operand->execute($context, $flow, $commands);
        
        return match($this->operator) {
            '-' => -$val,
            '+' => +$val,
            default => throw new \Exception("Unknown unary operator: {$this->operator}")
        };
    }
    
    public function getChildren(): array {
        return [$this->operand];
    }
}
