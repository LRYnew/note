<?php
namespace Home\Controller;
use Think\Controller;
class DetailController extends CommonController{
    public function index(){
        $id = intval($_GET["id"]);
        if(!$id || $id < 0){
            return $this->showError("文章不存在或ID不符合规则");
        }
        $new = D("News")->find($id);
        if(!$new || $new["status"] != 1){
            return $this->showError("文章不存在或已关闭");
        }
        //计数
        $count = intval($new["count"]) + 1;
        $where["count"] = $count;
        $res = D("News")->save($id,$where);
        if($res === false){
            return E("计数失败");
        }
        $content = D("NewsContent")->find($id);
        $new["content"] = htmlspecialchars_decode($content["content"]);

        //右侧广告位
        $rightPicNews = D("PositionContent")->getPositionContent(array(
            "status" => 1,
            "position_id" => 5,
        ),1,10);
        //获取文章排名
        $listRankNews = $this->getRank();
        $this->assign("result",array(
            "new" => $new,
            "rightPicNews" => $rightPicNews,
            "listRankNews" => $listRankNews,
            "catId" => $new["catid"],
        ));
        $this->display("Detail/index");
    }

    public function view(){
        if(!getLoginAdminUsername()){
            return $this->showError("您没有权限进行此操作");
        }
        $this->index();
    }
}