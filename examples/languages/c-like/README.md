# C-like Language for PESM

Linguaggio simile a C con sintassi moderna.

## Caratteristiche

- ✅ Blocchi con `{}`
- ✅ Semicolon obbligatorio
- ✅ if/else con parentesi
- ✅ while loops
- ✅ Array literals `[1, 2, 3]`
- ✅ Array access `arr[i]`
- ✅ Operatori: &&, ||, ==, !=, <, >, <=, >=
- ✅ print() function

## Build

```bash
php build.php
```

## Esempio

```c
n = 10;
sum = 0;
i = 0;

while (i < n) {
    sum = sum + i;
    i = i + 1;
}

print("Done");
```
