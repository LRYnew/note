# centOS python3 环境变量安装
## 1. python 安装
1. 安装依赖
```
yum -y groupinstall "Development tools"
yum -y install zlib-devel bzip2-devel openssl-devel ncurses-devel sqlite-devel readline-devel tk-devel gdbm-devel db4-devel libpcap-devel xz-devel
```

2. 获取python版本
```
mkdir /usr/local/pytho3
wget https://www.python.org/ftp/python/3.6.4/Python-3.6.4.tar.xz
```

3. 解压
```
tar -xvJf  Python-3.6.4.tar.xz
```

4. 编译安装
```
# root用户编译安装
cd Python-3.6.4
./configure prefix=/usr/local/python3
make && make install
```

5. 创建软链接
```
#  备份 /usr/bin/python -> python2（先查看，随机应变）
cd /usr/bin
mv python python2

#  删除原来python
rm python

#  创建软链接
ln -s /usr/local/python3/bin/python3 /usr/bin/python
ln -s /usr/local/python3/bin/pip3 /usr/bin/pip

#  修改yum依赖配置
vim /usr/bin/yum

修改第一句(依赖python2)  /usr/bin/python2
```

## 2. 安装虚拟环境 virtualenv
1. 安装
```
pip install virtualenv
pip install virtualenvwrapper
```

2. 创建软链接
```
ln -s /usr/local/python3/bin/virtualenv /usr/bin/virtualenv
ln -s /usr/local/python3/bin/virtualenvwrapper.sh /usr/bin/virtualenvwrapper.sh
```

3. 配置环境变量
```
# vim ~/.bashrc

export WORKON_HOME=$HOME/virtualenvs # 虚拟环境存放位置自己指定   
source /usr/bin/virtualenvwrapper.sh # 指定virtualenvwrapper的执行文件路径  
export VIRTUALENVWRAPPER_PYTHON=/usr/bin/python # 系统python2.7执行文件位置，根据自己环境而定   
export VIRTUALENVWRAPPER_VIRTUALENV_ARGS='--no-site-packages' # 启动时候指定参数，就是我们用的独立于系统的安装包   
export PIP_VIRTUALENV_BASE=$WORKON_HOME # 告知pip virtualenv的位置   
export PIP_RESPECT_VIRTUALENV=true # 执行pip的时候让系统自动开启虚拟环境 

# 执行.bashrc使文件生效
source ~/.bashrc
```

4. 常用命令
```
# 创建虚拟环境
mkvirtualenv test

# 指定python版本
mkvirtualenv test -p /usr/bin/python2

# 退出虚拟环境
deactivate

# 查看当前有哪些虚拟环境
workon

# 进入指定的虚拟环境 workon [虚拟环境名]
workon test2

# 删除环境
rmvirtualenv   

# 复制环境
cpvirtualenv
```

## 3. 安装django环境
```
# 创建新虚拟环境,防止相互影响
mkvirtualenv jobs

# 在虚拟环境下 安装相关依赖
pip install django==1.11

pip install pymysql

# 推荐使用 源码 安装,源码地址在github
pip install xadmin
```

## 4. 启动django项目
1. clone or copy 项目到指定目录
2. 修改数据库相关设置
```
# 编辑配置位置
vim ProjectName/setting.py

# 修改数据库相应配置
DATABASES = {
    'default': {
        'ENGINE': 'django.db.backends.mysql',
        'NAME': 'jobs',
        'USER': 'root',
        'PASSWORD': 'root',
        'HOST': 'localhost',
        'PORT': '3306',
        'CHARSET': 'utf8'
    }
}
```
3. 启动 项目
```
# 进入项目目录,执行启动命令  python manage.py runserver Host:Port
python manage.py runserver 192.168.199.210:7778
```