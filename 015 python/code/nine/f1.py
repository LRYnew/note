# -*- coding:utf-8 -*-
# 类的定义


class Student():
    sum = 0
    name = ''
    age = 20
    __score = 100
    
    # 构造函数
    def __init__(self, name='YJob', age=18):
        self.name = name
        self.age = age
        self.__score = 0
        # print(name)         # name为传入的参数，而不是类变量
        # print(age)
        self.__class__.add_sum()
        # self.add_sum()

    # 实例方法必须强制传入self参数
    def __print_files(self):
        print('name:' + self.name)
        print('age:' + str(self.age))

    # 类方法
    @classmethod
    def add_sum(cls):
        cls.sum += 1
        # print('班级人数:' + str(cls.sum))
        print(cls.__score)


# 实例化
student1 = Student('WJob', 28)

print(student1.__dict__)