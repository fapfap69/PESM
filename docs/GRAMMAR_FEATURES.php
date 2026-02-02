<?php
/**
 * PESM - Strutture di Controllo Riconosciute
 * Riepilogo completo della grammatica implementata
 */

// ============================================
// STRUTTURE DI CONTROLLO
// ============================================

/*
1. IF / ELSE / END
2. WHILE / END
3. FOREACH / TO / END
4. FUNCTION / RETURN / END
*/

// ============================================
// 1. IF / ELSE / END
// ============================================

$if_example = '
age = 25
IF age >= 18
  status = "adult"
ELSE
  status = "minor"
END
';

// Caratteristiche:
// - Condizione: qualsiasi Expression
// - ELSE opzionale
// - Nesting illimitato
// - Supporta interrupt/resume

// ============================================
// 2. WHILE / END
// ============================================

$while_example = '
counter = 0
WHILE counter < 10
  counter = counter + 1
  IF counter == 5
    MESSAGE "Halfway"
  END
END
';

// Caratteristiche:
// - Condizione valutata ad ogni iterazione
// - Supporta BREAK (implicito con condizione)
// - Supporta CONTINUE (implicito)
// - Supporta interrupt/resume
// - Nesting illimitato

// ============================================
// 3. FOREACH / TO / END
// ============================================

$foreach_example = '
FOREACH i = 1 TO 10
  sum = sum + i
END
';

// Caratteristiche:
// - Range numerico (from TO to)
// - Variabile iteratore automatica
// - Supporta interrupt/resume
// - Nesting illimitato

// ============================================
// 4. FUNCTION / RETURN / END
// ============================================

$function_example = '
FUNCTION factorial(n)
  IF n <= 1
    RETURN 1
  END
  RETURN n * factorial(n - 1)
END

result = factorial(5)
';

// Caratteristiche:
// - Parametri multipli
// - RETURN opzionale
// - Ricorsione supportata
// - Scope locale variabili
// - Nesting illimitato

// ============================================
// COMANDI WORKFLOW (INTERRUPT)
// ============================================

/*
1. MESSAGE Expression
2. ACCEPT Expression
3. REFUSE Expression
*/

$interrupt_example = '
amount = 1500
IF amount > 1000
  MESSAGE "Richiede approvazione manager"
  IF managerApproved == "YES"
    ACCEPT "approved_by_manager"
  ELSE
    REFUSE "rejected_by_manager"
  END
ELSE
  MESSAGE "Auto-approvato"
  ACCEPT "auto_approved"
END
';

// Caratteristiche:
// - MESSAGE: interrompe, handler gestisce, resume continua
// - ACCEPT: interrompe, handler termina workflow (approvato)
// - REFUSE: interrompe, handler termina workflow (rifiutato)
// - Tutti accettano Expression come parametro

// ============================================
// OPERATORI
// ============================================

/*
ARITMETICI:  +  -  *  /  %
CONFRONTO:   ==  !=  >  >=  <  <=
LOGICI:      AND  OR  NOT
UNARI:       -  +  NOT
*/

$operators_example = '
x = 10 + 5 * 2
y = x % 3
z = -x

IF x > 10 AND y < 5
  result = "ok"
END

IF NOT (x == 0 OR y == 0)
  result = "non-zero"
END
';

// ============================================
// TIPI DI DATI
// ============================================

/*
1. Number:  123, 45.67
2. String:  "hello", "world"
3. Boolean: risultato di confronti (true/false impliciti)
4. Array:   tramite range (1 TO 10) o passati da PHP
*/

$datatypes_example = '
num = 42
str = "hello"
range = 1 TO 10

FOREACH i IN range
  MESSAGE str
END
';

// ============================================
// FUNZIONI BUILT-IN
// ============================================

/*
MATEMATICHE:
- ABS(x)      - valore assoluto
- SQRT(x)     - radice quadrata
- ROUND(x)    - arrotonda
- FLOOR(x)    - arrotonda per difetto
- CEIL(x)     - arrotonda per eccesso

STRINGHE:
- UPPER(s)    - maiuscolo
- LOWER(s)    - minuscolo
- LENGTH(s)   - lunghezza
- TRIM(s)     - rimuove spazi

ARRAY:
- SIZE(arr)   - dimensione
- PUSH(arr,x) - aggiungi elemento
- POP(arr)    - rimuovi ultimo
*/

$builtin_example = '
x = ABS(-5)
name = UPPER("mario")
len = LENGTH(name)
';

// ============================================
// KEYWORDS RISERVATE
// ============================================

/*
WHILE
FUNCTION
RETURN
FOREACH
MESSAGE
ACCEPT
REFUSE
ELSE
AND
OR
NOT
END
IF
TO
*/

// ============================================
// SINTASSI COMPLETA
// ============================================

