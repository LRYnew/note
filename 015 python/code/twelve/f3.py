# -*- coding:utf-8 -*-
from functools import reduce

list_x = [1, 2, 3, 4, 5, 6, 7, 8]

result = reduce(lambda x, y: x * y + y, list_x)

print(result)
