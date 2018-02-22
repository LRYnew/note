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