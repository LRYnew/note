# -*- coding:utf-8 -*-
import re

a = 'A738R547DD8DR92345567QQ'

r = re.match('\d', a)
print(r)

r2 = re.search('\d', a)
print(r2)