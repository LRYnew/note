# -*- coding:utf-8 -*-

s1 = [1, 0, 1, 3, 5, -1, 6, 2]
s2 = ['A', 'b', 'c', 'Ab', 'bC']

r1 = filter(lambda x: True if x > 0 else False, s1)
r2 = filter(lambda x: x.isupper(), s2)

print(list(r1))
print(list(r2))
