# -*- coding:utf-8 -*-
import re

a = 'life is short,i use python'

r = re.search('life(.*)python', a, re.I)
r2 = re.findall('life(.*)python', a, re.I)
print(r)
print(r.group())
print(r.group(1))
print(r2)