# 1. 数据类型

## 1.1 数字 Number

1. 特殊 >>> 除法:  int/int = float
```
print (type(2/2))  # >>> float

# 解决办法: 在添加一个"/"号
print (type(2//2)) # >>> int
```
> 注意: // 为整除，只保留整数部分

2. 进制

- 二进制:0b
- 八进制:0o
- 十六进制:0x

3. 进制转换
- 二进制:bin()
- 八进制:oct()
- 十进制:int()
- 十六进制:hex()

4. boolean - 布尔： 首字母大写
- 类型转换:bool()方法

5. complex - 复数表示:"j" >>> 例如:36j

## 1.2 字符串 String

1. 表示方法

- 单引号
- 双引号
- 三引号:多行字符串

2. 转义符
- 字符串内对特殊符号转义
- 末尾换行
```
'hello\
world\
!'
``` 

3. 转义字符

- 无法“看见”的字符，例如回车
- 与语法本身有冲突的字符

| 转义符 |含义    |
| ----- | -----   |
| \n    | 换行      |
| \'    | 单引号      |
| \t    | 横向制表符      |
|...    | ... |

4. 原始字符串
- r'字符串',避免字符串内多次使用转义符

5. 字符串运算

- "+": 字符串拼接
- "*": 重复
```
'hello' * 3
# >>> 'hellohellohello'

'hello' * 'world'
# >>> error
```
- 字符串切片:正序、倒序、间隔（都可省略）
```
'hello world'[0:5]
# >>> hello

'hello world'[6:-1]
# >>> worl

'hello world'[::2]
# >>> hlowrd
```

6. 字符串内混合变量 %s
```
a = '966'
b = '742'

c = 'This i %s and %s' % (a, b)

print(c)
# This i 966 and 742
```

6. ASCLL 码

- ord() 方法可以转换为ascll码

## 1.3 组

### 1.3.1 序列
1. list

- 列表拼接: "+"
```
['月之降临','苍白之瀑','新月打击','月神冲刺'] + ['引燃','闪现']

# >>> ['月之降临','苍白之瀑','新月打击','月神冲刺','引燃','闪现']
```

- 列表重复: "*"
```
['月之降临','苍白之瀑'] * ['引燃','闪现']
# >>> error

['月之降临','苍白之瀑']*3    # 
# >>> ['月之降临', '苍白之瀑', '月之降临', '苍白之瀑', '月之降临', '苍白之瀑']
```

- 判断是否在序列:in  |  not in

2. tuple

- 区别: tuple内的元素 不可修改

- 避免歧义: 元组内只有单一元素时，在元素后添加","
```
type((1))    # >>> int
type((1,))   # >>> tuple
```

### 1.3.2 集合

1. set: {} 表示.（与python2定义方式有区别）。
- 无序，不支持索引、切片
- 元素不重复
- 集合特殊运算
```
s1 = {1,2,3,4,5,6}
s2 = {3,4,7}
s3 = set(1,2,3)        # >>> error,python2 语法

# 差集
print(s1-s2)    # >>> {1,2,5,6}
print(s2-s1)    # >>> {7}

# 交集
print(s1&s2)    # >>> {3,4}

# 合集/并集
print(s1|s2)    # >>> {1,2,3,4,5,6,7}

# 空集
print(set())    # >>> set()
```

### 1.3.3 字典
1. dict
- key 不重复，必须是不可变类型
- 无序，不支持索引、切片

# 2. 变量 和 运算符

## 2.1 命名规则

- 字母、数字、下划线组成
- 首字母不能为数字
- 系统关键字不能用于变量名  >>> 保留关键字
- 区分大小写
- 动态类型

## 2.2 变量类型
- 值类型: int str float tuple 
- 引用类型: list dist set

> id() 方法:获取对象的内存地址。
> 类型判断: type(var)、isinstance(var,type)。type()无法判断子类类型。
```
a = 1
isinstance(a,(int,str,list))
# 传入元祖，判断多种类型
```
## 2.3 运算符

1. 算术运算符
- "+"
- "-"
- "*"
- "/"
- "//" : 整除
- "%"
- "\*\*" : 幂  >>>  2**5 = 2的5次方

