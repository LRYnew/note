# -*- coding:utf-8 -*-
import re

s = 'python & 996 \n\r\t\v 74233.javascript'

r1 = re.findall('\w', s)
r2 = re.findall('\W', s)
r3 = re.findall('\s', s)
r4 = re.findall('\S', s)

print(r1)
print(r2)
print(r3)
print(r4)
