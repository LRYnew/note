# -*- coding: utf-8 -*-
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
