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
- 关键字参数: 可以跳过参数顺序
```
def add(x,y):
    return x+y

result = add(y=10,x=100) 
# >>> 关键字参数，直接指定参数，跳过原有顺序限制
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