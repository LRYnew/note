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
        <p class="breadcrumb"><i></i>文章管理</p>
        <div class="btn-wrapper">
            <a href="javascript:void(0);"class="btn-add btn-listorder" id="btn-listorder"><i></i>更新排序</a>
            <a href="javascript:void(0);"class="btn-add" id="btn-Add"><i></i>添加</a>
            <form action="/imoocnews/admin.php/admin/content/index" method="get" class="sreach-form">
                <span class="span-1">
                    <label for="">栏目</label>
                    <select name="catid" class="sreach-input" id="">
                        <option value="">全部分类</option>
                        <?php if(is_array($webSiteMenu)): foreach($webSiteMenu as $key=>$sitenav): ?><option value="<?php echo ($sitenav["menu_id"]); ?>" <?php if(($catid) == $sitenav["menu_id"]): ?>selected="selected"<?php endif; ?>>
                                <?php echo ($sitenav["name"]); ?>
                            </option><?php endforeach; endif; ?>
                    </select>
                </span>
                <span>
                    <input type="text" name="title" value="<?php echo ($title); ?>" class="sreach-input" style="margin-left:20px;" placeholder="文章标题">
                </span>
                <span>
                    <input type="submit" class="btn-submit" value="" style="margin-left:-5px;border-radius:0px;">
                </span>
            </form>
            <form action="" method="" class="sreach-form">
                <span class="span-1">
                    <select name="position_id" class="sreach-input" id="positionId" style="min-width:170px;">
                        <option value="0">请选择推荐位进行推送</option>
                        <?php if(is_array($positions)): foreach($positions as $key=>$position): ?><option value="<?php echo ($position["id"]); ?>"><?php echo ($position["name"]); ?></option><?php endforeach; endif; ?>
                    </select>
                </span>
                <span>
                    <input type="button" class="btn-position" value="推送" id="btnPosition">
                </span>
            </form>
        </div>
        <div class="table-wrapper">
            <form id="form-table">
            <table cellpadding="0" cellspacing="0" border="0">
                <tr>
                    <th style="text-align:center;width:30px;">
                        <input type="checkbox">
                    </th>
                    <th colspan="1">排序</th>
                    <th colspan="1">id</th>
                    <th colspan="1">标题</th>
                    <th colspan="1">栏目</th>
                    <th colspan="1">来源</th>
                    <th colspan="1">封面图</th>
                    <th colspan="1">时间</th>
                    <th colspan="1">状态</th>
                    <th colspan="1">操作</th>
                </tr>
                <?php if(is_array($news)): $i = 0; $__LIST__ = $news;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$new): $mod = ($i % 2 );++$i;?><tr>
                        <td style="text-align:center;width:10px;">
                            <input type="checkbox" name="pushcheck" value="<?php echo ($new["news_id"]); ?>">
                        </td>
                        <td><input type="text" name="listorder[<?php echo ($new["news_id"]); ?>]" value="<?php echo ($new["listorder"]); ?>" size="4"/></td>
                        <td><?php echo ($new["news_id"]); ?></td>
                        <td><?php echo ($new["title"]); ?></td>
                        <td><?php echo (getCatName($webSiteMenu,$new["catid"])); ?></td>
                        <td><?php echo (getCopyFromName($new["copyfrom"])); ?></td>
                        <td><?php echo (isThumb($new["thumb"])); ?></td>
                        <td><?php echo (date("Y-m-d H:i:s",$new["create_time"])); ?></td>
                        <td><span class="btn-status" atr-id="<?php echo ($new["news_id"]); ?>" atr-message="是否更改状态" atr-status=<?php if(($new["status"]) == "0"): ?>1<?php else: ?>0<?php endif; ?>><?php echo (getStatus($new["status"])); ?></span></td>
                        <td>
                            <a href="javascript:void(0)" class="btn-update" id="btn-Update-<?php echo ($new["news_id"]); ?>" title="编辑" atr-id="<?php echo ($new["news_id"]); ?>"><i></i></a>
                            <a href="javascript:void(0)" class="btn-delete" id="btn-Delete-<?php echo ($new["news_id"]); ?>" title="删除" atr-id="<?php echo ($new["news_id"]); ?>" atr-message="是否确定删除"><i></i></a>
                            <a href="/imoocnews/home/detail/view/id/<?php echo ($new["news_id"]); ?>" target="_blank" class="btn-view" id="btn-View-<?php echo ($new["news_id"]); ?>" title="预览" atr-id="<?php echo ($new["news_id"]); ?>"><i></i></a>
                        </td>
                    </tr><?php endforeach; endif; else: echo "" ;endif; ?>
            </table>
            </form>
            <div class="page-box">
                <?php echo ($resPage); ?>
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
<script type="text/javascript">
    var SCOPE = {
        'add_url' : "/imoocnews/admin/content/add",
        'edit_url' : "/imoocnews/admin/content/edit",
        "set_status_url":"/imoocnews/admin/content/setstatus",
        "listorder_url" : "/imoocnews/admin/content/listorder",
        "position_url":"/imoocnews/admin/content/push",
    }
</script>