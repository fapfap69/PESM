# Python-like Language for PESM

Python-style senza indentazione obbligatoria (usa `end`).

## Caratteristiche

- ✅ if/else con `:` e `end`
- ✅ while loops
- ✅ for...in range()
- ✅ List literals `[1, 2, 3]`
- ✅ Dict literals `{"key": value}`
- ✅ Array/dict access con `[]`
- ✅ Operatori: and, or, ==, !=, <, >, <=, >=
- ✅ String con `"` o `'`

## Build

```bash
php build.php
```

## Esempio

```python
numbers = [10, 20, 30]
total = 0

for i in range(0, 2):
    total = total + numbers[i]
end

if total > 50:
    result = "high"
else:
    result = "low"
end
```
