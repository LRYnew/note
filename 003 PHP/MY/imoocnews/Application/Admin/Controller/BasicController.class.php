<?php
namespace Admin\Controller;
use Think\Controller;
use Think\Exception;

/**
 * Class BasicController 基本管理控制器
 * @package Admin\Controller
 */
class BasicController extends CommonController{
    public function index(){
        $result = D("Basic")->select();
        $this->assign("type",0);
        $this->assign("content",$result);
        $this->display();
    }

    public function add(){
        if($_POST){
            $title = I("post.title","","string,trim,htmlspecialchars");
            $keywords = I("post.keywords",'','string,trim,htmlspecialchars');
            $description = I("post.description",'','string,trim,htmlspecialchars');
            $cache = I("post.cache",'','int,trim,htmlspecialchars');
            if(!$title){
                return show(0,"标题不符合规则");
            }
            if(!$keywords){
                return show(0,"关键字不符合规则");
            }
            if(!$description){
                return show(0,"描述不符合规则");
            }
            if($cache=== false || $cache==="" || $cache===null){
                return show(0,"更新首页缓存数据不符合规则");
            }
            try{
                $id = D("Basic")->save($_POST);
                return show(1,"操作成功");
            }catch(Exception $e){
                return show(0,$e->getMessage());
            }
        }else{
            return show(0,"没有提交的数据");
        }
    }

    public function cache(){
        $this->assign("type",1);
        $this->display();
    }
}