<?php
namespace Home\Controller;
use Think\Controller;
use Think\Exception;

class IndexController extends CommonController{
    public function index($type = ""){
        //首页大图
        $topPicNews = D("PositionContent")->getPositionContent(array(
            "status" => 1,
            "position_id" => 2,
        ),1,20);
        //首页大图右侧
        $smallPicNews = D("PositionContent")->getPositionContent(array(
            "status" => 1,
            "position_id" => 3,
        ),1,3);
        //文章列表
        $listNews = D("News")->getNews(array(
            "status" =>1,
        ),1,10);
        //右侧广告位
        $rightPicNews = D("PositionContent")->getPositionContent(array(
            "status" => 1,
            "position_id" => 5,
        ),1,10);
        //获取文章排名
        $listRankNews = $this->getRank();

        $this->assign("result",array(
            "topPicNews" => $topPicNews,
            "smallPicNews" =>$smallPicNews,
            "listNews" => $listNews,
            "rightPicNews" => $rightPicNews,
            "listRankNews" => $listRankNews,
        ));

        //静态化判断
        if($type == "buildHtml"){
            $this->buildHtml('index',HTML_PATH,"Index/index");
        }else{
            $this->display();
        }
    }

    //生成静态化首页页面
     public function build_html(){
         $this->index("buildHtml");
         return show(1,"首页缓存更新成功");
     }

    //异步获取文章阅读数
    public function getCount(){
        if(!$_POST){
            return show(0,"没有上传文章内容");
        }
        $newsIds = array_unique($_POST);
        try{
            $listNews = D("News")->getNewsByIdIn($newsIds);
        }catch(Exception $e){
            return show(0,$e->getMessage());
        }
        if(!$listNews){
            return show(0,"没有数据");
        }
        $data = array();
        foreach($listNews as $k => $v){
            $data[ $v["news_id"] ] = $v["count"];
        }
        return show(1,"success",$data);
    }
}