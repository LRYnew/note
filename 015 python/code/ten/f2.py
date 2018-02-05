# -*- coding:utf-8 -*-
import re

s = 'abc, acc, adc, aec, afc, agc'

r1 = re.findall('a[cdf]c', s)
print(r1)

r2 = re.findall('a[^df]c', s)
print(r2)

r3 = re.findall('a[c-e]c', s)
print(r3)
