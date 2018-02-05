# -*- coding:utf-8 -*-
import re

LANGUAGE = 'C | C++ | Python | JavaScript | Java | C# | php'

r = re.findall('Python', LANGUAGE)
print(r)

if len(r) > 0:
    print('Language 语言存在 Pyhon')
else:
    print('不好意思，让您失望了~')
