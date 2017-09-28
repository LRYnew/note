<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html,charset=UTF-8">
    <meta http-equiv="X-UA-COMPATIBLE" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
    <meta name = "format-detection" content="telephone = no" />
    <title>资讯内容管理平台-登录</title>
    <link rel="stylesheet" type="text/css" href="/imoocnews/Public/css/normalize.css" />
    <link rel="stylesheet" type="text/css" href="/imoocnews/Public/css/main.css" />
</head>
<body style="background:#fff;">
<div class="container">
    <form method="post" action="" enctype="multipart/form-data" class="form-login">
    	<h2>请登录</h2>
    	<input type="text" name="username" class="username" placeholder="请输入账号">
    	<br/>
    	<input type="password" name="password" class="password" placeholder="请输入密码">
    	<br/>
    	<button type="button" class="login-btn" onclick="login.check()">登录</button>
    </form>
</div>
</body>
<!--引用js-->
<script type="text/javascript" src="/imoocnews/Public/js/jquery.min.js"></script>
<script type="text/javascript" src="/imoocnews/Public/js/dialog/layer.js"></script>
<script type="text/javascript" src="/imoocnews/Public/js/dialog.js"></script>
<script type="text/javascript" src="/imoocnews/Public/js/admin/login.js"></script>
</html>