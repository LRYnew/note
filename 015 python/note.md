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

- 元组嵌套列表，元组内列表可修改
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

# 4.Dict 和 set类型

## 4.1 Dict
- dict(字典) -> Object
- len()函数  -> length属性

## 4.2 Dict 访问

- 通过 d[key] 访问key对应的value值。如果key不存在，会直接报报错：KeyError.**因此可先判断key是否存在，使用in操作符**
```
if key in d:
    print d[key]
```

- 通过自带的get()方法:d.get(key).如果key不存在，返回none。
```
d = {
    'Adam': 95,
    'Lisa': 85,
    'Bart': 59
}
print 'Adam:',d['Adam']
print 'Lisa:',d.get('Lisa')
print 'Bart:',d.get('Bart')
print d.get('new')           # none
print d['new']               # 报错
```

## 4.3 Dict 特点

- dict的第一个特点是查找速度快，无论dict有10个元素还是10万个元素，查找速度都一样。而list的查找速度随着元素增加而逐渐下降。**缺点:占用内存大，list与之相反**

- 存储是无序的。

- key的元素是不可变的。

## 4.4 Dict 更新数据

- dict是可变的,使用赋值语句

## 4.5 Dict 遍历

- for循环遍历
```
d = {
    'Adam': 95,
    'Lisa': 85,
    'Bart': 59
}
for key in d:
    print key,":",d[key]
```

## 4.5 set

- set 持有一系列元素，这一点和 list 很像，但是set的元素没有重复，而且是无序的，这点和 dict 的 key很像。创建 set 的方式是调用 set() 并传入一个 list，list的元素将作为set的元素：
```
s = set(['a','b','c','c'])

print s                  
# set(['a','b','c']),去除重复
```

## 4.6 set 访问
- 由于set存储的是无序集合，所以我们没法通过索引来访问。访问 set中的某个元素实际上就是判断一个元素是否在set中:**in**.**不识别大小写**
```
s = set(['adam','bart'])
print 'adam' in s
print 'bart' in s
```

## 4.7 set 的特点
- set的内部结构和dict很像，唯一区别是不存储value，因此，判断一个元素是否在set中速度很快。

- set存储的元素和dict的key类似，必须是不变对象，因此，任何可变对象是不能放入set中的。

- set存储的元素也是没有顺序的。
```
# 比较繁琐的写法
x = '???' # 用户输入的字符串
if x!= 'MON' and x!= 'TUE' and x!= 'WED' ... and x!= 'SUN':
    print 'input error'
else:
    print 'input ok'

# 优化写法
weekdays = set(['MON', 'TUE', 'WED', 'THU', 'FRI', 'SAT', 'SUN'])
x = '???' # 用户输入的字符串
if x in weekdays:
    print 'input ok'
else:
    print 'input error'
```
```
months = set(['Jan','Feb','Mar','Apr','May','June','July','Aug','Sept','Oct','Nov','Dec'])
x1 = 'Feb'
x2 = 'Sun'

if x1 in months:
    print 'x1: ok'
else:
    print 'x1: error'

if x2 in months:
    print 'x2: ok'
else:
    print 'x2: error'
```

## 4.8 遍历 set
- for 循环遍历
```
s = set([('Adam', 95), ('Lisa', 85), ('Bart', 59)])
for x in s:
    print x[0],":",x[1]
```

## 4.9 更新 set

- 把新元素添加到set，set的add()方法。如果添加的元素已经存在于set中，add()不会报错，但是不会加进去了.
```
>>> s = set([1, 2, 3])
>>> s.add(3)
>>> print s
set([1, 2, 3])
```

- 从set删除旧元素,用set的remove()方法,如果删除的元素不存在set中，remove()会报错：
```
# 针对下面的set，给定一个list，对list中的每一个元素，如果在set中，就将其删除，如果不在set中，就添加进去。
s = set(['Adam', 'Lisa', 'Paul'])
L = ['Adam', 'Lisa', 'Bart', 'Paul']
for name in L:
    if name in s:
        s.remove(name)
    else:                             # 注意冒号
        s.add(name)
print s
```

# 5. 函数

## 5.1 内置函数
- abs()...，数学函数

- cmp()  比较函数，需传入两个参数

- int()...,类型转化函数
```
# sum()函数接受一个list作为参数，并返回list所有元素之和。请计算 1*1 + 2*2 + 3*3 + ... + 100*100。

L = []
x = 1
while (x<=100):
    L.append(x*x)
    x+=1
print sum(L)
```

## 5.2 编写函数
- 定义函数用def语句：函数名、括号中参数、冒号、函数体（返回值用return）
```
# 请定义一个 square_of_sum 函数，它接受一个list，返回list中每个元素平方的和。

def square_of_sum(L):
    x=0
    for num in L:
        x += num*num
    return x

print square_of_sum([1, 2, 3, 4, 5])
print square_of_sum([-5, 0, 5, 15, 25])
```

