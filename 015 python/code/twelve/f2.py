x = [1, 2, 3, 4, 5, 6, 7, 8]


def square(x):
    return x**2


y = map(square, x)

print(list(y))
print(y)

x = [1, 2, 3, 4, 5, 6, 7, 8]

y = map(lambda x: x * x, x)

print(list(y))

x = [1, 2, 3, 4, 5, 6, 7, 8]

y = [8, 7, 6, 5, 4, 3]

r = map(lambda x, y: x * x + y, x, y)

print(list(r))