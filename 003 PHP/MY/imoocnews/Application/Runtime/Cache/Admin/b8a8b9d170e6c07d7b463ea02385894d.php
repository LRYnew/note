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
        <p class="breadcrumb"><i></i>推荐位内容管理</p>
        <div class="btn-wrapper">
            <a href="javascript:void(0);"class="btn-add btn-listorder" id="btn-listorder"><i></i>更新排序</a>
            <a href="javascript:void(0);"class="btn-add" id="btn-Add"><i></i>添加</a>
            <form action="/imoocnews/admin/positioncontent/index" method="get" class="sreach-form">
                <span class="span-1">
                    <label for="">推荐位</label>
                    <select name="position_id" class="sreach-input" >
                        <option value="">选择搜索推荐位</option>
                        <?php if(is_array($positions)): foreach($positions as $key=>$position): ?><option value="<?php echo ($position["id"]); ?>" <?php if(($positionId) == $position["id"]): ?>selected="selected"<?php endif; ?>>
                                <?php echo ($position["name"]); ?>
                            </option><?php endforeach; endif; ?>
                    </select>
                </span>
                <span>
                    <input type="text" name="title" value="<?php echo ($title); ?>" class="sreach-input" style="margin-left:20px;" placeholder="文章标题">
                </span>
                <span>
                    <input type="submit" class="btn-submit" value="">
                </span>
            </form>
        </div>
        <div class="table-wrapper">
            <form id="form-table">
            <table cellpadding="0" cellspacing="0" border="0">
                <tr>
                    <th colspan="1">排序</th>
                    <th colspan="1">id</th>
                    <th colspan="1">标题</th>
                    <th colspan="1">时间</th>
                    <th colspan="1">封面图</th>
                    <th colspan="1">状态</th>
                    <th colspan="1">操作</th>
                </tr>
                <?php if(is_array($positioncontents)): $i = 0; $__LIST__ = $positioncontents;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$positioncontent): $mod = ($i % 2 );++$i;?><tr>
                        <td width="10"><input size="4" type="text" name="listorder[<?php echo ($positioncontent["id"]); ?>]" value="<?php echo ($positioncontent["listorder"]); ?>"/></td>
                        <td><?php echo ($positioncontent["id"]); ?></td>
                        <td><?php echo ($positioncontent["title"]); ?></td>
                        <td><?php echo (date("Y-m-d H:i:s",$positioncontent["create_time"])); ?></td>
                        <td>
                            <?php echo (isThumb($positioncontent["thumb"])); ?>
                        </td>
                        <td>
                            <span class="btn-status" atr-id="<?php echo ($positioncontent["id"]); ?>" atr-message="是否更改状态" atr-status=<?php if(($positioncontent["status"]) == "0"): ?>1<?php else: ?>0<?php endif; ?>><?php echo (getStatus($positioncontent["status"])); ?></span>
                        </td>
                        <td>
                            <a href="javascript:void(0)" class="btn-update" id="btn-Update-<?php echo ($positioncontent["id"]); ?>" title="编辑" atr-id="<?php echo ($positioncontent["id"]); ?>"><i></i></a>
                            <a href="javascript:void(0)" class="btn-delete" id="btn-Delete-<?php echo ($positioncontent["id"]); ?>" title="删除" atr-id="<?php echo ($positioncontent["id"]); ?>" atr-message="是否确定删除"><i></i></a>
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
        'add_url' : "/imoocnews/admin/positioncontent/add",
        'edit_url' : "/imoocnews/admin/positioncontent/edit",
        "set_status_url":"/imoocnews/admin/positioncontent/setstatus",
        "listorder_url":"/imoocnews/admin/positioncontent/listorder",
    }
</script>