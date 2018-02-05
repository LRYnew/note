# -*- conding:utf-8 -*-
from f3 import Human


class Teacher(Human):
    def __init__(self, subject, name, age):
        self.subject = subject
        super(Teacher, self).__init__(name, age)
    
    def getSuperFun(self):
        super(Teacher, self).getName()


teacher = Teacher('数学', 'WJobYou', 31)

teacher.getSuperFun()
