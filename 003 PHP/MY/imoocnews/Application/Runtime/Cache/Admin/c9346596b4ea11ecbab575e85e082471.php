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
            <p class="breadcrumb"><i></i>文章添加</p>
            <div class="form-wrapper">
                <form method="post" class="form-box" id="form-add">
                    <input type="hidden" name="news_id" value="<?php echo ($news["news_id"]); ?>">
                    <div>
                        <label for="formTextTitle" class="form-label">标题:</label>
                        <input type="text" name="title" class="form-text" placeholder="请填写文章标题" id="formTextTitle" value="<?php echo ($news["title"]); ?>">
                    </div>
                    <div>
                        <label for="formTextSmallTitle" class="form-label">短标题:</label>
                        <input type="text" name="small_title" value="<?php echo ($news["small_title"]); ?>" class="form-text" placeholder="请填写文章短标题" id="formTextSmallTitle">
                    </div>
                    <div>
                        <label for="file_upload" class="form-label">缩略图:</label>
                        <div class="thumb_box" style="display:inline-block;vertical-align:top;width:50%;min-width:400px;">
                            <input id="file_upload"  type="file" multiple="true" id="file_upload">
                            <img id="upload_org_code_img" src="<?php echo ($news["thumb"]); ?>" width="150" height="150" <?php echo (getImgShow($news["thumb"])); ?>>
                            <input id="file_upload_image" name="thumb" type="hidden" multiple="true" value="<?php echo ($news["thumb"]); ?>">
                        </div>
                    </div>
                    <div>
                        <label for="video_upload" class="form-label">视频:</label>
                        <div class="thumb_box" style="display:inline-block;vertical-align:top;width:50%;min-width:400px;">
                            <input type="file" multiple="true" id="video_upload">
                            <!--<img style="display:none" id="upload_org_code_video" src="" width="150" height="150">-->
                            <input id="file_upload_video" value="<?php echo ($news["video"]); ?>" class="form-text" name="video" type="text" multiple="true" value="" placeholder="视频URL地址">
                        </div>
                    </div>
                    <div>
                        <label for="formSelectColor" class="form-label">标题颜色:</label>
                        <select class="form-select" name="title_font_color" id="formSelectColor">
                            <option value="">==请选择颜色==</option>
                            <?php if(is_array($titleColor)): foreach($titleColor as $key=>$color): ?><option value="<?php echo ($key); ?>" <?php echo (getTitleColor($key,$news["title_font_color"])); ?>><?php echo ($color); ?></option><?php endforeach; endif; ?>
                        </select>
                    </div>
                    <div>
                        <label for="formSelectCatid" class="form-label">所属栏目:</label>
                        <select class="form-select" name="catid" id="formSelectCatid">
                            <?php if(is_array($webSiteMenu)): foreach($webSiteMenu as $key=>$sitenav): ?><option value="<?php echo ($sitenav["menu_id"]); ?>" <?php if(($news["catid"]) == $sitenav["menu_id"]): ?>selected="selected"<?php endif; ?>><?php echo ($sitenav["name"]); ?></option><?php endforeach; endif; ?>
                        </select>
                    </div>
                    <div>
                        <label for="formSelectCopyfrom" class="form-label">来源:</label>
                        <select class="form-select" name="copyfrom" id="formSelectCopyfrom">
                            <?php if(is_array($copyFrom)): foreach($copyFrom as $key=>$cfrom): ?><option value="<?php echo ($key); ?>" <?php if(($news["copyfrom"]) == $key): ?>selected="selected"<?php endif; ?>><?php echo ($cfrom); ?></option><?php endforeach; endif; ?>
                        </select>
                    </div>
                    <div>
                        <label for="editor_singcms" class="form-label">内容:</label>
                        <div style="display: inline-block;vertical-align: text-top">
                            <textarea class="input js-editor" id="editor_singcms" name="content" rows="20"><?php echo ($newscontent["content"]); ?></textarea>
                        </div>
                    </div>
                    <div>
                        <label for="formTextDescription" class="form-label">描述:</label>
                        <input type="text" name="description" value="<?php echo ($news["description"]); ?>" class="form-text" placeholder="描述" id="formTextDescription">
                    </div>
                    <div>
                        <label for="formTextKeywords" class="form-label">关键字:</label>
                        <input type="text" name="keywords" value="<?php echo ($news["keywords"]); ?>" class="form-text" placeholder="关键字" id="formTextKeywords">
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
        'save_url' : "/imoocnews/admin/content/add",
        'jump_url' : "/imoocnews/admin/content/index",
        "ajax_upload_image_url":"/imoocnews/admin/image/ajaxuploadimage",
        "ajax_upload_video_url":"/imoocnews/admin/video/ajaxuploadvideo",
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