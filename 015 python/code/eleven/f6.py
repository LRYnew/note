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
print(f.__closure__)