2. 赋值运算符
- =
- +=
- -=
- /=
- *=
- //=
- **=
- %=

3. 比较关系运算符
- ==
- <=
- \>=
- !=
- <
- \>
```
b = 1
print(b+=b>=b)   # >>> 2
```

4. 逻辑运算符
- and
- or
- not

5. 成员运算符
- in
- not in

6. 身份运算符
- is
- not is
```
a = 1
b = 1
c = 1.0

a == b         #  >>> True
a is b         #  >>> True
a == c         #  >>> True
a is c         #  >>> True
```
> is 不是对值的比较，是对两个变量的身份（内存地址）进行比较。
```
1 is 1         #  >>> True

a = {1,2,3}
b = {2,1,3}
a == b         #  >>> True,无序
a is b         #  >>> False,内存地址不同

c = (1,2,3)
d = (2,1,3)
c == d        #  >>> False
c is d        #  >>> False
```

7. 位运算符  >>> 把数字当做二进制进行运算
- &              按位与
- |              按位或
- ^              按位异或
- ~              按位取反
- <<             左移动
- \>\>           右移动

## 2.4 表达式

1. 表达式:运算符和表达式所构成的序列

2. 表达式优先级
```
a = 1
b = 2
c = 3
# 四则运算
a + b * c     # >>> 7

# 逻辑运算
a or b and c  # >>> 1(预测3错误，先进行“与”运算，再进行“或运算”)
```

# 3. 流程控制语句

## 3.1 条件控制
> if elif else
```
if True:
    pass            # >>> pass:占位语句/空语句
```

## 3.2 循环

1. for/for...else...(循环执行完，强制退出不执行)

- 辅助方法range()
```
# 常规
for x in range(0,10)
    print(x,end=' | ')

# 间隔
for x in range(0,10,2)
    print(x,end=' | ')

# 倒序间隔
for x in range(10,0,-2)
    print(x,end=' | ')
```

2. while/while...else...(程序结束后运行一次else代码块，强制退出不执行)，常用于递归

# 4. 组织结构

> 包(文件夹)>>>模块(文件)>>>类>>>函数 变量

1. 包(文件夹)，在文件夹内需要有一个"\_\_init__.py"文件，否则只会当成普通的文件夹。

- 引用 包名.文件名 》》》 seven.c4

- 特殊文件"\_\_init__.py"引用 》》》 直接引用包名

2. 文件导入

- import  导入模块
```
# 注意前后顺序
import f001

print(f001.a)
```

- as关键字添加别名
```
import f001 as f

print(f.a)
```

- from module import var/def...
```
# 引入变量
from study.f001 import a
print(a)

# 引入模块
from study import f001
print(f001.a)

# 引入多变量
from study.f001 import *
print(a)
print(b)
print(c)
```
> \*控制，模块内置属性"__all__"，控制模块变量输出
```
# f1.py
__all__ = ['a','b']
a = 1,
b = 2,
c = 3

# f2.py
from f1 import *
print(a)       # >>> 1
print(b)       # >>> 2
print(c)       # 报错
```

3. \_\_init__.py 文件
> 包内模块初始化文件
- 引入包或者模块，会直接执行\_\_init__.py文件
- 可在文件内定义\_\_all__

```
# t包下存在两个模块c7.py  c8.py
# __init__.py
__all__ = ['c7']      # 只定义C7可导出

# f1.py 和 同级目录

from t import *
print(c7.a)      # 正确输出
print(c8.e)      # error,__all_限制了导出的模块
```
4. 注意点
- 包和模块不会重复导入
- 避免循环导入
- 导入后，会执行模块内部代码

# 4. 函数

## 4.1 内置函数
- 设置最大递归(默认递归1000)
```
# 引入sys模块
import sys
# 设置次数
sys.setrecursionlimit(100000)
```

## 4.2 自定义函数

1. 定义关键字 def

2. 返回值关键字 return / 序列解包
```
# 返回多个值
def damage(skill1,skill2):
    damage1 = skill1 + skill2
    damage2 = skill2 * skill1
    return damage1,damage2

damages1 = damage(100,200)        # damages1 >>> type >>> tuple

# 序列解包
damage1,damage2 = damage(100,200) # damage1,damage2 >>> int
```

