# -*- coding:utf-8 -*-
import re

a = 'Python C#pHp\n9667jAVA'

r1 = re.findall('c#', a, re.I)
r2 = re.findall('php.{1}', a, re.I | re.S)

print(r1)
print(r2)
