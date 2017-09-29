# 在HTML中使用Javascript

# 1. \<script>

## 1. \<script> 定义了6个属性
- async: 可选。表示应该立即下载脚本，但不应妨碍页面中的其他操作。比如下载其他资源或等待加载其他脚本。**只对外部脚本文件有效**。

- charset: 可选。表示通过src属性指定的代码的字符集。由于浏览器大多数会忽略它的值，因此这个属性少有人用。

- defer: 可选。表示脚本可以延迟到文档完全被解析和显示之后再执行。**只对外部脚本文件有效**。IE7及更早版本对嵌入脚本也支持这个属性。

- language: 已废弃

- src: 可选。表示要包含执行的外部代码。

- type: 可选。可以看成是language的替代属性；表示编写代码使用的脚本语言类型(也称为MIME类型)。虽然text/javascript和text/ecmascript都已经不被推荐使用，但人们一直以来使用的还是text/JavaScript。实际上,服务器在传送Javascript文件时使用的MIME类型通常是application/x-javascript，但在type中设置这个值却可能导致脚本被忽略。另外,在非IE浏览器中还可以使用以下值:application/javascript 和 application/ecmascript。考虑到约定俗成和最大限度的浏览器兼容性,目前type属性的值依旧还是text/javascript。不过,这个属性并不是必须的，如果没有指定这个属性,则其默认值仍为text/javascript。


> 不要省略结尾 \</script>

> \<script>标签可以直接加载w外部域的文件，与\<img>标签类似。

## 2. 延迟脚本

![延迟脚本](./img/延迟脚本.png '延迟脚本 ')

以上两个脚本会在浏览器遇到\<html>标签后在执行。

>在现实当中，延迟脚本并不一定会按照顺序执行，也不一定会在DOMContentLoaded事件触发前执行。**因此最好只有一个延迟脚本**

## 3. 异步脚本

HTML5为\<script>定义了async属性，async属性只适用于外部文件，于defer功能类似。

> 区别：标记为async的脚本不保证按照它们的先后顺序执行。

> 两个async脚本之间不要有依赖关系，加载期间不要对DOM进行操作。
!['异步脚本'](./img/异步脚本.png)

# 2. 文档模式

- 混杂模式: 不推荐使用

- 准标准模式: 与标准模式差别极小

- 标准模式: 推荐使用，减小跨浏览器的差异。HTML5使用\<!DOCTYPE html>开启。

# 3. \<noscript>元素

包含\<noscript>元素中的内容只会在以下两种情况才会显示出来

- 浏览器不支持脚本
- 浏览器支持脚本，但脚本被禁用

!['noscript'](./img/noscript.png)