## 5.3 返回多值函数
```
# math包提供了sin()和 cos()函数，我们先用import引用它：

import math
def move(x, y, step, angle):
    nx = x + step * math.cos(angle)
    ny = y - step * math.sin(angle)
    return nx, ny

>>> x, y = move(100, 100, 60, math.pi / 6)
>>> print x, y
151.961524227 70.0

# 但其实这只是一种假象，Python函数返回的仍然是单一值：
>>> r = move(100, 100, 60, math.pi / 6)
>>> print r
(151.96152422706632, 70.0)
#用print打印返回结果，原来返回值是一个tuple！
```
- 在语法上，返回一个tuple可以省略括号，而多个变量可以同时接收一个tuple，按位置赋给对应的值，所以，Python的函数返回多值其实就是返回一个tuple，但写起来更方便。
```
# 一元二次方程的定义是：ax² + bx + c = 0,请编写一个函数，返回一元二次方程的两个解。

# 参考求根公式：x = (-b±√(b²-4ac)) / 2a

import math

def quadratic_equation(a, b, c):
    t = math.sqrt(b*b-4*a*c)
    return (-b + t)/(2*a),(-b - t)/(2*a)

print quadratic_equation(2, 3, 0)
print quadratic_equation(1, -6, 5)
```

## 5.4 递归函数

- 在函数内部，可以调用其他函数。如果一个函数在内部调用自身本身，这个函数就是递归函数。

## 5.5 默认参数

- 由于函数的参数按从左到右的顺序匹配，所以默认参数只能定义在必需参数的后面：
```
# OK:
def fn1(a, b=1, c=2):
    pass
# Error:
def fn2(a=1, b):
    pass
```
```
# 请定义一个 greet() 函数，它包含一个默认参数，如果没有传入，打印 'Hello, world.'，如果传入，打印 'Hello, xxx.'
def greet(t = 'world'):
    print 'Hello,' + t + '.'

greet()
greet('Bart')
```

## 5.6 可变参数
可变参数的名字前面有个 * 号，我们可以传入0个、1个或多个参数给可变参数.可变参数也不是很神秘，Python解释器会把传入的一组参数组装成一个tuple传递给可变参数，因此，在函数内部，直接把变量 args 看成一个 tuple 就好了。
```
def fn(*args):
    print args
```
```
def average(*args):
    sum = 0.0
    if len(args) == 0:
        return sum
    for x in args:
        sum = sum + x
    return sum / len(args)
print average()
print average(1, 2)
print average(1, 2, 2, 3, 4)
```

# 6. 切片

## 6.1 对list进行切片（tuple类似）

- 取list前3个元素 L[0:3] -> 取0、1、2个元素。
- ":"前0可以省略，表示从0开始取;第二参数省略表示到末尾。
- 传入第三个元素L[0:10:2] -> 表示每间隔2取一个。
```
# 1. 前10个数；
# 2. 3的倍数；
# 3. 不大于50的5的倍数。
L = range(1, 101)

print L[0:10]
print L[2::3]
print L[4:51:5]
```

## 6.2 倒序切片
- 倒数第一个元素的索引是**-1**
```
>>> L = ['Adam', 'Lisa', 'Bart', 'Paul']

>>> L[-2:]
['Bart', 'Paul']

>>> L[:-2]
['Adam', 'Lisa']

>>> L[-3:-1]
['Lisa', 'Bart']

>>> L[-4:-1:2]
['Adam', 'Bart']
```
```
# 最后10个数；

# 最后10个5的倍数。
L = range(1, 101)
print L[-10:]
print L[-46::5]
```

## 6.3 对字符串切片
- Python没有针对字符串的截取函数，只需要切片一个操作就可以完成，非常简单
```
#设计一个函数，它接受一个字符串，然后返回一个仅首字母变成大写的字符串
def firstCharUpper(s):
    return s[:1].upper() + s[1:]

print firstCharUpper('hello')
print firstCharUpper('sunday')
print firstCharUpper('september')
```

# 7. 迭代

## 7.1 迭代
- 在Python中，如果给定一个list或tuple，我们可以通过for循环来遍历这个list或tuple，这种遍历我们成为迭代（Iteration）。

## 7.2 索引迭代
- 有序集合，元素确实是有索引的。有的时候，我们确实想在 for 循环中拿到索引，使用枚举函数 enumerate()
```
for index,name in enumerare(L):
    print index + '-' + name
```

