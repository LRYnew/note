# Flask

> Flask是一个使用 Python 编写的轻量级 Web 应用框架

# 1. 第一个应用
```
# 生存模式
from flask import Flask

app = Flask(__name__)

app.run()

# 调试模式
from flask import Flask

app = Flask(__name__)

app.run(debug=True)
```

# 2. 路由(视图view)

## 1. 路由函数

### 1. 装饰器注册
```
from flask import Flask

app = Flask(__name__)

# 注册路由
@app.route('/hello')
def hello():
    return '<h1>hello,flask</h1>'


app.run(host='localhost',port=7077)

```

### 2. 变量规则
 URL 添加变量部分，你可以把这些特殊的字段标记为 \<variable_name> ， 这个部分将会作为命名参数传递到你的函数。规则可以用 \<converter:variable_name> 指定一个可选的转换器
```
@app.route('/user/<username>')
def show_user_profile(username):
    # show the user profile for that user
    return 'User %s' % username

@app.route('/post/<int:post_id>')
def show_post(post_id):
    # show the post with the given id, the id is an integer
    return 'Post %d' % post_id
```

转换器:
参数 | 说明
- | - 
int | 接受整数
float | 同int，也接受浮点数
path | 和默认相似，也接受斜线

### 3. HTTP 方法
通过 route() 装饰器传递 methods 参数
```
@app.route('/login', methods=['GET', 'POST'])
def login():
    if request.method == 'POST':
        do_the_login()
    else:
        show_the_login_form()
```

### 4. 另一种路由注册:函数注册
```
# 即插视图方式必须使用此方式
app.add_url_rule('/hello/',view_func=hello)
```

## 2. 路由 后面"/" 为重定向（url 唯一原则，重定向状态码301 or 302）

## 3. 基于类的视图为 "即插视图"

# 3. run 相关参数 及 配置文件

## 1. 参数
- debug: 调试模式
- host: 输出IP， 建议: '0.0.0.0'
- port： 输出端口

## 2. 配置位置
```
# config.py
DEBUG = False

# app.py
# 引入
app.config.from_object('config')

# 使用
print(app.config['DEBUG'])
```

# 4. Response对象
- status
- content-type： text/html（默认）
```
# 第一种写法
from flask import Flask, make_response

@app.route('/hello/')
def hello():
    headers = {
        "content-type": "text/html",
        "location": "http://www.baidu.com"
    }
    response = make_response('<h1>hello,flask</h1>',301)
    response.headers = headers

    return response

# 第二种写法
@app.route('/hello/')
def hello():
    headers = {
        "content-type": "text/html",
        "location": "http://www.baidu.com"
    }

    return '<h1>hello,flask</h1>',301，headers
```

# 5. flask 实用方法

- jsonify() - 封装成JSON数据格式，content-type = 'application/json'

# 6. blueprint 蓝图

## 1. 参数
```
web = Blueprint('蓝图名称', 所在包 or 模块)
```

## 2. 注册 - 在应用初始化时注册
```
from app.web.web import web
app.register_blueprint(web)
```

# 6. 数据库创建方式

- Database First

- Model First

- Code First

## 1. 第三方包 - sqlalchemy  flask-sqlalchemy

# 6. Flask上下文环境

- 应用上下文  本质:对象 Flask 的封装
- 请求上下文  本质:对象 Request 的封装

## with [... as ...]

# 7. 进程 和 线程

## 1. 进程 - 竞争计算机资源的基本单位，进程切换也是会资源开销

- 分工: 分配CPU资源/内存资源等

## 2. 线程 - 线程是进程的一部分

- 分工: 利用CPU执行代码，不分配资源，但可以访问所属进程的资源

## 3. python 线程相关

- python 不能充分利用多核 CPU 优势

- GIL 全局解释器锁

- Loacl()

- LoaclStack()

1. 语法
```
import treading

# 查看当前线程

t = threading.current_thread()

print(t.getName())
```

# 8. ViewModel

1. 解决问题
- 裁剪: 对多余数据进行删减
- 修饰: 对现有数据进行修改，例如书名添加 书名号 等
- 合并: 对多个原始数据进行整合

# 9. Jinja2 模板引擎

## 1. 常用语法

- 数据展示 {{}}

- 条件判断
```
{% if ... %}
    <div></div>
{% else if ...%}
    <div></div>
{% else %}
    <div></div>
{% endif %}
```

- 循环判断
 
```
{# 数组循环 #}
{% for val in [2,3,4,5,6] %}
    <div>{{ loop.index0 }}:{{ val }}</div>
  {% endfor %}
```
```
loop.index 当 前迭代的索引，从1开始算

loop.index0 当前迭代的索引，从0开始算

loop.revindex 相 对于序列末尾的索引，从1开始算

loop.revindex0 相对于序列末尾的索引，从0开始算

loop.first 相 当于 loop.index == 1.

loop.last 相当于 loop.index == len(seq) - 1

loop.length 序列的长度.

loop.cycle 是 一个帮助性质的函数，可以接受两个字符串参数，如果当前循环索引是偶数，则显示第一个字符串，是奇数则显示第二个字符串。它常被在表格中用来用不同的背景 色区分相邻的行
```

- 继承
```
# layout.html

{% block head%}
    <div>this is head</div>
{% endblock %}

{% block content%}
    <div>this is content</div>
{% endblock %}

{% block foot%}
    <div>this is foot</div>
{% endblock %}


# test.html
{% extends 'layout.html'%}

{% block content%}
{{super()}} {# super() 继承父模板内的内容 #}
<div>this is test content</div>
{% endblock%}

```

- 过滤器
```
# 管道符号
```

- url_for 函数: 反向构建
```
<link rel="stylesheet" href="{{ url_for('static', filename='test.css') }}">
```

- Messageing Flash 消息闪现
```
# secure
SECRET_KEY = 'random string'

# views.py

@web.test('/test')

flash('YJob')
flash('EJob', category='error')
flash('WJob', category='wraning')
return render_template('test')


# test.html
{% block content%}
    {% set msg = get_flashed_messages() %} {# set 设置变量关键字，作用域为整个block #}
    {{msg}}}

    {% with message = get_flashed_messages() %}
    {% endwith%}
    {{message}} {# 获取不到，不在with作用域内 #}

    {% set error = get_flashed_messages(category_filter=['error']) %}
    {{error}}}

    {% set wran = get_flashed_messages(category_filter=['wraning']) %}
    {{wran}}
{% endblock%}
```
