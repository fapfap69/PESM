# Assembly-like Language for PESM

Linguaggio assembly semplificato con mnemonici classici.

## Caratteristiche

- ✅ MOV - Move/assign value
- ✅ ADD, SUB, MUL - Arithmetic
- ✅ CMP - Compare
- ✅ JMP - Unconditional jump
- ✅ JE, JNE, JG - Conditional jumps
- ✅ OUT - Output
- ✅ Label con `:`

## Build

```bash
php build.php
```

## Esempio

```asm
; Calculate sum
        MOV SUM, 0
        MOV I, 1

LOOP:   CMP I, 10
        JG DONE
        ADD SUM, I
        ADD I, 1
        JMP LOOP

DONE:   OUT "Sum calculated"
```
