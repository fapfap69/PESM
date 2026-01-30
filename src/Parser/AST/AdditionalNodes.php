<?php

namespace PESM\Parser\AST;

/**
 * WhileNode - WHILE loop
 */
class WhileNode extends Node
{
    public $condition;
    public $body;
    
    public function __construct($condition, array $body)
    {
        parent::__construct();
        $this->condition = $condition;
        $this->body = $body;
    }
    
    public function execute($context, $flow, $commands)
    {
        while (true) {
            $condResult = $this->condition->execute($context, $flow, $commands);
            if (!$condResult) break;
            
            foreach ($this->body as $stmt) {
                $stmt->execute($context, $flow, $commands);
                
                if ($flow->hasBreak()) {
                    $flow->clearBreak();
                    return;
                }
                if ($flow->hasContinue()) {
                    $flow->clearContinue();
                    break;
                }
                if ($flow->hasReturn() || $flow->hasAction()) {
                    return;
                }
            }
        }
    }
    
    public function getChildren(): array
    {
        return array_merge([$this->condition], $this->body);
    }
}

/**
 * InputMaskNode - INPUT_MASK command
 */
class InputMaskNode extends Node
{
    public $maskName;
    
    public function __construct($maskName)
    {
        parent::__construct();
        $this->maskName = $maskName;
    }
    
    public function execute($context, $flow, $commands)
    {
        $mask = $this->maskName->execute($context, $flow, $commands);
        // Trigger INPUT_MASK command
        $flow->setCommand('INPUT_MASK', $mask);
    }
    
    public function getChildren(): array
    {
        return [$this->maskName];
    }
}

/**
 * TitleNode - TITLE variable assignment
 */
class TitleNode extends Node
{
    public $varName;
    public $value;
    
    public function __construct(string $varName, $value)
    {
        parent::__construct();
        $this->varName = $varName;
        $this->value = $value;
    }
    
    public function execute($context, $flow, $commands)
    {
        $val = $this->value->execute($context, $flow, $commands);
        // Store in special TITLE scope
        $context->setVariable('TITLE_' . $this->varName, $val);
    }
    
    public function getChildren(): array
    {
        return [$this->value];
    }
}
