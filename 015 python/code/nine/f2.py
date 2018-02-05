# -*- coding:utf-8 -*-
# 类的定义
from f3 import Human


class Student(Human):
    sum = 0
    
    # 构造函数
    def __init__(self, school, name='YJob', age=18):
        self.school = school
        # 调用父类构造函数
        super(Student, self).__init__(name, age)

    # 调用父类方法，需对父类方法再行封装
    def print_me(self):
        super(Student, self).getName()
        print(self.school)
        print(self.age)


# 实例化
student1 = Student('景山小学', 'WJob', 28)

print(student1.print_me())
