C     FORTRAN-style factorial calculation
      N = 5
      RESULT = 1
      I = 1

10    IF (I .GT. N) GOTO 20
      RESULT = RESULT * I
      I = I + 1
      GOTO 10

20    WRITE(*,*) "Factorial computed"
