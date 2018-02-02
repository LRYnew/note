# -*- coding:utf-8 -*-
# 类的定义


class Student():
    name = ''
    age = 20

    # 构造函数
    def __init__(self, name='YJob', age=18):
        self.name = name
        self.age = age

    # 类内方法必须强制传入self参数
    def print_files(self):
        print('name:' + self.name)
        print('age:' + str(self.age))


# 实例化
student = Student('WJob',28)
student.print_files()
