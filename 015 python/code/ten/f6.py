# -*- coding:utf-8 -*-
import re

s = 'pyth0python1pythonn2'

r1 = re.findall('python*', s)
r2 = re.findall('thon+', s)
r3 = re.findall('python?', s)
r4 = re.findall('fython*', s)
print(r1)
print(r2)
print(r3)
print(r4)
