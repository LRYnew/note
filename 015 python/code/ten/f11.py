# -*- coding:utf-8 -*-
import re

s = 'Python C# Java Javascript C#+C#6'


# 定义convert函数
def convert(value):
    # 查看value值 >>> 为一个对象
    print(value)
    matched = value.group()
    return '[' + matched + ']'


# 字符直接替换,无限次
r1 = re.sub('c#', 'GO', s, 0, re.I)
print(r1)

r2 = re.sub('c#', 'GO', s, 2, re.I)
print(r2)

# 函数替换
r3 = re.sub('C#', convert, s)
print(r3)