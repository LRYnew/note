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
            <p class="breadcrumb"><i></i>平台整理指标</p>
            <div class="form-wrapper">
                <form method="post" class="form-box" id="form-addMenu">
                    <input type="hidden" name="menu_id" value="<?php echo ($menu["menu_id"]); ?>"/>
                    <div>
                        <label for="formTextName" class="form-label">菜单名:</label>
                        <input type="text" name="name" class="form-text" placeholder="请填写菜单名" id="formTextName" value="<?php echo ($menu["name"]); ?>">
                    </div>
                    <div>
                        <label class="form-label">菜单类型:</label>
                        <div class="form-radio-box">
                            <input type="radio" value="1" name="type" class="form-radio" id="form-radio-after" <?php if(($menu["type"]) == "1"): ?>checked="checked"<?php endif; ?>/>
                            <label for="form-radio-after"></label>
                        </div>
                        <label for="form-radio-after">后台菜单</label>
                        <div class="form-radio-box">
                            <input type="radio" value="0" name="type" class="form-radio" id="form-radio-before" <?php if(($menu["type"]) == "0"): ?>checked="checked"<?php endif; ?>/>
                            <label for="form-radio-before"></label>
                        </div>
                        <label for="form-radio-before">前端菜单</label>
                    </div>
                    <div>
                        <label for="formTextM" class="form-label">模块名:</label>
                        <input type="text" name="m" class="form-text" placeholder="模块名如admin" id="formTextM" value="<?php echo ($menu["m"]); ?>">
                    </div>
                    <div>
                        <label for="formTextC" class="form-label">控制器名:</label>
                        <input type="text" name="c" class="form-text" placeholder="控制器名如index" id="formTextC" value="<?php echo ($menu["c"]); ?>">
                    </div>
                    <div>
                        <label for="formTextA" class="form-label">操作方法名:</label>
                        <input type="text" name="f" class="form-text" placeholder="操作方法如add" id="formTextA" value="<?php echo ($menu["f"]); ?>">
                    </div>
                    <div>
                        <label class="form-label">状态:</label>
                        <div class="form-radio-box">
                            <input type="radio" value="1" name="status" class="form-radio" id="form-radio-start" <?php if(($menu["status"]) == "1"): ?>checked="checked"<?php endif; ?>/>
                            <label for="form-radio-start"></label>
                        </div>
                        <label for="form-radio-start">开启</label>
                        <div class="form-radio-box">
                            <input type="radio" value="0" name="status" class="form-radio" id="form-radio-close" <?php if(($menu["status"]) == "0"): ?>checked="checked"<?php endif; ?>/>
                            <label for="form-radio-close"></label>
                        </div>
                        <label for="form-radio-close">关闭</label>
                    </div>
                    <div>
                        <a href="javascript:void(0);" class="btn-submit" id="submit-add">修改</a>
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
        'save_url' : "/imoocnews/admin/menu/add",
        'jump_url' : "/imoocnews/admin/menu/index",
    }
</script>