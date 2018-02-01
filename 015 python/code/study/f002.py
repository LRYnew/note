# -*- coding: utf-8 -*-
import f001 as f
account = 'YJob'
password = '123456.'

print('Please your account')
user_account = input()

print('Please your password')
user_password = input()

if account == user_account and password == user_password:
    print('success')
else:
    print('fail')

print(f.a)
