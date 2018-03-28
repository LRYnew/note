# 6 登录过程

## 6.1 

1. setting.py 内增加 AUTHENTICATION_BACKENDS = ()

AUTHENTICATION_BACKENDS(authentication_backends-验证后端): 元祖形式，重写登录规则

2. 在users.views 内 定义CustomBackend()类  -  定制验证后端

- 需引入ModelBackend模块
- 在引入Q模块
```
from django.contrib.auth.backends import ModelBackend
from django.db.model import Q

from .model import UserProfile

class CustomBackend(ModelBackend):
    # 重写
    def authenticate(self, username=None, password=None, **kwargs):
        try:
            user = UserProfile.objects.get(Q(username=username)|Q(email=username))
            if user.check_password(password):
                return user
            # 测试没写else情况
            # else:
            #    return None
        except Exception as e:
            return None
```

3. 在views中定义登录类 LoginView(View),继承自View
```
from django.views.generic.base import View


class LoginView(View):
    # 登录类
    # 响应 get 请求
    def get(self, request):
        return render(request, 'login.html', {})
    
    # 响应 post 请求
    def post(self, request):
        username = request.POST.get('username', '')
        password = request.POST.get('password', '')
        user = authenticate(username=username, password=password)
        if user is not None:
            login(request, user)
            return render(request, 'index.html', {})
        else:
            return render(request, 'login.html', {"msg": '用户名或者密码错误'})
```

4. 在app中创建forms.py文件，定义输入数据的检查类
```
from django import forms


class LoginForm(forms.Form):
    username = forms.CharField(required=True, error_messages= {
        'required': '用户名必填'
    })
    password = forms.CharField(required=True, min_length=6, error_messages= {
        'required': '密码必填',
        'min_length': '密码不能小于6位数'
    })
```


# 7 注册过程
## 1. 验证码插件 - django-simple-captcha
