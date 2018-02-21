# 列表生成式

a = [1, 2, 3, 4, 5, 6, 7, 8, 9]

b = [i**2 for i in a]
c = [i**2 for i in a if i > 5]
d = {i**2 for i in a if i > 5}

print(b)
print(c)
print(d)

di = {
    "果小妹": 20,
    "西小伙": 21,
    "狼小弟": 22
}

dic = { value:key for key, value in di.items()}

print(dic)