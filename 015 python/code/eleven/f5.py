# -*- coding:utf-8 -*-


def count_step():
    x = 0

    def add_sep(num):
        print(x + num)
        return x + num
    return add_sep


f = count_step()
print(f.__closure__)
f(10)
f(6)