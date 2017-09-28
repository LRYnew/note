<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<?php
 $config = D("Basic")->select(); $navs = D("Menu")->getBarMenus(); ?>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html,charset=utf-8">
    <meta http-equiv="x-ua-compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
    <meta name = "format-detection" content="telephone = no" />
    <title><?php echo ($config["title"]); ?></title>
    <meta name="keyword" content="<?php echo ($config["keywords"]); ?>" />
    <meta name="description" content="<?php echo ($config["description"]); ?>" />
    <link rel="icon" href="/imoocnews/favicon.ico" type="image/x-icon" />
    <link rel="shortcut icon" href="/imoocnews/favicon.ico" type="image/x-icon"/>
    <!--引用CSS-->
    <link rel="stylesheet" type="text/css" href="/imoocnews/Public/css/normalize.css" />
    <link rel="stylesheet" type="text/css" href="/imoocnews/Public/css/home.css" />
    <link rel="stylesheet" href="/imoocnews/Public/js/party/owl.carousel.2.1.0/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="/imoocnews/Public/js/party/owl.carousel.2.1.0/assets/owl.theme.default.min.css">
    <!--引用JS-->
    <script type="text/javascript" src="/imoocnews/Public/js/jquery.min.js"></script>
    <script type="text/javascript" src="/imoocnews/Public/js/dialog/layer.js"></script>
    <script type="text/javascript" src="/imoocnews/Public/js/dialog.js"></script>
</head>
<header>
    <div class="logo-box">
        <a href="/imoocnews" class="logo-content"><img src="/imoocnews/Public/images/home/logo.png" alt="logo"></a>
    </div>
    <ul class="nav-box clearfix">
        <li><a href="/imoocnews" class='<?php if($result["catId"] == 0): ?>active<?php endif; ?>'>首页</a></li>
        <?php if(is_array($navs)): $i = 0; $__LIST__ = $navs;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$nav): $mod = ($i % 2 );++$i;?><li><a href="/imoocnews/<?php echo ($nav["m"]); ?>/<?php echo ($nav["c"]); ?>/<?php echo ($nav["f"]); ?>/id/<?php echo ($nav["menu_id"]); ?>" <?php if( $nav['menu_id'] == $result['catId']): ?>class='active'<?php endif; ?>><?php echo ($nav["name"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
    </ul>
</header>
<div class="wrapper clearfix">
    <section>
        <div class="container-error" style="text-align:center;">
            <h1 style="color:red"><?php echo ($message); ?></h1>
            <h3 id="location" >系统将在<span style="color:red">3</span>秒后自动跳转到首页</h3>
        </div>
    </section>
</div>
<script type="text/javascript">
    //首页
    var url = "/imoocnews";
    var time = 3;
    setInterval("refer()",1000);
    function refer() {
        if(time==0) {
            location.href=url;
        }
        $("#location span").html(time);
        time--;
    }
</script>