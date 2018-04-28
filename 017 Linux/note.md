# 一 linux 小操作
1. tab - 自动补全
2. service network restart - 重启网络服务
3. ps -ef |grep xxx  - 查找某个进程

# 二 准备工作
## 1. ip 查看

1. ifconfig
2. ip addr
3. vi /etc/sysconfig/network-scripts/ifcfg-xx
4. yum install net-tools

## 2. 替换默认源

1. 镜像地址:http://mirrors.163.com/.help/centos.html

## 3. 安装Vim


# 三 SSH

## 1. 服务端安装 ssh
1. 安装:yum install openssh-server
2. 启动:service sshd start
3. 设置开机自启动:chkconfig sshd on

## 2. 客户端安装
1. 安装:yum install openssh-client

## 3. SSH config

1. config 为了方便批量管理 ssh
2. config 存放在 ~/.ssh/config
3. config 配置语法
- Host : 别名
- HostName : 主机名
- Port : 端口，默认22
- User : 用户名
- IdentityFile : 密钥存放路径 

## 4. SSH KEY
1. ssh key 使用非对称加密方式生成公钥和私钥
2. 私钥存放本地 ~/.ssh目录
3. 公钥对外开放，放在服务器的~/.ssh/authorized_keys

4. Linux 生成 ssh key
- ssh-keygen -t rsa    加密方式不同
- ssh-keygen -t dsa    加密方式不同
- ssh-add ~/.ssh/jobs_linux  登录前加载密钥

## 5. 端口安全
1. 概念: 指 尽量避免远程连接端口被不法分子知道，为此改变默认服务端口号的操作

2. 操作: 修改 /etc/ssh/sshd_config 配置

# 四 Linux 常用命令

## 1. 软件相关操作命令
1. 软件包管理器: yum
- 安装: yum install xxx
- 卸载: yum remove xxx，    yum -y remove mysql*
- 搜索: yum search xxx
- 清理缓存: yum clean packages
- 列出已安装: yum list，   yum list installed MySQL*
- 软件包信息: yum info xxx

2. 服务器硬件资源信息
- 内存: free -m
- 硬盘: df -h
- 负载: w / top     1 -> 100%
- CPU: cat /proc/cpuinfo
- 磁盘操作: fdisk

3. 文件操作
- Linux 文件目录结构
    - 根目录: /
    - 家目录(总家目录): /home
    - 当前用户家目录: ~
    - 临时目录: /tmp
    - 配置目录: /etc
    - 用户程序目录: /usr 
- 文件基本操作
    - ls   :  查看目录下文件
        - -a
        - -al
    - touch:  新建文件
    - mkdir:  新建文件夹
        - -p 循环创建
    - cd   :  进入文件夹
    - rm   :  删除文件/文件夹
        - -r 循环删除
        - -rf 循环强制删除，不提示
    - cp   :  复制
    - mv   :  移动
    - pwd  :  显示路径
- 文本编辑神器Vim
    - x    :  删除光标所在位置字符
    - gg   :  首行
    - G    :  尾行
    - dd   :  删除行
    - u    :  恢复
    - yy   :  复制
    - p    :  粘贴
    - i    :  插入
    - ESC  :  退出当前模式
    - :wq  :  保存退出
- 文件权限421
    - r    :  读取
    - w    :  写入
    - x    :  执行
- 文件搜索/查找/读取
    - tail :  文件尾部开始读取
    - head :  文件头部开始读取
    - cat  :  读取整个文件
    - more :  分页读取
    - less :  可控分页
    - grep :  搜索某个关键词
    - find :  查找文件
    - wc   :  统计个数
- 文件压缩/解压
    - tar -cf / czvf
    - tar -tf/tvf / tzvf
    - tar -xf /xzvf

4. 系统用户操作命令
    - useradd  :  添加用户
    - adduser  :  添加用户
    - userdel  :  用户删除
    - passwd   :  设置密码

5. 防火墙
- 作用: 保护服务器安全
- 设置防火墙规则
    - 开发 80 22 端口
- 关闭防火墙
- 安装: yum install firewalld
- 启动: service firewalld start
- 检查: service firewalld status
- 关闭/禁用: service firewalld stop/disable

- 操作命令 firewall-cmd
    - firewall-cmd --get-zones     :   全部区域
    - firewall-cmd --get-ports     :   全部端口
    - --list-all
    - --remove
    - --add
    - --zone=publuc

6. 提权 文件上传和下载操作
- sudo  提权
    - visudo - 提权设置
- 文件下载
    - wget / curl
- 文件上传
    - scp(Linux 传 Linux)  :  scp imooc.txt jobs@192.168.199.210:/tmp/
    - scp(Linux 下载 Linux)  :  scp jobs@192.168.199.210:/tmp/imooc.txt ./
- xshell
    - 服务器需先安装 lrzsz    :  yum install lrzsz
    - rz  上传
    - sz  下载


# 五 Apache

## 1. Apache 安装

1. yum install httpd : 安装
2. service httpd start : 启动
2. service httpd stop : 停止
> centos 中 Apache 称呼 为 httpd，其他系统 为 Apache

4. sudo netstat -anpl | grep 'http'

## 2. 虚拟主机
1. 进入 /etc/httpd,查看配置

2. 查看 /conf/httpd.conf
- 查找 virtual
- 添加
```
<VirtualHost *:80>
    ServiceName www.jobs.com
    DocumentRoot /data/www
    <Directory "/data/www"> 
        AllowOverride None
        Options None
        Require all granted
    </Directory>
</VirtualHost>
```
- 修改模式
```
# 宽松模式
setenforce 0

# 严格模式
setenforce 1

# 永久设置
vim /etc/selinux/config
```

