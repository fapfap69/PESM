<?php
/**
 * PROPOSTA: Nodo Interrupt Unificato
 * 
 * Grammatica:
 *   InterruptStmt = MESSAGE Expression | ACCEPT Expression | REFUSE Expression
 * 
 * AST:
 *   InterruptNode(type, expression)
 */

namespace PESM\Parser\AST;

class InterruptNode extends Node {
    public function __construct(
        public string $type,        // 'message', 'accept', 'refuse'
        public ?Node $expression    // Parametro opzionale
    ) {
        parent::__construct();
    }
    
    public function execute($context, $flow, $commands, $pc = null) {
        $data = $this->expression 
            ? $this->expression->execute($context, $flow, $commands, $pc)
            : null;
        
        $flow->setInterrupt($this->type, $data);
    }
    
    public function getChildren(): array {
        return $this->expression ? [$this->expression] : [];
    }
}

// VANTAGGI:
// - Codice più pulito e manutenibile
// - Facile aggiungere nuovi tipi di interrupt
// - Logica centralizzata
// - Meno duplicazione

// ESEMPIO USO:
// new InterruptNode('message', new LiteralNode('Hello'))
// new InterruptNode('accept', new LiteralNode('approved'))
// new InterruptNode('refuse', new LiteralNode('rejected'))
