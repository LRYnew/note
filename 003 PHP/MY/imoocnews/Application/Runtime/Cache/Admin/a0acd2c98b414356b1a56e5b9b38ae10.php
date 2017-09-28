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
            <p class="breadcrumb"><i></i>推荐内容添加</p>
            <div class="form-wrapper">
                <form method="post" class="form-box" id="form-add">
                    <div>
                        <label for="formTextTitle" class="form-label">标题:</label>
                        <input type="text" name="title" class="form-text" placeholder="请填写推荐内容标题" id="formTextTitle">
                    </div>
                    <div>
                        <label for="formSelectPositionId" class="form-label">选择推荐位:</label>
                        <select class="form-select" name="position_id" id="formSelectPositionId">
                            <?php if(is_array($positions)): foreach($positions as $key=>$position): ?><option value="<?php echo ($position["id"]); ?>"><?php echo ($position["name"]); ?></option><?php endforeach; endif; ?>
                        </select>
                    </div>
                    <div>
                        <label for="file_upload" class="form-label">缩略图:</label>
                        <div class="thumb_box" style="display:inline-block;vertical-align:top;width:50%;min-width:400px;">
                            <input id="file_upload"  type="file" multiple="true" id="file_upload">
                            <img style="display:none" id="upload_org_code_img" src="" width="150" height="150">
                            <input id="file_upload_image" name="thumb" type="hidden" multiple="true" value="">
                        </div>
                    </div>
                    <div>
                        <label for="formTextUrl" class="form-label">url:</label>
                        <input type="text" name="url" class="form-text" placeholder="请填写URL/可为空" id="formTextUrl">
                    </div>
                    <div>
                        <label for="formTextNewsID" class="form-label">文章ID:</label>
                        <input type="text" name="news_id" class="form-text" placeholder="请填写文章ID/可为空" id="formTextNewsID">
                    </div>
                    <div>
                        <label class="form-label">状态:</label>
                        <div class="form-radio-box">
                            <input type="radio" value="1" name="status" class="form-radio" id="form-radio-start" checked="checked"/>
                            <label for="form-radio-start"></label>
                        </div>
                        <label for="form-radio-start">开启</label>
                        <div class="form-radio-box">
                            <input type="radio" value="0" name="status" class="form-radio" id="form-radio-close"/>
                            <label for="form-radio-close"></label>
                        </div>
                        <label for="form-radio-close">关闭</label>
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
<script src="/imoocnews/Public/js/kindeditor/kindeditor-all.js"></script>
<script src="/imoocnews/Public/js/admin/image.js"></script>
<script type="text/javascript">
    var SCOPE = {
        'save_url' : "/imoocnews/admin/positioncontent/add",
        'jump_url' : "/imoocnews/admin/positioncontent/index",
        "ajax_upload_image_url":"/imoocnews/admin/image/ajaxuploadimage",
        "ajax_upload_swf_path":"/imoocnews/Public/js/party/uploadify.swf",
    }
    //6.2
    KindEditor.ready(function(K) {
        window.editor = K.create('#editor_singcms',{
            uploadJson : '/imoocnews/admin.php?c=image&a=kindupload',
            afterBlur : function(){this.sync();}, //this.sync();同步KindEditor的值到textarea文本框
        });
    });
</script>