# PESM - Implementazione Comandi Workflow

Documentazione tecnica su come MESSAGE, ACCEPT e REFUSE sono implementati attraverso i 3 livelli: Grammatica → AST → Runtime.

---

## 1. GRAMMATICA (PEG)

### Definizione in `grammar/pesm.peg`

```peg
#node(MessageNode)
MessageStmt: "MESSAGE" _ msg:Expression

#node(AcceptNode)
AcceptStmt: "ACCEPT" _ state:Expression

#node(RefuseNode)
RefuseStmt: "REFUSE" _ state:Expression
```

**Caratteristiche:**
- Keyword riservata (`MESSAGE`, `ACCEPT`, `REFUSE`)
- Accettano una `Expression` (non solo stringhe)
- Annotazione `#node()` specifica la classe AST da generare
- Named capture `msg:` / `state:` per estrarre l'espressione

**Integrazione in Statement:**
```peg
Statement: alt:FunctionDef _ | alt:IfStatement _ | ... | alt:MessageStmt _ | alt:AcceptStmt _ | alt:RefuseStmt _ | ...
```

---

## 2. AST (Abstract Syntax Tree)

### Nodi in `src/Parser/AST/Nodes.php`

#### MessageNode
```php
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
```

#### AcceptNode
```php
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
```

#### RefuseNode
```php
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
```

**Caratteristiche comuni:**
- Estendono `Node` base
- Costruttore accetta `Node $expression` (AST dell'espressione)
- `execute()` valuta l'espressione e chiama metodi su `$context` o `$flow`
- `getChildren()` ritorna nodi figli per traversal

---

## 3. RUNTIME

### ExecutionContext (`src/Runtime/ExecutionContext.php`)

Gestisce lo stato dell'esecuzione:

```php
class ExecutionContext {
    private ?string $message = null;
    
    public function setMessage(string $msg): void {
        $this->message = $msg;
    }
    
    public function getMessage(): ?string {
        return $this->message;
    }
}
```

**Responsabilità:**
- Memorizza il messaggio da MESSAGE
- Gestisce variabili e scope
- Gestisce funzioni definite

### ControlFlow (`src/Runtime/Components.php`)

Gestisce il flusso di controllo:

```php
class ControlFlow {
    private ?string $action = null;
    private $actionData = null;
    
    public function setAction(string $action, $data = null): void {
        $this->action = $action;
        $this->actionData = $data;
    }
    
    public function getAction(): ?string {
        return $this->action;
    }
    
    public function getActionData() {
        return $this->actionData;
    }
}
```

**Responsabilità:**
- Memorizza azione (accept/refuse) da ACCEPT/REFUSE
- Gestisce RETURN, BREAK, CONTINUE
- Gestisce interruzioni per checkpoint

### Interpreter (`src/Runtime/Interpreter.php`)

Coordina l'esecuzione e costruisce il result:

```php
public function execute(Node $ast, array $variables = []): Result {
    $context = new ExecutionContext($variables);
    $flow = new ControlFlow();
    
    $ast->execute($context, $flow, $this->functions);
    
    return new Result(
        status: 'success',
        variables: $context->getAll(),
        message: $context->getMessage(),    // Da MESSAGE
        action: $flow->getAction()          // Da ACCEPT/REFUSE
    );
}
```

---

## FLUSSO COMPLETO

### Esempio: `MESSAGE "Hello"`

**1. Parsing (Grammatica → AST)**
```
Input: MESSAGE "Hello"
↓
Parser matcha: MessageStmt: "MESSAGE" _ msg:Expression
↓
Cattura: msg = String("Hello")
↓
Converter crea: new MessageNode(new LiteralNode("Hello"))
```

**2. Esecuzione (AST → Runtime)**
```
MessageNode->execute($context, $flow, $commands)
↓
$value = $this->expression->execute(...)  // "Hello"
↓
$context->setMessage("Hello")
↓
Memorizzato in ExecutionContext
```

**3. Result (Runtime → Output)**
```
Interpreter->execute(...)
↓
return new Result(
    message: $context->getMessage()  // "Hello"
)
↓
$result['message'] = "Hello"
```

---

## DIFFERENZE TRA I COMANDI

| Aspetto | MESSAGE | ACCEPT/REFUSE |
|---------|---------|---------------|
| **Storage** | ExecutionContext | ControlFlow |
| **Campo result** | `message` | `action` |
| **Valore** | Stringa del messaggio | 'accept' o 'refuse' |
| **Data extra** | No | Sì (stato opzionale) |
| **Uso tipico** | Logging/Output | Decisioni workflow |

---

## ESTENSIBILITÀ

Per aggiungere un nuovo comando (es. `LOG`):

**1. Grammatica:**
```peg
#node(LogNode)
LogStmt: "LOG" _ level:Expression _ msg:Expression
```

**2. AST:**
```php
class LogNode extends Node {
    public function __construct(
        public Node $level,
        public Node $message
    ) {}
    
    public function execute($context, $flow, $commands) {
        $lvl = $this->level->execute($context, $flow, $commands);
        $msg = $this->message->execute($context, $flow, $commands);
        $context->addLog($lvl, $msg);
    }
}
```

**3. Runtime:**
```php
// In ExecutionContext
private array $logs = [];

public function addLog(string $level, string $message): void {
    $this->logs[] = ['level' => $level, 'message' => $message];
}
```

**4. Result:**
```php
// In Interpreter
return new Result(
    ...
    logs: $context->getLogs()
);
```

---

## PATTERN COMUNE

Tutti i comandi workflow seguono questo pattern:

1. **Grammatica**: Keyword + Expression
2. **AST**: Node con expression, execute() chiama metodo su context/flow
3. **Runtime**: Context/Flow memorizza stato
4. **Result**: Interpreter raccoglie da context/flow

Questo pattern rende facile aggiungere nuovi comandi mantenendo consistenza.