$complete_example = '
FUNCTION processOrder(amount, customer)
  MESSAGE "Elaborazione ordine"
  
  IF amount <= 0
    REFUSE "invalid_amount"
  END
  
  discount = 0
  IF amount > 1000
    discount = amount * 0.1
  END
  
  total = amount - discount
  
  attempts = 0
  WHILE attempts < 3
    MESSAGE "Tentativo pagamento"
    attempts = attempts + 1
    
    IF paymentSuccess == "YES"
      MESSAGE "Pagamento completato"
      ACCEPT "order_completed"
    END
  END
  
  REFUSE "payment_failed"
END

result = processOrder(1500, "Mario")
';

// ============================================
// NESTING E COMBINAZIONI
// ============================================

$nesting_example = '
FUNCTION complexLogic(n)
  FOREACH i = 1 TO n
    WHILE i < 100
      IF i % 2 == 0
        MESSAGE "Pari"
        IF i % 4 == 0
          RETURN i
        END
      END
      i = i * 2
    END
  END
  RETURN 0
END
';

// ============================================
// INTERRUPT/RESUME PATTERN
// ============================================

/*
CARATTERISTICHE:
✅ ProgramCounter traccia esecuzione
✅ Interrupt preserva stato variabili
✅ Resume riprende da istruzione successiva
✅ Handler può modificare variabili
✅ Funziona in tutte le strutture (IF, WHILE, FOREACH, FUNCTION)
✅ Nesting illimitato supportato
*/

// ============================================
// RIEPILOGO GRAMMATICA
// ============================================

/*
Program:
  Statement+

Statement:
  - FunctionDef
  - IfStatement
  - WhileStatement
  - ForeachStatement
  - MessageStmt
  - AcceptStmt
  - RefuseStmt
  - ReturnStmt
  - Assignment

Expression:
  Logical → Comparison → Additive → Multiplicative → Unary → Primary

Primary:
  - FunctionCall
  - String
  - Number
  - Identifier
  - (Expression)

FunctionCall:
  Identifier(ArgumentList?)

IfStatement:
  IF Expression Statement+ (ELSE Statement+)? END

WhileStatement:
  WHILE Expression Statement+ END

ForeachStatement:
  FOREACH Identifier = Expression TO Expression Statement+ END

FunctionDef:
  FUNCTION Identifier(ParameterList?) Statement+ END

InterruptStmt:
  MESSAGE Expression
  ACCEPT Expression
  REFUSE Expression

ReturnStmt:
  RETURN Expression?

Assignment:
  Identifier = Expression
*/

// ============================================
// TOTALE FEATURES IMPLEMENTATE
// ============================================

/*
STRUTTURE DI CONTROLLO:     4 (IF, WHILE, FOREACH, FUNCTION)
COMANDI WORKFLOW:           3 (MESSAGE, ACCEPT, REFUSE)
OPERATORI:                 16 (aritmetici, confronto, logici, unari)
FUNZIONI BUILT-IN:         12 (math, string, array)
KEYWORDS RISERVATE:        14
TIPI SUPPORTATI:            4 (number, string, boolean, array)

FEATURES AVANZATE:
✅ Nesting illimitato
✅ Ricorsione
✅ Scope variabili
✅ Interrupt/Resume
✅ ProgramCounter
✅ Gestione input utente
✅ Workflow management
*/

// ============================================
// ESEMPIO COMPLETO WORKFLOW
// ============================================

$workflow_complete = '
FUNCTION validateAndProcess(orderId, amount)
  MESSAGE "Inizio validazione ordine"
  
  IF amount <= 0
    REFUSE "invalid_amount"
  END
  
  IF amount > 10000
    MESSAGE "Richiede approvazione CEO"
    IF ceoApproval != "YES"
      REFUSE "ceo_rejected"
    END
  END
  
  attempts = 0
  WHILE attempts < 3
    MESSAGE "Tentativo elaborazione"
    attempts = attempts + 1
    
    IF processingSuccess == "YES"
      MESSAGE "Ordine elaborato con successo"
      ACCEPT "order_processed"
    END
  END
  
  REFUSE "processing_failed"
END

result = validateAndProcess(12345, 15000)
';

echo "PESM Grammar - Strutture di Controllo Implementate\n";
echo "===================================================\n\n";
echo "✅ IF/ELSE/END\n";
echo "✅ WHILE/END\n";
echo "✅ FOREACH/TO/END\n";
echo "✅ FUNCTION/RETURN/END\n";
echo "✅ MESSAGE/ACCEPT/REFUSE (Interrupts)\n";
echo "✅ Operatori: aritmetici, confronto, logici, unari\n";
echo "✅ Funzioni built-in: 12\n";
echo "✅ Interrupt/Resume pattern completo\n";
echo "✅ ProgramCounter per tracciamento esecuzione\n";
echo "✅ Nesting illimitato\n";
echo "✅ Ricorsione supportata\n";
