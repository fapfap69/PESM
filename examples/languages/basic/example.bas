REM Sum of numbers from 1 to 10

LET SUM = 0
LET I = 1

LOOP:
IF I > 10 THEN GOTO DONE
LET SUM = SUM + I
LET I = I + 1
GOTO LOOP

DONE:
PRINT "Sum calculated"
END
