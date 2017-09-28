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
    <div class="container">
        <div class="brand-wrapper clearfix">
            <div class="brand-ad">
                <div class="owl-carousel owl-theme">
                    <?php if(is_array($result["topPicNews"])): $i = 0; $__LIST__ = $result["topPicNews"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$topPicNew): $mod = ($i % 2 );++$i;?><div class="item">
                            <a href="/imoocnews/home/detail/index/id/<?php echo ($topPicNew["news_id"]); ?>">
                                <img src="<?php echo ($topPicNew["thumb"]); ?>" alt="<?php echo ($topPicNew["title"]); ?>"/>
                            </a>
                            <div class="banner-info">
                                <span>阅读数</span>
                                <i id="node-33" class="news-count node-<?php echo ($topPicNew["news_id"]); ?>" news-id="<?php echo ($topPicNew["news_id"]); ?>"></i>
                            </div>
                        </div><?php endforeach; endif; else: echo "" ;endif; ?>
                </div>
            </div>
            <div class="brand-rightAd">
                <ul>
                    <?php if(is_array($result["smallPicNews"])): $i = 0; $__LIST__ = $result["smallPicNews"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$smallPicNew): $mod = ($i % 2 );++$i;?><li>
                            <a href="/imoocnews/home/detail/index/id/<?php echo ($topPicNew["news_id"]); ?>">
                                <img src="<?php echo ($smallPicNew["thumb"]); ?>" alt="<?php echo ($smallPicNew["title"]); ?>">
                            </a>
                        </li><?php endforeach; endif; else: echo "" ;endif; ?>
                </ul>
            </div>
        </div>
        <!--广告结束-->
        <div class="news-wrapper">
            <?php if(is_array($result["listNews"])): $i = 0; $__LIST__ = $result["listNews"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><dl class="news-item">
                    <dt class="news-title">
                        <a href="/imoocnews/home/detail/index/id/<?php echo ($vo["news_id"]); ?>" target="_blank" <?php echo (getColor($vo["title_font_color"])); ?>><?php echo ($vo["title"]); ?></a>
                    </dt>
                    <dd class="news-img">
                        <a href="/imoocnews/home/detail/index/id/<?php echo ($vo["news_id"]); ?>"target="_blank">
                            <img src="<?php echo ($vo["thumb"]); ?>" alt="<?php echo ($vo["title"]); ?>">
                            <i <?php if(empty($vo["video"])): ?>class="hide"<?php endif; ?> ></i>
                        </a>
                    </dd>
                    <dd class="news-intro">
                        <?php echo ($vo["description"]); ?>
                    </dd>
                    <dd class="news-info">
                        <?php echo ($vo["keywords"]); ?>
                        <span><?php echo (date("Y-m-d H:i:s",$vo["create_time"])); ?></span>
                        阅读(
                        <i class="news-count node-<?php echo ($vo["news_id"]); ?>" news-id="<?php echo ($vo["news_id"]); ?>"></i>
                        )
                    </dd>
                </dl><?php endforeach; endif; else: echo "" ;endif; ?>
        </div>
        <!--新闻列表结束-->
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
<script type="text/javascript">
    var SCOPE = {
        "count_url" : "/imoocnews/home/index/getCount",
    }
    $(document).ready(function () {
        $(".owl-carousel").owlCarousel({
            items:1,                       //幻灯片每页可见个数
            loop: true,
            autoplay: true,                 //自动播放，可选布尔值或整数，若使用整数，如 3000，表示 3 秒切换一次；若设置为 true，默认 5 秒切换一次
            autoplayTimeout: 3000,
            autoplayHoverPause: true
        });
    });
</script>
<script src="/imoocnews/Public/js/count.js"></script>
<script src="/imoocnews/Public/js/party/owl.carousel.2.1.0/owl.carousel.min.js"></script>
<script src="/imoocnews/Public/js/party/picturefill.min.js"></script>
</body>
</html>