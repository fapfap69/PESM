; Assembly-style counter
        MOV COUNTER, 0
        MOV LIMIT, 5

LOOP:   CMP COUNTER, LIMIT
        JE DONE
        ADD COUNTER, 1
        JMP LOOP

DONE:   OUT "Complete"
