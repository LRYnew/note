class Test():
    def __bool__(self):
        # return 0, 不是bool类型会报错
        return False

    def __len__(self):
        # 返回整数类型或者bool类型不会报错
        return 10


print(len(Test()))
print(bool(Test()))
