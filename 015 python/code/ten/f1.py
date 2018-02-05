# -*- coding:utf-8 -*-
import re

LANGUAGE = 'C | C++ | Python | JavaScript | Java | C# | php'
LANGUAGE2 = 'C 2 C++ 0 Python 7 JavaScript 9 Java 10 C# 27 php'

r = re.findall('Python', LANGUAGE)
print(r)

if len(r) > 0:
    print('Language 语言存在 Pyhon')
else:
    print('不好意思，让您失望了~')

s1 = re.findall('\d', LANGUAGE2)
s2 = re.findall('\D', LANGUAGE2)
print(s1)
print(s2)
