# -*- coding: utf-8 -*-
a = {1, 2, 3}
b = {2, 1, 3}
print(a == b)
#  >>> True
print(a is b)
#  >>> False

c = (1, 2, 3)
d = (2, 1, 3)
print(c == d)
#  >>> False
print(c is d)
#  >>> False

print(type(a))
