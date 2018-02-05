# -*- coding:utf-8 -*-
import re

s = 'python &java9a6782php'

r1 = re.findall('[a-z]{3,6}', s)
r2 = re.findall('[a-z]{3,6}?', s)
print(r1)
print(r2)
