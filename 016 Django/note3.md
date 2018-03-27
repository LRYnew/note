# 1. 特殊记忆点

## 1. 替代原有用户表 UserProfile
```
# models.py
from django.contrib.auth.models import AbstractUser

class UserProfile(AbstractUser):
    pass

# setting.py
AUTH_USER_MODEL = 'users.UserProfile'
```

## 2.  设置资源请求路径和存放地址
```
# setting.py
STATIC_URL = '/static/'
STATICFILES_DIRS = [
    os.path.join(BASE_DIR, 'static'),
    os.path.join(BASE_DIR, 'media')
]

MEDIA_URL = '/media/'
MEDIA_ROOT = os.path.join(BASE_DIR, 'media').replace("\\",'/')
```

## 3.  设置源目录
```
# setting.py
import sys
sys.path.insert(0, os.path.join(BASE_DIR, 'apps'))
```

## 4.  app 进行设置
```
# apps.py   编写配置

# __init__.py
default_app_config = 'users.apps.UsersConfig'
```

## 5.  xadmin 配置
```
# adminx.py

import xadmin
from xadmin import views

class BaseSeting(object):
    enable_themes = True
    use_bootswatch = True

class GlobalSettings(object):
    site_title = 'ss管理后台'
    site_footer = 'SSONLINE'
    menu_style = 'accordion'

xadmin.site.register(views.BaseAdminView, BaseSetting)
xadmin.site.register(views.CommAdminView, GlobalSettings)
```


## 6.  静态模板引入
```
from django.views.generic import TemplateView

urlpatterns = [
    url(r'^$', TemplateView.as_view(template_name='index.html'),name='index')
]
```