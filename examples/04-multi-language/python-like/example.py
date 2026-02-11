# Python-like sum
numbers = [1, 2, 3, 4, 5]
total = 0

for i in range(0, 4):
    total = total + numbers[i]
end

config = {"debug": 1, "max": 100}

if config["debug"] == 1:
    status = "debug_mode"
end
