# 1. 第一个python

- 文件后缀 .py
```
// 首行不能有空格
print ('hello world');
```

# 2. python 变量和数据类型

## 2.1 数据类型

- 整数
    - 十六进制使用使用0x前缀 + 0-9、a-f 表示.

- 浮点数
    - e表示法  123e9 = 123 * 10^9

- 字符串

- 布尔值
    - and
    - or
    - not

- 空值
    - None表示，不能理解为0.

```
print 45678 + 0x12fd2;
print 'Learn Python in imooc';
print 100<90;
print 0xff == 255;
print None;
print none; //报错，应该用字符串输出
```

## 2.2 print语句

- 可以向屏幕输出指定的文字。可以**同时跟上多个字符串**，用逗号(,)隔开，输出时会连成一串，遇到逗号会打出一个空格。

## 2.3 注释

- python的注释用井号符'#'

## 2.4 变量

- 变量名:字母、数字和下划线的组合，且首位不能为数字。
- 同一个变量可以反复赋值，不限定数据类型。 变量本身类型不固定的语言为动态类型语言，对应的就为静态类型语言。

## 2.5 转义符 \

- 字符串中表示‘ “等

- \n 换行

- \t 制表符(类似word中使用tab键)

- \\ 表示\本身

## 2.6 raw字符串 和 多行字符串

- 对于字符串中存在多处需要转义时，可在字符串前添加 r'...',减少转义符的使用。

- 多行字符串可以使用 \```...\``` 包围。

```
print r'''"To be, or not to be": that is the question.
Whether it's nobler in the mind to suffer.'''

//输出结果
"To be, or not to be": that is the question.
Whether it's nobler in the mind to suffer.
```

## 2.7 Unicode字符串

- 以Unicode表示的字符串用 u'...' 表示

- 如果中文在.py文件中遇到乱码问题，请在第一行添加  # -\*- conding:utf-8 -\*-,并把文件保存为utf-8格式。
```
print u'''
静夜思
床前明月光，
疑是地上霜。
举头望明月，
低头思故乡。'''

// 输出
静夜思
床前明月光，
疑是地上霜。
举头望明月，
低头思故乡。
```
## 2.8 整数和浮点数运算
- 整数和整数运算，结果为整数
- 浮点数和浮点数运算，结果为浮点数
- 整数和浮点数运算，结果为浮点数
```
print 2.5 + 10/4;   # 4.5，10/4  为整数运算，得出结果为2
print 2.5 + 10.0/4; # 5.0
```

## 2.9 布尔计算
- 与 and
- 或 or
- 非 not
- 短路规则
```
a = True                      # true 小写报错
print a and 'a=T' or 'a=F'    # 与和或混合运算

// a=T
```
## 2.10 python列表list

### 2.10.1 创建
- 列表 list 是python内置的一种数据类型，是一种有序列表。
```
L = ['Adam', 95.5, 'Lisa', 85, 'Bart', 59]
print L

# ==> ['Adam', 95.5, 'Lisa', 85, 'Bart', 59]
```

### 2.10.2 索引查找
```
// 正序索引，从0开始
L = [95.5,85,59]
print L[0]     # 95.5
print L[1]     # 85
print L[2]     # 59
print L[3]     # 超过索引总数，报错
```

```
// 倒序索引
L = [95.5,85,59]
print L[-1]     # 95.5
print L[-2]     # 85
print L[-3]     # 59
print L[-4]     # 超过索引总数，报错
```

### 2.10.3 添加元素

- append(): 添加到末尾

- insert(索引位置,添加内容): 添加在任意位置
```
L = ['Adam', 'Lisa', 'Bart']
L.insert(2,'Paul');
print L
```

### 2.10.4 删除元素
- pop(索引位置):不带参数，默认删除最后一个元素，并且返回这个元素
```
L = ['Adam', 'Lisa', 'Paul', 'Bart']
L.pop(2)
L.pop(2)
print L
```

### 2.10.5 替换元素
- 直接根据索引进行替换
```
L = ['Adam', 'Lisa', 'Bart']
a = L[-1];
L[-1] = L[0];
L[0] = a;
print L;
```

## 2.11 元组 tuple
- tuple:有序列表,与list类似，可读取不可修改。用()进行定义。
```
t = tuple(range(0,10));

print t
print t[9]
t[9] = t[1] # 报错
```

- 单元素tuple 最后用一个逗号结束，以免引起歧义。
```
t = ('Adam',)
print t
```

- 元组嵌套列表，元组内列表可表
```
t = ('a', 'b', ['A', 'B'])
L = t[2]
L[0] = 'X'
L[1] = 'Y'
print t

# ==> ('a', 'b', ['X', 'Y'])

// 元组嵌套元组
t = ('a', 'b', ('A', 'B'))
```

# 3. 条件判断和循环
## 3.1 if语句
- if 语句开始, ":" 表示代码块开始。(同一缩进表示同一代码块，统一用4个空格)。
```
age = 20;
if age > 18:
    print 'your age is', age
    print 'adult'
print 'END'
``` 

## 3.2 if-else
```
score = 55
if score >= 60:
    print 'passed'
else:
    print 'failed'
```

## 3.3 if-elif-elif-else
```
score = 85

if score >= 90:
    print 'excellent'
elif score>=80 and score < 90:
    print 'good'
elif score >=60 and score <80:
    print 'passed'
else:
    print 'failed'

# 因为从上往下判断，可简化为
score = 85
if score >= 90:
    print 'excellent'
elif score >= 80:
    print 'good'
elif score >= 60:
    print 'passed'
else:
    print 'failed'
```

## 3.4 for 循环
- 迭代循环
- 格式:
```
# example 1
L = ['Adam', 'Lisa', 'Bart']
for name in L:
    print name   # name 是在for内定义的变量

# example 2
L = [75, 92, 59, 68]
sum = 0.0
for score in L:
    sum += score
print sum / 4
```
## 3.5 while 循环
- 根据条件进行循环
- 格式
```
# while 条件:
#     循环体

# 100 以内奇数之和
# 方式一: 自己想
sum = 0
x = 1
while x < 100:
    if x%2 == 1:
        sum+=x
    x+=1
print sum

# 方式二: 提供
sum = 0
x = 1
while x < 100:
    sum+=x
    x+=2
print sum
```

## 3.6 break 退出循环
```
# 计算 1 + 2 + 4 + 8 + 16 + ... 的前20项的和
sum = 0
x = 1
n = 1
while True:
    if n > 20:
        break
    sum = sum + x
    x = x * 2
    n = n + 1
print sum
```

## 3.7 continue 退出循环
```
sum = 0
x = 0
while True:
    x = x + 1
    if x > 100:
        break
    if x % 2==0:
        continue
    sum = sum+x
print sum
```

## 3.8 嵌套循环
```
# 对100以内的两位数，请使用一个两重循环打印出所有十位数数字比个位数数字小的数，例如，23（2 < 3）。

for x in [1,2,3,4,5,6,7,8,9 ]:
    for y in [0,1,2,3,4,5,6,7,8,9 ]:
        if x < y:
            print x*10+y
```