- 实际上enumerate() 函数把：
```
['Adam', 'Lisa', 'Bart', 'Paul']

# 变成了类似：

[(0, 'Adam'), (1, 'Lisa'), (2, 'Bart'), (3, 'Paul')]

# 因此，迭代的每一个元素实际上是一个tuple：
for t in enumerate(L):
    index = t[0]
    name = t[1]
    print index, '-', name
```
```
# zip()函数可以把两个 list 变成一个 list：
>>> zip([10, 20, 30], ['A', 'B', 'C'])
[(10, 'A'), (20, 'B'), (30, 'C')]

# 在迭代 ['Adam', 'Lisa', 'Bart', 'Paul'] 时，如果我们想打印出名次 - 名字（名次从1开始)，请考虑如何在迭代中打印出来
L = ['Adam', 'Lisa', 'Bart', 'Paul']
for index, name in zip(range(1,len(L)+1),L):
    print index, '-', name
```

## 7.3 Dict迭代value

-  values() 方法
```
d = { 'Adam': 95, 'Lisa': 85, 'Bart': 59 }
print d.values()
# [85, 95, 59]
for v in d.values():
    print v
# 85
# 95
# 59
```

- itervalues() 方法

- 区别: values() 方法实际上把一个 dict 转换成了包含 value 的list; itervalues() 方法不会转换，它会在迭代过程中依次从 dict 中取出 value，所以**itervalues() 方法比 values() 方法节省了生成 list 所需的内存**。

## 7.4 Dict迭代key,value

- item() 方法

- iteritems() 方法

- 区别:同上
```
d = { 'Adam': 95, 'Lisa': 85, 'Bart': 59, 'Paul': 74 }

sum = 0.0
for k, v in d.iteritems():
    sum = sum + v
    print str(k)+':'+str(v)
print 'average', ':', sum/len(d)
```

# 8. 生成列表

## 8.1 生成列表

- 如果要生成[1x1, 2x2, 3x3, ..., 10x10]怎么做？方法一是循环：
```
>>> L = []
>>> for x in range(1, 11):
...    L.append(x * x)
... 
>>> L
[1, 4, 9, 16, 25, 36, 49, 64, 81, 100]
```

- 但是循环太繁琐，而列表生成式则可以用一行语句代替循环生成上面的list：
```
>>> [x * x for x in range(1, 11)]
[1, 4, 9, 16, 25, 36, 49, 64, 81, 100]
```
```
# 请利用列表生成式生成列表 [1x2, 3x4, 5x6, 7x8, ..., 99x100]

# 提示：range(1, 100, 2) 可以生成list [1, 3, 5, 7, 9,...]

print [x * (x+1) for x in range(1,100,2)]
```

## 8.2 复杂列表生成
```
d = { 'Adam': 95, 'Lisa': 85, 'Bart': 59 }

# 可以通过一个复杂的列表生成式把它变成一个 HTML 表格：

tds = ['<tr><td>%s</td><td>%s</td></tr>' % (name, score) for name, score in d.iteritems()]
print '<table>'
print '<tr><th>Name</th><th>Score</th><tr>'
print '\n'.join(tds)
print '</table>'

# 注：字符串可以通过 % 进行格式化，用指定的参数替代 %s。字符串的join()方法可以把一个 list 拼接成一个字符串。
```

## 8.3 条件过滤
- 列表生成式的 for 循环后面还可以加上 if 判断。

```
# 如果我们只想要偶数的平方，不改动 range()的情况下，可以加上 if 来筛选：

>>> [x * x for x in range(1, 11) if x % 2 == 0]
[4, 16, 36, 64, 100]
```
```
# 请编写一个函数，它接受一个 list，然后把list中的所有字符串变成大写后返回，非字符串元素将被忽略。

# 提示：

# 1. isinstance(x, str) 可以判断变量 x 是否是字符串；

# 2. 字符串的 upper() 方法可以返回大写的字母。

def toUppers(L):
    return [x.upper() for x in L if isinstance(x, str)]
print toUppers(['Hello', 'world', 101])
```

## 8.4 多层表达式

- for循环可以嵌套，因此，在列表生成式中，也可以用多层 for 循环来生成列表。
```
>>> [m + n for m in 'ABC' for n in '123']
['A1', 'A2', 'A3', 'B1', 'B2', 'B3', 'C1', 'C2', 'C3']

# 翻译成循环代码就像下面这样：
L = []
for m in 'ABC':
    for n in '123':
        L.append(m + n)
```
```
# 利用 3 层for循环的列表生成式，找出对称的 3 位数。例如，121 就是对称数，因为从右到左倒过来还是 121。
print [x*100 + y*10 + z for x in range(1,10) for y in range(0,10) for z in range(0,10) if x==z]

# 别人写法
print [x*100+y*10+x for x in range(1,10) for y in range(0,10)]
```