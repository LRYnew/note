import time


def decorator(func):
    def wrapper(*args, **kw):
        print(time.time())
        func(*args, **kw)

    return wrapper


@decorator
def f1(func_name1, func_name2, a=3, c=4):
    print('This is my student:' + str(func_name1) + '、' + str(func_name2) + str(a) + str(c))


f1(1, 2, c=9, a=10)
