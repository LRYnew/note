# 一 初始化项目

## 1. 安装必要环境

1. virtualenv and virtualenvwrapper

2. 环境相关
```
# 豆瓣源 https://pypi.douban.com/simple/
pip install django1.11
pip install mysqlclient
pip install Pillow  
pip install djangorestframework
pip install markdown       # Markdown support for the browsable API.
pip install django-filter  # Filtering support
```

# 二 restful api

## 1. 概念

> 目前是前后端分离的最佳实践,是一套设计理念

# 三 View

- GenericViewSet            drf
    - GenericApiView        drf
        - APIView           drf
            - View          django

- mixins
    - CreateModelMixin
    - ListModelMixin
    - UpdateModelMixin
    - RetrieveModelMixin
    - DestoryModelMixin