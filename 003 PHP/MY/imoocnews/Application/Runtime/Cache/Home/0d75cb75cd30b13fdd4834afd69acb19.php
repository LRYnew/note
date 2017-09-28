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
    <div class="container detail">
        <div class="news-wrapper">
            <h1 style="text-align:center"><?php echo ($result["new"]["title"]); ?></h1>
            <?php if(!empty($result["new"]["video"])): ?><div class="video-box">
                    <!--<video controls class="news-video">-->
                        <!--<source src="<?php echo ($result["new"]["video"]); ?>" type="video/mp4">-->
                        <!--您的浏览器不支持该视频播放。-->
                    <!--</video>-->
                    <div id="mediaplayer" class="mediaplayer"></div>
                </div><?php endif; ?>
            <?php echo ($result["new"]["content"]); ?>
        </div>
        <!--新闻内容结束-->
    </div>
    <div class="right-area">
    <div class="right-title">
        <h3>文章排行</h3>
        <span>TOP ARTICLES</span>
    </div>
    <div class="right-content">
        <ul>
            <?php if(is_array($result["listRankNews"])): foreach($result["listRankNews"] as $k=>$vo): ?><li class="num<?php echo ($k+1); ?>">
                    <a href="/imoocnews/home/detail/index/id/<?php echo ($vo["news_id"]); ?>"><?php echo ($vo["title"]); ?></a>
                    <div class="intro"><?php echo ($vo["description"]); ?></div>
                </li><?php endforeach; endif; ?>
        </ul>
    </div>
    <!-- 文章排行结束 -->
    <?php if(is_array($result["rightPicNews"])): $i = 0; $__LIST__ = $result["rightPicNews"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="right-hot">
            <a target="_blank" href="/imoocnews/home/detail/index/id/<?php echo ($vo["news_id"]); ?>">
                <img src="<?php echo ($vo["thumb"]); ?>" alt="<?php echo ($vo["title"]); ?>">
            </a>
        </div><?php endforeach; endif; else: echo "" ;endif; ?>
    <!-- 右侧广告位结束 -->
</div>
<!-- 右侧区域结束 -->
</div>
<!--[if IE]>
<script type="text/javascript" src="/imoocnews/Public/js/party/jwplayer/jwplayer.html5.js"></script>
<![endif]-->
<script type="text/javascript" src="/imoocnews/Public/js/party/jwplayer/jwplayer.js"></script>
<script type="text/javascript" src="/imoocnews/Public/js/party/jwplayer/jwpsrv.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $(".owl-carousel").owlCarousel({
            items:1,                       //幻灯片每页可见个数
            loop: true,
            autoplay: true,                 //自动播放，可选布尔值或整数，若使用整数，如 3000，表示 3 秒切换一次；若设置为 true，默认 5 秒切换一次
            autoplayTimeout: 3000,
            autoplayHoverPause: true
        });

        var image = "<?php echo ($result["new"]["thumb"]); ?>";
        var file = "<?php echo ($result["new"]["video"]); ?>";
        var swf ="/imoocnews/Public/js/party/jwplayer/jwplayer.flash.swf";
        jwplayer('mediaplayer').setup({
            'flashplayer':swf,
            'image':image,
            'id': 'playerID',
            'width': '100%',
            //'height':'400',
            'aspectratio':'10:6',    //自适应宽高比例，如果设置宽高比，可设置宽度100%,高度不用设置
            'file':file,
            'controlbar':"over",
            'repeat':"always",
            'screencolor':"#fff",
            // 'autostart':'true',
            'enablejs':'true',
            'rotatetime':'10',
            "repeat":false,
            //'displayheight':'400px'
        });
    });
</script>
<script src="/imoocnews/Public/js/party/owl.carousel.2.1.0/owl.carousel.min.js"></script>
<script src="/imoocnews/Public/js/party/picturefill.min.js"></script>
</body>
</html>