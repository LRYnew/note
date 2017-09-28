<?php
namespace Home\Controller;
use Think\Controller;

/**
 * Class CatController
 * @package Home\Controller
 */
class CatController extends CommonController{
    public function index(){
        $id = intval($_GET["id"]);
        if(!$id){
            return $this->showError("栏目不存在或ID不存在");
        }
        $nav = D("Menu")->find($id);
        if(!$nav || $nav["status"] != 1){
            return $this->showError("栏目不存在");
        }
        //获取新闻列表并分页
        $where["status"] = 1;
        $where["catid"] = $id;
        $where["thumb"] = array("neq","");
        $page = $_REQUEST["p"]?$_REQUEST["p"]:1;
        $pageSize = $_REQUEST["pagesize"]?$_REQUEST["pagesize"]:20;

        $listNews = D("News")->getNews($where,$page,$pageSize);
        $newsCount = D("News")->getNewsCount($where);

        $pageObj = new \Think\Page($newsCount,$pageSize);   //参数:总数 参数:每页数
        $resPage = $pageObj->show();
        //右侧广告位
        $rightPicNews = D("PositionContent")->getPositionContent(array(
            "status" => 1,
            "position_id" => 5,
        ),1,10);
        //获取文章排名
        $listRankNews = $this->getRank();
        $this->assign("result",array(
            "listNews" => $listNews,
            "rightPicNews" => $rightPicNews,
            "listRankNews" => $listRankNews,
            "resPage" => $resPage,
            "catId" => $id,
        ));
        $this->display();
    }
}