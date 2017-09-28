<?php
namespace Admin\Controller;
use Think\Controller;
use Think\Exception;

/**
 * Class ContentController 文章管理控制器
 * @package Admin\Controller
 */
class ContentController extends CommonController{

    public function index(){
        if($_REQUEST["catid"]){
            $where["catid"] = intval($_REQUEST["catid"]);
            $this->assign("catid",intval($_REQUEST["catid"]));
        }
        if($_REQUEST["title"]){
            $where["title"] = $_REQUEST["title"];
            $this->assign("title",$_REQUEST["title"]);
        }

        $where["status"] = array("neq",-1);
        $page = $_REQUEST["p"]?$_REQUEST["p"]:1;
        $pageSize = $_REQUEST["pagesize"]?$_REQUEST["pagesize"]:5;

        $news = D("News")->getNews($where,$page,$pageSize);
        $newsCount = D("News")->getNewsCount($where);

        $pageObj = new \Think\Page($newsCount,$pageSize);   //参数:总数 参数:每页数
        $resPage = $pageObj->show();

        $positions = M("position")->where($where)->select();
        if($positions){
            $this->assign("positions",$positions);
        }
        $this->assign("news",$news);
        $this->assign("resPage",$resPage);
        $this->assign("webSiteMenu",D("Menu")->getBarMenus());
        $this->display();
    }
    //添加方法
    public function add(){
        if($_POST){
            $title = I('post.title','','string,trim,htmlspecialchars');
            $small_title = I('post.small_title','','string,trim,htmlspecialchars');
            $title_font_color = I('post.title_font_color','','string,trim,htmlspecialchars');
            $catid = I('post.catid','','int,trim,htmlspecialchars');
            $copyfrom = I('post.copyfrom','','int,trim,htmlspecialchars');
            $content = I('post.content','','trim,htmlspecialchars');
            $description = I('post.description','','string,trim,htmlspecialchars');
            $keywords = I('post.keywords','','string,trim,htmlspecialchars');
            if(!$title){
                return show(0,'标题不符合规则');
            }
            if(!$small_title){
                return show(0,'短标题不符合规则');
            }
            if(!$title_font_color){
                return show(0,'请选择颜色值');
            }
            if($catid === false || $catid == ""){
                return show(0,'所属栏目不存在');
            }
            if($copyfrom === false || $copyfrom == ""){
                //return show(0,'请重新选择来源');
                return show(0,$copyfrom);
            }
            if(!$content){
                return show(0,'内容不符合规则');
            }
            if(!$description){
                return show(0,'简介内容不符合规则');
            }
            if(!$keywords){
                return show(0,'关键字内容不符合规则');
            }
            if(I("post.news_id")){
                return $this->update($_POST);
            }
            $newsId = D("News")->insert(I("post."));
            if($newsId){
                $newContentData["content"] = $_POST['content'];
                $newContentData["news_id"] = $newsId;
                $contentId = D("NewsContent")->insert($newContentData);
                if($contentId === false){
                    return show(0,"主表新增成功,文章内容新增失败");
                }
                return show(1,"新增成功");
            }
            return show(0,"新增失败");
        }else{
            $webSiteMenu = D("Menu")->getBarMenus();
            $titleColor = C("TITLE_FONT_COLOR");
            $copyFrom = C("COPY_FROM");
            $this->assign("webSiteMenu",$webSiteMenu)
                ->assign("titleColor",$titleColor)
                ->assign("copyFrom",$copyFrom);
            $this->display();
        }
    }
    //编辑方法
    public function edit(){
        $id = I("get.id");
        if($id){
            $news = D("News")->find($id);
            $newsContent = D("NewsContent")->find($id);
            $this->assign("news",$news)
                ->assign("newscontent",$newsContent);
        }else{
            return redirect(__ROOT__."/admin/content/index");
        }
        $webSiteMenu = D("Menu")->getBarMenus();
        $titleColor = C("TITLE_FONT_COLOR");
        $copyFrom = C("COPY_FROM");
        $this->assign("webSiteMenu",$webSiteMenu)
            ->assign("titleColor",$titleColor)
            ->assign("copyFrom",$copyFrom);
        $this->display();
    }
    //更新方法
    public function update($data){
        $id = $data["news_id"];
        $newsId = D("News")->save($id,$data);
        if($newsId){
            $newContentData["content"] = $data['content'];
            $contentId = D("NewsContent")->save($id,$newContentData);
            if($contentId === false){
                return show(0,"主表更新成功,文章内容更新失败");
            }
            return show(1,"更新成功");
        }
        return show(0,"更新失败");
    }
    //修改状态
    public function setstatus(){
        $id = I("post.id");
        $status = I("post.status");
        if(!$id){
            return show(0,"Id不存在");
        }
        if(!$status){
            return show(0,"状态值出现问题");
        }
        try{
            $data["status"] = $status;
            $newsId = D("News")->updateStatus($id,$data);
            if($newsId === false){
                return show(0,"操作失败");
            }
            return show(1,"操作成功");
        }catch(Exception $e){
            return show(0,$e->getMessage());
        }
    }
    //排序操作
    public function listorder(){
        if($_POST){
            $listorder = $_POST["listorder"];
            $jumpUrl = $_SERVER['HTTP_REFERER'];
            $data["jump_url"] = $jumpUrl;
            try{
                if(!$listorder || !is_array($listorder)){
                    return show(0,"排序值出现错误");
                }else{
                    foreach($listorder as $newsId => $value){
                        $res = D("News")->updateListorderById($newsId,$value);
                        if($res === false){
                            $error[] = $newsId;
                        }
                    }
                }
            }catch(Exception $e){
                return show(0,$e->getMessage());
            }
            if($error){
                return show(0,"排序出现错误,id为:".implode(",",$error));
            }
            return show(1,"排序操作成功",$data);
        }
        return show(0,"排序失败");
    }
    //推送操作
    public function push(){
        $jumpUrl = $_SERVER["HTTP_REFERER"];
        $positionId = I("post.position_id",'','int,trim,htmlspecialchars');
        $newIds = I("post.push");
        if($positionId === false ||$positionId == ""){
            return show(0,"推荐位ID不符合规则，请重新选择");
        }
        if(!$newIds || !is_array($newIds)){
            return show(0,"请重新选择文章进行推荐");
        }
        try{
            $news = D("News")->getNewsByIdIn($newIds);
            if(!$news){
                return show(0,"未查找到相关文章内容，无法推荐");
            }
            foreach($news as $new){
                $data = array(
                    "position_id"=>$positionId,
                    "title" =>$new["title"],
                    "thumb"=>$new["thumb"],
                    "news_id"=>$new["news_id"],
                    "status"=>"1",
                    "create_time"=>$new["create_time"],
                );
                $position = D("PositionContent")->insert($data);
                if(!$position){
                    $error[] = $new["news_id"];
                }
            }
        }catch(Exception $e){
            return show(0,$e->getMessage());
        }
        if($error){
            return show(0,"文章未推荐成功-".implode(",",$error));
        }
        return show(1,"推荐成功",array("jump_url"=>$jumpUrl));
    }
}