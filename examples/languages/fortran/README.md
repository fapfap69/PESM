# FORTRAN-like Language for PESM

FORTRAN classico con label numerici e operatori logici con punti.

## Caratteristiche

- ✅ Label numerici (10, 20, etc.)
- ✅ GOTO con label numerici
- ✅ IF (condition) statement
- ✅ Operatori: .EQ., .NE., .GT., .GE., .LT., .LE.
- ✅ WRITE(*,*) per output
- ✅ DO loops
- ✅ Variabili uppercase

## Build

```bash
php build.php
```

## Esempio

```fortran
C     Calculate sum
      SUM = 0
      I = 1

10    IF (I .GT. 10) GOTO 20
      SUM = SUM + I
      I = I + 1
      GOTO 10

20    WRITE(*,*) "Done"
```
