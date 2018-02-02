# -*- coding: utf-8 -*-


def add(*args):
    n = 0
    print(type(args), args)
    for i in args:
        n += i
    print(n)


add(1, 2, 3, 4, 5)
