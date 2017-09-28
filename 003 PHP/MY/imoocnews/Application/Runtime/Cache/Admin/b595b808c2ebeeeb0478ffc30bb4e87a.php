<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html,charset=utf-8">
    <meta http-equiv="x-ua-compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
    <meta name = "format-detection" content="telephone = no" />
    <title>News内容管理平台</title>
    <!--引用CSS-->
    <link rel="stylesheet" type="text/css" href="/imoocnews/Public/css/normalize.css" />
    <link rel="stylesheet" type="text/css" href="/imoocnews/Public/css/main.css" />
    <link rel="stylesheet" href="/imoocnews/Public/css/party/uploadify.css"/>
    <!--引用JS-->
    <script type="text/javascript" src="/imoocnews/Public/js/jquery.min.js"></script>
    <script type="text/javascript" src="/imoocnews/Public/js/dialog/layer.js"></script>
    <script type="text/javascript" src="/imoocnews/Public/js/dialog.js"></script>
    <script type="text/javascript" src="/imoocnews/Public/js/party/jquery.uploadify.js"></script>
    <script type="text/javascript" src="/imoocnews/Public/js/admin/login.js"></script>
</head>
<body>
<div id="wrapper" class="container">
    <?php
 $navs = D("Menu")->getAdminMenus(); $username = getLoginAdminUsername(); foreach($navs as $k => $v){ if($v["c"] == admin && $username != "admin"){ unset($navs[$k]); } } $index = "index"; ?>
<nav class="nav-containner" >
    <div class="nav-header">
        <a href="javascript:void(0)" class="nav-brand">资讯内容管理平台</a>
        <div class="nav-right">
            <a href="javascript:void(0)" class="nav-right-user" onclick="showlist(this)"><i class="icon"></i><?php echo ((isset($_SESSION['AdminUser']['username']) && ($_SESSION['AdminUser']['username'] !== ""))?($_SESSION['AdminUser']['username']):000); ?><b class="caret"></b></a>
            <!--平台介绍-->
            <ul class="nav-right-list">
                <li><a href="/imoocnews/Admin/admin/edit/id/<?php echo ($_SESSION['AdminUser']['admin_id']); ?>" class="nav-right-list-user"><i></i>个人中心</a></li>
                <li class="divider"></li>
                <li><a href="/imoocnews/Admin/admin/editpassword/id/<?php echo ($_SESSION['AdminUser']['admin_id']); ?>" class="nav-right-list-user"><i></i>修改密码</a></li>
                <li class="divider"></li>
                <li><a href="/imoocnews/admin.php/admin/login/checkOut" class="nav-right-list-close"><i></i>退出</a></li>
            </ul>
        </div>
        <!--登录用户信息模块-->
    </div>
    <!--导航顶部-->
    <div class="menu-containner">
        <ul class="nav-menu">
            <li <?php echo (getActive($index)); ?>>
                <a href="/imoocnews/admin/index/index" class="home"><i></i>首页</a>
            </li>
            <?php if(is_array($navs)): $i = 0; $__LIST__ = $navs;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$nav): $mod = ($i % 2 );++$i;?><li <?php echo (getActive($nav["c"])); ?>>
                    <a href="/imoocnews/<?php echo ($nav["m"]); ?>/<?php echo ($nav["c"]); ?>/<?php echo ($nav["f"]); ?>" class="item"><i></i><?php echo ($nav["name"]); ?></a>
                </li><?php endforeach; endif; else: echo "" ;endif; ?>
        </ul>
    </div>
    <!--菜单列表完成-->
</nav>
    <div id="page-wrapper" class="page-wrapper">
    <div class="container-home clearfix">
        <!-- Page Heading -->
        <h1 class="page-header">
            您好!欢迎使用资讯内容管理平台
        </h1>
        <p class="breadcrumb"><i></i>菜单管理</p>
        <div class="item-wrapper item-wrapper-1">
            <div class="item-header">
                <div class="item-icon">
                    <i></i>
                </div>
                <div class="item-content">
                    <div class="item-count">
                        <?php echo ($admincount); ?>
                    </div>
                    <p class="item-text">
                        今日登陆用户数
                    </p>
                </div>
            </div>
            <div class="item-footer">
                <a href="javascript:void(0);" class="clearfix"> <i></i></a>
            </div>
        </div>
        <div class="item-wrapper item-wrapper-2">
            <div class="item-header">
                <div class="item-icon">
                    <i></i>
                </div>
                <div class="item-content">
                    <div class="item-count">
                        <?php echo ($newscount); ?>
                    </div>
                    <p class="item-text">
                        文章数量
                    </p>
                </div>
            </div>
            <div class="item-footer">
                <a href="/imoocnews/admin/content/index" class="clearfix">查看<i></i></a>
            </div>
        </div>
        <div class="item-wrapper item-wrapper-3">
            <div class="item-header">
                <div class="item-icon">
                    <i></i>
                </div>
                <div class="item-content">
                    <div class="item-count">
                        <?php echo ($news["count"]); ?>
                    </div>
                    <p class="item-text">
                        文章最大阅读数
                    </p>
                </div>
            </div>
            <div class="item-footer">
                <a href="/imoocnews/home/detail/index/id/<?php echo ($news["news_id"]); ?>" class="clearfix"><?php echo ($news["title"]); ?><i></i></a>
            </div>
        </div>
        <div class="item-wrapper item-wrapper-4">
            <div class="item-header">
                <div class="item-icon">
                    <i></i>
                </div>
                <div class="item-content">
                    <div class="item-count">
                        <?php echo ($positioncout); ?>
                    </div>
                    <p class="item-text">
                        推荐位数
                    </p>
                </div>
            </div>
            <div class="item-footer">
                <a href="/imoocnews/admin/position/index" class="clearfix">查看 <i></i></a>
            </div>
        </div>
    </div>

    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->

</div>
<script type="text/javascript" src="/imoocnews/Public/js/admin/common.js"></script>
</body>
</html>