## 3. 伪静态
1. 路径 /etc/httpd/module/mod_rewrite.so  重写规则

2. 在 httpd.conf 里面引入 相关模块
```
# 引入
LoadModule rewrite_module modules/mod_rewrite.so
```
3. 重写规则
```
<IfModule mod_rewrite.c>
    RewriteEngine On
    RewriteRule ^(.*)$ index.html
</IfModule>
```
4. 重新启动

# 六 Nginx

## 1. 基本操作
1. yum install nginx      :   找不到资源包
```
sudo rpm -Uvh http://nginx.org/packages/centos/7/noarch/RPMS/nginx-release-centos-7-0.el7.ngx.noarch.rpm

sudo yum install -y nginx
```
2. service nginx start
3. service nginx stop
4. service nginx reload   :   重载

## 2. 虚拟主机
1. 路径 /etc/nginx/conf.d 
2. 复制 default.conf
3. 修改文件内容

## 3. 多域名  多端口
## 4. 伪静态
## 5. 日志格式化
1. 路径 /etc/nginx.conf
2. 修改 log_format 字段

3. 更改 日志存储路径,在 /conf.d/your.conf 内的虚拟主机设置中进行配置

## 6. 反向代理 和 负载均衡
1. 概念
- 反向代理: 假设有两台服务器，一台配置 nginx 。请求一个域名，先把请求发送到 nginx 服务器，nginx 再作为一个代理，向另一条服务器请求数据。
- 负载均衡: 请求量过大时，增加多台服务器进行负载。
2. 实际应用
```
# /etc/nginx/conf.d/jobs.conf
# 定义一个代理
upstream jobs_hosts {
    # 不设置weight,轮流请求; 设置权重，根据权重进行请求
    server 118.89.106.129:80 weight=5;
    server 192.168.199.210:80 weight=1;
}

server {
    listen       80;
    listen       9999;
    server_name  www.jobs.test;

    root   /data/www;
    index  index.html index.htm;

    location / {
       # rewrite ^(.*)\/$  /index.html;
       # 代理的IP
       # proxy_pass http://118.89.106.129:80;
       proxy_pass http://jobs_hosts;
       # 代理头
       proxy_set_header Host www.54php.cn
    }
}

```
## 7. 调试技巧 


# 七 MySql

## 1. 基本操作
1. yum install mysql-community-server
```
# 移除默认数据库 mariadb 数据库
yum remove mariadb-libs.x86_4

# 下载源
wget http://dev.mysql.com/get/mysql57-community-release-el7-8.noarch.rpm

# 安装源
yum localinstall mysql57-community-release-el7-8.noarch.rpm

# 安装MySql
yum install mysql-community-server

# 默认密码
cat /var/log/mysqld.log | grep "password"
```
2. service mysqld start/restart
3. service mysqld stop

## 2. 扩展

1. 远程连接
```
# 进入mysql 数据库
show databases;
use mysql

# 查看user表
show tables;

# 查看字段 host  user
select Host,User from user \G;

# 更新相关权限, % -> 全部
update user set Host = "%" where Host = "localhost" and user = "root";

# 刷新mysql服务
# flush privileges;
service mysqld restart;

# 关闭防火墙 或者 防火墙配置
service firewalld stop
```

2. 开启General log
```
# 设置存放位置
set global general_log_file="/tmp/general.log"; 
# 开启开关
set global general_log=on;
```

3. 新建用户和权限操作
```
# 创建
create user 'username'@'host' identified by 'passsword'

# 赋予权限
# grant all privileges on *.* to 'imooc'@'%' identified by 'YJob12138.' with grant option;
# grant select, insert, update, delete on *.* to 'imooc'@'%' identified by 'YJob12138.' with grant option;
```

4. 忘记 root 密码
```
# 打开配置文件
vim /etc/my.cnf

# 增加配置语句，关闭验证
skip-grant-tables

# 进入mysql，重新设置密码
update user set authentication_string=password('456789') where User='root';
```

## 3. MySql 客户端工具

1. SQLyog

2. Navicat

3. HeidiSQL

4. Sequal Pro  (Mac专用)

5. phpMyadmin

# 八 git
## 1. 安装

1. yum install git

2. 配置自动补全(默认不开启)

## 2. 基本命令

1. 生成 ssh-key
```
# 进入用户目录下的.ssh
cd ~/.ssh/

# 生成key
ssh-keygen
```

# 九 python3 安装
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

#  修改yum依赖配置,4个配置文件涉及
vim /usr/bin/yum
vim /usr/libexec/urlgrabber-ext-down
vim /usr/bin/gnome-tweak-tool 
vim /usr/bin/yum-config-manager 

第一句修改 /usr/bin/python2
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

# 十 Linux 常见服务

## 1. crontab 定时任务
1. crontab -e 开启

2. 服务相关
```
# cron是一个linux下 的定时执行工具，可以在无需人工干预的情况下运行作业。
service crond start    //启动服务
service crond stop     //关闭服务
service crond restart  //重启服务
service crond reload   //重新载入配置
service crond status   //查看服务状态 
```

3. 语法
```
# 六个域

* * * * * commands

分 时 日期 月份 星期 命令集

* 代表所有的取值范围内的数字
/ 代表每的意思
- 代表从某个数字到某个数字
, 分开几个离散的数字
```
## 2. Ntpdate 日期同步
1. yum install ntp 安装

2. 同步时间
```
ntpdate cn.pool.ntp.org
```

3. 设置时区


## 3. Logrotate 日志切割

## 4. supervisor 进程管理