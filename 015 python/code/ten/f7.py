# -*- conding:utf-8 -*-
import re

QQ = '9415303453a87472830294'

r1 = re.findall('\d{6,9}', QQ)
r2 = re.findall('^\d{6,9}', QQ)
r3 = re.findall('\d{6,9}$', QQ)
r4 = re.findall('^\d{6,9}$', QQ)

print(r1)
print(r2)
print(r3)
print(r4)
