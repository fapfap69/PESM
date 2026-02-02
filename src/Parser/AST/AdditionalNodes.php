<?php

namespace PESM\Parser\AST;

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
    
    public function execute($context, $flow, $commands, $pc = null)
    {
        $mask = $this->maskName->execute($context, $flow, $commands, $pc);
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
    
    public function execute($context, $flow, $commands, $pc = null)
    {
        $val = $this->value->execute($context, $flow, $commands, $pc);
        // Store in special TITLE scope
        $context->setVariable('TITLE_' . $this->varName, $val);
    }
    
    public function getChildren(): array
    {
        return [$this->value];
    }
}
