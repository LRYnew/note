<?php
namespace Admin\Controller;
use Think\Controller;
use Think\Exception;

/**
 * Class PositionContentCrotroller 推荐内容管理控制器
 * @package Admin\Controller
 */
class PositioncontentController extends CommonController{
    public function index(){
        $data = array();
        if($title = I("get.title",'',"trim,htmlspecialchars")){
            $data["title"] = $title;
            $this->assign("title",$title);
        }
        if($positionId = I("get.position_id")){
            $data["position_id"] = $positionId;
            $this->assign("positionId",$positionId);
        }
        $page = $_REQUEST['p']?$_REQUEST['p']:1;
        $pageSize = $_REQUEST["pagesize"]?$_REQUEST["pagesize"]:5;
        try{
            $positionContent = D("PositionContent")->getPositionContent($data,$page,$pageSize);
            $positionContentCount = D("PositionContent")->getPositionContentCount($data);
            $positions = M("position")->where("status != -1")->select();
        }catch(Exception $e){
            return show(0,$e->getMessage());
        }
        $res = new \Think\Page($positionContentCount,$pageSize);
        $resPage = $res->show();

        $this->assign("positioncontents",$positionContent)
            ->assign("positions",$positions)
            ->assign("resPage",$resPage);
        $this->display();
    }

    //更新状态操作
    public function setstatus(){
        return $this->save(I("post."));
    }
    //更新操作
    public function save($data){
        if(!$data || !is_array($data)){
            return show(0,"数据不符合规则");
        }
        try{
            $resContent = D("PositionContent")->updatePositionContentById($data);
            if($resContent === false || $resContent==""){
                return show(0,"操作失败");
            }
            return show(1,"操作成功");
        }catch(Exception $e){
            return show(0,$e->getMessage());
        }
    }

    //排序操作
    public function listorder(){
        $jumpUrl = $_SERVER["HTTP_REFERER"];
        $data = $_POST["listorder"];
        if(!$data || !is_array($data)){
            return show(0,'排序数据不符合规则');
        }
        foreach($data as $key => $val){
            $where["id"] = $key;
            $where["listorder"] = $val;
            try{
                $resListorder = D("PositionContent")->updatePositionContentById($where);
                if($resListorder === false){
                    $error[] = $key;
                }
            }catch(Exception $e){
                return show(0,$e->getMessage());
            }
        }
        if($error){
            return show(0,"排序失败-".implode(",",$error));
        }
        return show(1,"排序成功",array("jump_url"=>$jumpUrl));
    }

    //添加操作
    public function add(){
        if($_POST){
            try{
                $title = I("post.title","","string,trim,htmlspecialchars");
                $positionId = I("post.position_id",'','int,trim,htmlspecialchars');
                $newsId = I("post.news_id",'','int,htmlspecialchars');
                if(!$title){
                    return show(0,"标题不符合规则");
                }
                if($positionId === "" || $positionId == null){
                    return show(0,"未查找到相关推荐位");
                }
                if($_POST["url"]){
                    $url = I("post.url",'',"validate_url");
                    if(!$url){
                        return show(0,"url不符合规则");
                    }
                }
                $news = M("news")->where("status != -1")->field("news_id")->select();
                foreach($news as $new){
                    $newId[] = $new["news_id"];
                }
                if($newsId){
                    if(!in_array($newsId,$newId)){
                        return show(0,"未查找到相关文章ID，请重新填写");
                    }
                }
                if($_POST["id"]){
                    return $this->save(I("post."));
                }
                $positionContentId = D("PositionContent")->insert(I("post."));
                if(!$positionContentId){
                    return show(0,"添加失败");
                }
                return show(1,"添加成功");
            }catch(Exception $e){
                return show(0,$e->getMessage());
            }
        }else{
            $positions = M("position")->where("status != -1")->select();
            $this->assign("positions",$positions);
            $this->display();
        }
    }
    //编辑界面
    public function edit(){
        if($id = I("get.id")){
            try{
                $positionContent = D("PositionContent")->find($id);
                if(!$positionContent){
                    return show(0,"ID未查找到相关内容");
                }
                $this->assign("content",$positionContent);
            }catch(Exception $e){
                return show(0,$e->getMessage());
            }
        }
        $positions = M("position")->where("status != -1")->select();
        $this->assign("positions",$positions);
        $this->display();
    }
}