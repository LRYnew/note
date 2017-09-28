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
        <div class="container-home">
            <p class="breadcrumb"><i></i>基本管理</p>
            <div class="nav-box">
    <a href="/imoocnews/admin/basic/index" <?php echo (getBasicType("0",$type)); ?>>基本配置</a>
    <a href="/imoocnews/admin/basic/cache" <?php echo (getBasicType("1",$type)); ?>>缓存配置</a>
</div>
            <div class="form-wrapper">
                <form method="post" class="form-box" id="form-cache">
                    <div>
                        <label for="btnCache" class="form-label">更新首页缓存:</label>
                        <input type="button" class="btn-cache" id="btnCache" value="确定更新">
                    </div>
                </form>
            </div>
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /#page-wrapper -->
</div>
<script type="text/javascript" src="/imoocnews/Public/js/admin/common.js"></script>
</body>
</html>
<script type="text/javascript">
    $("#btnCache").click(function(){
        var url = "/imoocnews/home/index/build_html";
        var jump_url = "/imoocnews/admin/basic/cache";
        var postData = {};

        $.post(url,postData,function(result){
            if (result.status == 1){
                //成功
                return dialog.success(result.message,jump_url);
            }
            if(result.status ==0){
                //失败
                return dialog.error(result.message);
            }
        },"json");
    });
</script>