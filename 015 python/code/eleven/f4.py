# -*- coding:utf-8 -*-


def cover_pef():
    a = 25

    def cover(x):
        return a * (x ** 2)
    return cover


a = 10
f = cover_pef()
print(f(2))
print(f.__closure__)
print(f.__closure__[0].cell_contents)