3. 参数
- 必须参数(必填参数)
- 关键字参数: 可以跳过参数顺序 (定义时可使用双“**”，输出字典形式数据)
```
def add(x,y):
    return x+y

result = add(y=10,x=100) 
# >>> 关键字参数，直接指定参数，跳过原有顺序限制

def addKW(**kw):
    # kw 可改变名称
    print(kw)

r = add(a=1,b=2,c=3)
print(r)
```
- 默认参数:必须参数在前，默认参数在后

- 可变参数
```
def add(*args):
    n = 0
    print(type(args), args)
    for i in args:
        n += i
    print(n)


add(1, 2, 3, 4, 5)
```

# 5.面向对象

## 5.1 类

1. 类的作用

- 基本作用:封装

2. 类的定义
```
# class ClassName():
#    类体

class Student():
    name = ''
    age = 20

    # 类内方法必须强制传入self参数
    def print_files(self):
        # 调用类变量需带上前缀self（类似js的this）
        print('name:' + self.name)
        print('age:' + str(self.age))

# 实例化
student = Student()
student.print_files()
```

3. 类与对象
> 面向对象:把实际或者思维上的事物映射到计算机的方式。类定义事物的特征和操作行为。类就像一个模板，可以产生很多个对象。
- 类:定义一种事物的群体特征、行为
- 对象:事物的具体映射（实例化）

4. 构造函数 \_\_init__(),初始化数据
- 实例化会自动调用构造函数
- 构造函数允许显示调用
- 构造函数只允许返回None
```
class Student():
    name = ''
    age = 20

    # 构造函数
    def __init__(self, name='YJob', age=18):
        self.name = name
        self.age = age
```
- 类变量:和类相关的变量
- 实例变量:和对象相关的变量

5. \_\_dict__,对象的内置属性

6. 对象变量访问机制: 尝试先访问实例变量，再访问类变量，再访问父类。**调用时机制生效**

7. self 参数，指向调用类的对象

8. 访问类变量的方式

- 类名.变量名
- self.\_\_class__.变量名

9. 定义类方法(无法调用实例变量)

- 在方法前加上修饰器  @classmethod
```
class Student():

    @classmethod
    def add_sum(cls):
        cls.sum += 1
        print('班级人数:' + str(cls.sum))
```
- 调用:
    - 实例方法内调用:self.\_\_class__.方法名
    - 类外部调用: 类名.方法名
    - 类外部调用: 对象名.方法名(不推荐)

10. 定义静态方法(无法调用实例变量，不需要强制传递参数) - 不推荐使用
- 在方法前加上修饰器  @staticmethod
```
class Student():

    @staticmethod
    def add(x, y):
        print('This is staticmethod')
```

> 静态方法的好处是，**不需要定义实例**即可使用这个方法。另外，多个实例共享此静态方法 


11. 私有定义:在方法或者变量前添加"__"双下划线

12. 可以动态添加变量,**可与私有变量同名**，但无法影响私有变量.**影响私有变量需要使用"类名._类名__变量名"**,可使用\_\_dict__查看。
```
class Student():
    sum = 0
    name = ''
    age = 20
    __score = 100    # >>> 定义私有变量

    # 类方法
    @classmethod
    def add_sum(cls):
        print(cls.__score)    # >>> 打印私有变量

Student._Student__score = -100   # >>> 外部修改私有变量
# print(student1.__dict__)

Student.add_sum()                # >>> 查看是否修改成功
```

## 5.2 继承

1. 继承 

- 子类继承父类
- 区别于其他语言:子类允许多个父类

2. 子类调用父类变量、实例方法、构造函数等

- 直接用类,例如:类名.\_\_init__(self[,args...])   >>>  需传入实例对象（不推荐 -> 不方便，容易出现错误）

- 使用super关键字: super(子类名,self).实例方法名/构造函数/变量

3. 子类变量或者方法与父类同名时，优先调用子类变量，方法。

![python类 思维导图](./code/nine/img/类.png)

