# -*- coding:utf-8 -*-
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


f = decorator(f1)
f()