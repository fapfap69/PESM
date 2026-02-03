// C-like factorial
n = 5;
result = 1;
i = 1;

while (i <= n) {
    result = result * i;
    i = i + 1;
}

if (result > 100) {
    print("Large result");
} else {
    print("Small result");
}
