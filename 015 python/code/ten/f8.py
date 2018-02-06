# -*- coding:utf-8 -*-
import re

s = "PythonPythonPythonPythonPythonJSJS"

r1 = re.findall('PythonPythonPython', s)
r2 = re.findall('Python{3}', s)
r3 = re.findall('(Python){3}', s)
r4 = re.findall('(Python){3}(JS){2}', s)

print(r1)
print(r2)
print(r3)
print(r4)
