# -*- coding:utf-8 -*-

# 类:人


class Human():

    def __init__(self, name, age=18):
        self.name = name
        self.age = age

    def getName(self):
        print(self.name)
        print(self.age)