# 6. 正则表达式
> 正则表达式是一个特殊的字符序列，检测一个字符串是否与我们的设定的字符序列相匹配。快速检索文本、细化文本的操作。

## 6.1 re 模块
1. re: python提供的正则表达相关模块，需引入

- 引入:import re

- re.findall()方法。参数一:正则表达式规则; 参数二:相关字符串。返回值:列表类型
```
# 引入re模块
import re

LANGUAGE = 'C | C++ | Python | JavaScript | Java | C# | php'

r = re.findall('Python', LANGUAGE)
print(r)

if len(r) > 0:
    print('Language 语言存在 Pyhon')
else:
    print('不好意思，让您失望了~')
```

## 6.2 表达式
1. 字符
- 普通字符
- 元字符，例如: \d >>> 查找0-9数字。[元字符列表](https://baike.baidu.com/item/%E6%AD%A3%E5%88%99%E8%A1%A8%E8%BE%BE%E5%BC%8F/1700215?fr=aladdin#7)。
```
LANGUAGE2 = 'C 2 C++ 0 Python 7 JavaScript 9 Java 10 C# 27 php'

s1 = re.findall('\d', LANGUAGE2)
print(s1)
# 列表
```

2. 字符集
- 使用中括号包围，中括号内表示 或 关系
- 表示除中括号以外的字符，在中括号内部添加 ^ 符号
- 字符集范围: 用 - 符号表示
```
import re

s = 'abc, acc, adc, aec, afc, agc'

r1 = re.findall('a[cdf]c', s)
print(r1)       # ['acc', 'adc', 'afc']

r2 = re.findall('a[^df]c', s)
print(r2)       # ['abc', 'acc', 'aec', 'agc']

r3 = re.findall('a[c-e]c', s)
print(r3)       # ['acc', 'adc', 'aec']
```

3. 概况字符集
- \d  \D   >>>  [0-9]  [^0-9]
- \w  \W   >>>  单词字符、非单词字符  >>>  [A-Za-z0-9_] [^A-Za-z0-9_] 
- \s  \S   >>>  空白字符(不可见字符)、非空白字符
- . 匹配除换行符以外所有字符(\n)
```
import re

s = 'python & 996 \n\r\t\v 74233.javascript'

r1 = re.findall('\w', s)
r2 = re.findall('\W', s)
r3 = re.findall('\s', s)
r4 = re.findall('\S', s)

print(r1)
print(r2)
print(r3)
print(r4)
```

4. 数量词
- 表示:{3}
- 范围，用 ',' 隔开，例如{4,10},最少4个，最大10个
```
import re

s = 'python &java966782php'

r1 = re.findall('[a-z]{4,6}', s)
r2 = re.findall('[a-z]{3,5}', s)
print(r1)            # ['python', 'java']
print(r2)            # ['pytho', 'java', 'php']
```

5. 贪婪和非贪婪
- 默认: 贪婪模式
- 非贪婪:在数量词后面添加 '?' 符号
```
import re

s = 'python &java9a6782php'

r1 = re.findall('[a-z]{3,6}', s)
r2 = re.findall('[a-z]{3,6}?', s)      # 非贪婪
print(r1)              # ['python', 'java', 'php']
print(r2)              # ['pyt', 'hon', 'jav', 'php']
```

6. 特殊数量词
- \* : 匹配0次或无限多次 >>> {0,}
- \+ : 匹配1次或无限多次 >>> {1,}
- ?  : 匹配0次或1次     >>> {0,1},去除后缀重复颇有效果
> 从第一个字符开始匹配，到最后一个字符需要出现的次数:例如 python* >>> pytho需要匹配，最后一个字符 n 可以出现0次 或者 1次 或者不限次数
```
import re

s = 'pyth0python1pythonn2'

r1 = re.findall('python*', s)
r2 = re.findall('thon+', s)
r3 = re.findall('python?', s)
r4 = re.findall('fython*', s)  # 第一个字符f就匹配不到了，所以输出为空列表
print(r1)         # ['python', 'pythonn']
print(r2)         # ['thon', 'thonn']
print(r3)         # ['python', 'python']
print(r4)         # []
```

7. 边界匹配符
- ^:首边界符
- $:尾边界符
```
import re

QQ = '415303453a87472830294'

r1 = re.findall('\d{6,9}', QQ)
r2 = re.findall('^\d{6,9}', QQ)
r3 = re.findall('\d{6,9}$', QQ)
r4 = re.findall('^\d{6,9}$', QQ)

print(r1)                 # ['941530345', '874728302']
print(r2)                 # ['941530345']
print(r3)                 # ['472830294']
print(r4)                 # []
```

8. 组
- () 括号表示，内里逻辑为与关系
```
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
```

9. 匹配模式参数 - findall 函数第三个参数
- re.I:匹配时忽略大小写
- re.S: . 符号匹配时,换行符也会进行匹配
- ...(查资料)
```
import re

a = 'Python C#pHp\n9667jAVA'

r1 = re.findall('c#', a, re.I)
r2 = re.findall('php.{1}', a, re.I | re.S)

print(r1)
print(r2)
```
## 6.2 检索和替换

1. re.sub(pattern, repl, string, count=0, flags=s)

- pattern: 表达式
- repl: 替换的字符 或者 函数(重点应用)
- string: 被检索字符串
- count: 匹配次数，0为无限次
- flags: 匹配模式。re.I | re.S ....
```
import re

s = 'Python C# Java Javascript C#+C#6'

# 定义convert函数
def convert(value):
    # 查看value值 >>> 为一个对象
    print(value)
    matched = value.group()        # group() 不理解
    return '[' + matched + ']'

# 字符直接替换,无限次
r1 = re.sub('c#', 'GO', s, 0, re.I)
print(r1)

r2 = re.sub('c#', 'GO', s, 2, re.I)
print(r2)

# 函数替换
r3 = re.sub('C#', convert, s)
print(r3)
```

2. 把函数作为参数传递
```
a = 'A738R547DD8DR92345567QQ'

def convert_num(value):
    matched = value.group()
    if(int(matched) >= 50):
        return '97'
    else:
        return '37'

r4 = re.sub('\d{1,2}', convert_num, a)
print(r4)
```

3. re.match()
> match() 将会从字符串第一个字符开始匹配，如未找到相应结果，返回None。返回第一个匹配字符。返回值:对象
```
a = 'A738R547DD8DR92345567QQ'

r = re.match('\d', a)
print(r)                # None
```

4. re.search()
> 将会搜索整个字符串，返回第一个匹配字符。返回值:对象
```
a = 'A738R547DD8DR92345567QQ'

r2 = re.search('\d', a)
print(r2)
# <_sre.SRE_Match object; span=(1, 2), match='7'>
```
- span() 方法: 返回字符在字符串中的位置
- group(nr) 方法: 取出返回值.分组方法.
    - nr : 数量参数, 默认为0，取出匹配所有参数。group(1)，取出第一分组参数。
    - nr : 允许一次传入多个参数，返回元祖
- groups: 返回组的内容
```
a = 'life is short,i use python'

# .匹配除换行符以外所有字符  * 匹配0次或者无限次
r = re.search('life(.*)python', a, re.I)
r2 = re.findall('life(.*)python', a, re.I)
print(r)
print(r.group())   # life is short,i use python
print(r.group(1))  #  is short,i use 
print(r2)          # [' is short,i use ']
```
!['正则表达式'](./code/ten/img/正则表达式.png)

# 7. json
## 7.1 json模块
## 7.2 反序列化 json.loads()
- key 需要用双引号包围（单引号报错）。
- 注意value格式
```
import json

json_str = '{"name"："YJob", "age": 18}'

data = json.loads(json_str)

print(type(data))             # dict
print(data)
```
## 7.3 序列化 json.dumps()

# 8. 高级语法和用法

## 8.1 枚举

1. enum 模块

2. 特殊性
- 不可更改
- 标签名不重复

3. 枚举类型、枚举名称、枚举值
- 类型:VIP.YELLOW / VIP['YELLOW']
- 名称:VIP.YELLOW.name
- 值:VIP.YELLOW.value

4. 枚举的比较运算
- 允许等值运算: == 
- 允许身份运算: is

5. 注意事项
- 别名: 当值相同，标签名不同，第一个以后的标签相当于第一个的别名
```
from enum import Enum

class VIP(Enum):
    YELLOW = 1
    GREEN = 1               # 相当于YELLOW的别名
    BLACK = 3
    BLUE = 4
    RED = 5

print(VIP.GREEN)
# VIP.GREEN
```
- 有别名时进行遍历，不会输出别名

- 遍历输出别名请使用\_\_members__属性
```
from enum import Enum

class VIP(Enum):
    YELLOW = 1
    GREEN = 1
    BLACK = 3
    BLUE = 4
    RED = 5

print(VIP.GREEN)

for v in VIP:
    print(v)

for v in VIP.__members__:
    print(v)

for v in VIP.__members__.items():
    print(v)


#    VIP.YELLOW
#    VIP.BLACK
#    VIP.BLUE
#    VIP.RED
#    YELLOW
#    GREEN
#    BLACK
#    BLUE
#    RED
#    ('YELLOW', <VIP.YELLOW: 1>)
#    ('GREEN', <VIP.YELLOW: 1>)
#    ('BLACK', <VIP.BLACK: 3>)
#    ('BLUE', <VIP.BLUE: 4>)
#    ('RED', <VIP.RED: 5>)
```

6. 枚举转换
```
a = 1

print(VIP(a))
# VIP.YELLOW
```

7. 扩展
- IntEnum模块:继承此模块的枚举类，枚举值必须都为数字类型
```
from enum import IntEnum

class VIP(IntEnum):
    YELLOW = 1
    GREEN = 'str'      # 报错
    BLACK = Ttue       # 报错
```

- unique(装饰器):使枚举标签名唯一，不会出现别名
```
from enum import IntEnum,unique

@unique
class VIP(IntEnum):
    YELLOW = 1
    GREEN = 'str'      # 报错
    BLACK = Ttue       # 报错
```

- 枚举类为单例模式，不允许实例化

## 8.2 闭包
> 闭包 = 函数 + 环境变量

1. 闭包变量查看
```
def cover_pef():
    a = 25

    def cover(x):
        return a * (x ** 2)
    return cover


a = 10
f = cover_pef()
print(f(2))                                 # 100
print(f.__closure__)                        # (<cell at 0x02199450: int object at 0x6B3CD5B0>,)
print(f.__closure__[0].cell_contents)       # 25
```

2. 问题: 步数逐步累积，缓存不清零  》》》 闭包:记忆上一次调用状态
```
# 非闭包模式
origin = 0

def go(step):
    # 使用global关键字，避免以下逻辑把origin误任务局部变量
    global origin
    new_ori = origin + step
    origin = new_ori
    retuen new_ori

print(go(2))           # 2
print(go(7))           # 9
print(go(8))           # 17
```
```
# 闭包模式
def factory(pos):
    def go(step):
        # nonloacl关键字，强制声明一个变量为非局部变量
        nonlocal pos
        new_pos = pos + step
        pos = new_pos
        return new_pos
    return go

f = factory(0)
print(f(2))
print(f(10))
print(f(12))
```

# 9. 函数式编程

## 9.1 匿名函数 lambda

1. 与函数定义区别
- 使用 lambda 关键字定义
- 不需要添加函数名
- 不允许使用代码块，只允许表达式
- 不需要使用return关键字进行返回值
```
# lambda parameter_list: expression

def add(x, y):
    return x + y

lambda x, y: x + y
```

2. 扩展三元表达式
- 定义方式: True时结果 if 条件 else False时结果
```
x = 1
y = 2
result = x if x > y else y
print(result)
```

3. 映射:map >>> 类似循环
```
# 输出y为x的值的平方
x = [1, 2, 3, 4, 5, 6, 7, 8]

def square(x):
    return x**2

y = map(square, x)

print(list(y))
```

4. map 与 lambda 结合使用(推荐方式)
```
# 单参数
x = [1, 2, 3, 4, 5, 6, 7, 8]

y = map(lambda x: x * x, x)

print(list(y))
# [1, 4, 9, 16, 25, 36, 49, 64]
```
```
# 多参数
x = [1, 2, 3, 4, 5, 6, 7, 8]

y = [8, 7, 6, 5, 4, 3, 2, 1]

r = map(lambda x, y: x * x + y, x, y)

print(list(r))
# [9, 11, 15, 21, 29, 39, 51, 65]
``` 
```
# 多参数,列表个数不同,按个数较少的列表进行计算
x = [1, 2, 3, 4, 5, 6, 7, 8]

y = [8, 7, 6, 5, 4, 3]

r = map(lambda x, y: x * x + y, x, y)

print(list(r))
# [9, 11, 15, 21, 29, 39]
```

5. reduce 列表连续计算操作
- 参数1: 函数强制传入两个参数
    - 函数第一个参数: 有初始值，第一次为初始值，后续为上一次计算结果；无初始值，第一次为列表为第一个值
- 参数3: 初始值
- 引入:先引入functools模块内的reduce
```
from functools import reduce

list_x = [1, 2, 3, 4, 5, 6, 7, 8]

result = reduce(lambda x, y: x * y + y, list_x)

print(result)
```

6. filter 过滤
```
s1 = [1, 0, 1, 3, 5, -1, 6, 2]
s2 = ['A', 'b', 'c', 'Ab', 'bC']

r1 = filter(lambda x: True if x > 0 else False, s1)
r2 = filter(lambda x: x.isupper(), s2)

print(list(r1))   # [1, 1, 3, 5, 6, 2]
print(list(r2))   # ['A']
```

## 9.2 装饰器
1. 初步接触
> 需求: 对现有函数增加业务逻辑，例如:在执行之前添加当前时间
```
import time

def f1():
    # 方法一 >>> 直接添加
    # print(time.time())
    print("This is f1")

def f2():
    # 方法一 >>> 直接添加
    # print(time.time())
    print("This is f2")

# 方法二
def print_time(func):
    print(time.time())
    func()

print_time(f1)
print_time(f2)

# 方法三:装饰器
def decorator(func):
    def wrapper():
        print(time.time())
        func()
    return wrapper

# 调用方式略显繁琐
f = decorator(f1)
f()
```

2. 装饰器调用
```
# 装饰
@decorator
def f1():
    print("This is f1")

#直接调用
f1()
```

3. 包含参数的装饰器
```
def decorator(func):
    def wrapper(*args):
        print(time.time())
        func(*args)
    return wrapper

@decorator
def f1(func_name):
    print('This is my classmate:' + str(func_name))

@decorator
def f2(func_name1, function_name2)
    print('This is my student:' + str(func_name1) + '、' + str(func_name2))
```

4. 带关键字参数的装饰器
```
def decorator(func):
    def wrapper(*args, **kw):
        print(time.time())
        func(*args, **kw)
    return wrapper

@decorator
def f1(func_name1,func_name2,a = 3,c =4):
    print('This is my student:' + str(func_name1) + '、' + str(func_name2) + a + c)
```

# 10. 插件推荐

1. BeautifulSoup
2. scrapy

# 11. 杂序

## 1. 模拟switch...case...

## 2. 列表推导式(列表生成)
1. 生成列表每项的平方
2. 列表、集合、元祖、字典都可使用推导式 
```
a = [1, 2, 3, 4, 5, 6, 7, 8, 9]

# 简单
b = [i**2 for i in a]
# 添加判断条件
c = [i**2 for i in a if i > 5]
# 列表、集合、元祖、字典都可使用
d = {i**2 for i in a if i > 5}

print(b)
print(c)
print(d)
```
3. 字典推导
```
di = {
    "果小妹": 20,
    "西小伙": 21,
    "狼小弟": 22
}

dic = { value:key for key, value in di.items()}

print(dic)
```

## 3. None

## 4. 自定义对象控制布尔值
1. 默认为True
2. \_\_bool__，如果定义此函数，以此函数返回值为准，优先级大于\_\_len__
3. \_\_len__，如果定义此函数，以此函数返回值为准
```
class Test():
    def __bool__(self):
        # return 0, 不是bool类型会报错
        return False

    def __len__(self):
        # 返回整数类型或者bool类型不会报错
        return 10

print(len(Test()))
print(bool(Test()))
```

