# -*- coding:utf-8 -*-
import re

s = 'ac,abfc, acfc, adfc, aefc, affc, agfc'

r1 = re.findall('a.+c+', s)
print(r1)

r2 = re.findall('a[^df]c', s)
print(r2)

r3 = re.findall('a[c-e]c', s)
print(r3)
