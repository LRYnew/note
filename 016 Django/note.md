# Django

# 1. 环境搭建

## 1. virtualenv 虚拟环境
1. 介绍
- 使不同应用的开发环境独立
- 环境升级不影响其他应用，也不会影响全局的python环境
- 避免包管理混乱

2. 安装
- 命令: pip install virtualenv
- 命令: pip install virtualenvwrapper-win (win版本的virtualenv管理工具)
    - 创建: mkvirtualenv name
    - 退出虚拟环境: deactivate
    - 查看虚拟环境: workon
    - 进入虚拟环境: workon name
- 在虚拟环境中安装包
    - 查看 已安装包: pip list
    - 安装: pip install PackageName


# 2. Django创建 and pycharm使用

## 1. 项目创建
- pycharm创建新项目
- 选择虚拟环境
    - 虚拟环境内需安装Django: pip install django==1.11
- 运行Run
- 修改hosts

## 2. 修改目录作用
- templates >>> 存放html
- 项目名 >>> 定义为包文件 >>> sources root(不设置文件内容易报错,但依然运行)

# 3. Django基础知识

## 1. 自动生成目录结构
- 项目同名目录
    - settings.py: django全局配置
    - urls.py: urls配置入口
    - wagi.py: django wsgi 启动文件
- templates: 放置HTML模板
- manage.py: 启动django主文件

## 2. 自定义目录 - app
- 通过Tool > Run manage.py Task 进入django命令
- startapp appname
- 应用层目录
    - views.py: 返回HTML页面
    - model.py: 定义数据库中的表
    - admin.py: admin相关
    - test.py: 测试相关

## 3. 其他目录
- static
- log
- media
- apps

## 4. 项目流程
### 1. 配置数据库
1. 安装mysql驱动
- mysql-python(python3.6 不支持此驱动)

- pymysql
```
# 安装驱动
pip install PyMysql

# 在__init.py__引入
import pymysql
pymysql.install_as_MySQLdb()
```

2. 修改DATABASES设置
```
DATABASES = {
    'default': {
        'ENGINE': 'django.db.backends.mysql',
        'NAME': 'djangotest',
        'USER': 'root',
        'PASSWORD': 'root',
        'HOST': 'localhost',
        'PORT': '3306',
        'CHARSET': 'utf8'
    }
}
```

3. 数据表生成
- makemigrations
- migrate

4. url.py配置

5. views.py编写

6. model.py编写

- 导入models模块
```
from django.db import models
```
- 定义类名: **类名代表数据库表名**，且继承了models.Model
- 字段名: 类内的字段代表数据表中的字段name
- 参数:
    - max_length: 最大字节数
    - verbose_name: 类似备注
```
from django.db import models

# Create your models here.
# 表名
class UserMessage(models.Model):
    # 字段
    name = models.CharField(max_length=20, verbose_name="用户名")
```


# 4. Django Admin 使用流程

## 1. 原生自带Admin

1. 修改 setting.py 配置
```
# 设置语言，1.7之前使用zh-Cn
LANGUAGE_CODE = 'zh-hans'

# 设置时区
TIME_ZONE = 'Asia/Shanghai'

USE_I18N = True

USE_L10N = True

# True: 数据库存储会采用国际时间UTC，否则采用本地时间
USE_TZ = False
```

2. 创建超级用户  
```
# run manage.py task  运行如下命令
createsuperuser
```

3. 进入app的admin.py注册model
```
from django.contrib import admin

# 引入model
from .model import UserProfile

# 注意命名方式
class UserProfileAdmin(admin.ModelAdmin):
    pass

# 注册
admin.site.register(UserProfile, UserProfileAdmin)
```

## 2. xadmin

### 1. 安装方法

1. pip 安装

- pip install xadmin

- 修改setting.py，注册app
```
# crispy-forms:xadmin 依赖包，自动安装
INSTALLED_APPS = {
    'xadmin',
    'crispy-forms'
}
```
- 修改url.py
```
# 导入
import xadmin

urlpatterns = [
    # url(r'^admin/', admin.site.urls)
    url(r'^xadmin/', xadmin.site.urls)
]
```

2. 源码安装

- github.com 下载源码
- 创建 extra_apps 第三方app存放目录
- 从源码拷贝xadmin文件到 extra_apps到目录下
- 设置 extra_apps 为源目录
- 修改setting.py，注册app
```
# crispy-forms:xadmin 依赖包，自动安装
INSTALLED_APPS = {
    'xadmin',
    'crispy_forms'
}
```

- 进入xadmin目录
- 创建空白README.rst 替代 原文件，修改为GBK编码
- 执行: python setup.py install

### 2. 使用

1. 同原生: 修改setting.py配置
2. 同原生: 创建超级用户
3. makemigrations migrate 命令创建xadmin相关数据表
3. 在app文件夹创建 adminx.py文件
```
# 导入xadmin模块
import xadmin

from .model import UserProfile

# 注意命名方式 和 导入模块
class UserProfileAdmin(object):
    # 定义显示列
    list_display = ['nick_name','birthday','gender']
    # 定义搜索内容
    search_fields = ['nick_name','gender']
    # 定义筛选内容
    list_filter = ['nick_name','birthday','gender']

xadmin.site.register(UserProfile, UserProfileAdmin)
```

### 3. 全局配置

1. 开启主题功能
```
from xadmin import views

# 开启主题功能
class BaseSetting(object):
    enable_themes = True
    use_bootswatch = True

xadmin.site.register(views.BaseAdminView, BaseSetting)
```
2. 全局配置
```
from xadmin import views

# 全局配置
class GlobalSettings(object):
    site_title = 'SS管理后台'
    site_footer = 'SSONLINE'
    menu_style = 'accordion'

xadmin.site.register(views.CommAdminView, GlobalSettings)
```

# 5. urls.py 配置

## 1. 静态模板配置
```
from django.views.generic import TemplateView

urlpatterns = [
    # 静态html模板
    url(r'^$', TemplateView.as_view(template_name='index.html'), name='index')
]
```























