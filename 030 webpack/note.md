# webpack

# 1. 资源链接
- [官网](https://webpack.js.org/)
- [github](https://github.com/webpack/webpack)
- [中文官网](https://webpack.docschina.org/)

# 2. 安装 webpack4

1. 全局安装
```
npm install -g webpack
# webpack4 和 webpack-cli已经分离 需在安装 webpack-cli

npm install -g webpack-cli
```

# 3. 核心概念

1. entry   代码入口/打包的入口: 入口可分为单入口 和 多入口 

2. output  代码压缩输出位置
3. loaders 处理文件，转换为模块
4. plugins 参与打包工程，对打包进行优化压缩，配置打包时的变量

> 常用名词:
- chunk: 代码块
- bundle: 打包后的
- module: 模块

# 4. webpack 使用
## 1. 使用方式
- webpack命令
- webpack配置
- 第三方脚手架

## 2. 打包 JS

1. 命令行方式
```
# 命令行方式
# webpack <entry> [entry] -o <output>

webpack --mode=none app.js -o bundle.js
```
2. 使用配置文件
```
# webpack.config.js
# webpack [--config webpack.config.js]

webpack --mode=none --config webpack.config.js
```

## 3. 打包 ES6/7  - babel

1. babel 在webpack中使用需借助 bable-loader
> [babel官网](http://babeljs.io/)
```
# 安装到对应项目
npm install --save-dev babel-loader babel-core
```

2. babel presets : 规范总结
```
# 常用
es2015
es2016
es2017
env: 包括 2015 2016 2017 最新的集合
babel-presets-recat
babel-presets-stage 0-3
其他自定义规范
```
```
# 根据babel最新版本安装
npm install @babel/preset-env --save-dev

# 普通版本安装
npm install babel-preset-env --save-dev
```















