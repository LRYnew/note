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
                <form method="post" class="form-box" id="form-add">
                    <div>
                        <label for="formTextTitle" class="form-label">站点标题:</label>
                        <input type="text" name="title" class="form-text" placeholder="请填写站点标题" id="formTextTitle" value="<?php echo ($content["title"]); ?>">
                    </div>
                    <div>
                        <label for="formTextKeyword" class="form-label">站点关键词:</label>
                        <input type="text" name="keywords" class="form-text" placeholder="请填写关键词" id="formTextKeyword" value="<?php echo ($content["keywords"]); ?>">
                    </div>
                    <div>
                        <label for="formTextDescription" class="form-label">站点描述:</label>
                        <textarea name="description" class="form-text" placeholder="请填写站点描述" id="formTextDescription" style="vertical-align:text-top;"><?php echo ($content["description"]); ?></textarea>
                    </div>

                    <div>
                        <label class="form-label">是否自动生成首页缓存:</label>

                        <div class="form-radio-box">
                            <input type="radio" value="1" name="cache" class="form-radio" id="form-cache-start" <?php if(($content["cache"]) == "1"): ?>checked="checked"<?php endif; ?>/>
                            <label for="form-cache-start"></label>
                        </div>
                        <label for="form-cache-start">开启</label>

                        <div class="form-radio-box">
                            <input type="radio" value="0" name="cache" class="form-radio" id="form-cache-close" <?php if(($content["cache"]) == "0"): ?>checked="checked"<?php endif; ?>/>
                            <label for="form-cache-close"></label>
                        </div>
                        <label for="form-cache-close">关闭</label>

                    </div>

                    <div>
                        <a href="javascript:void(0);" class="btn-submit" id="submit-add">提交</a>
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
    var SCOPE = {
        'save_url' : "/imoocnews/admin/basic/add",
        'jump_url' : "/imoocnews/admin/basic/index",
    }
</script>