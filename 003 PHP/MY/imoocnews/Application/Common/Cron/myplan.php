<?php
//定时判断是否更新缓存
$config = D("Basic")->select();
$home = new \Home\Controller\IndexController();

if($config["cache"] == 1){
    $home->index("buildHtml");
}