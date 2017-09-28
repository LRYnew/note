<?php
namespace Home\Controller;
use Think\Controller;

/**
 * Class CommonController 公共控制器
 * @package Home\Controller
 */
class CommonController extends Controller{
    public function __construct(){
        header("Content-type:text/html;charset = utf-8");
        parent::__construct();
    }
    //获取文章排行方法
    public function getRank(){
        $conds["status"] = 1;
        $news = D("News")->getRank($conds,10);
        return $news;
    }
    //异常方法
    public function showError($message = ""){
        $message = $message?$message:"未知页面或者系统发生错误";
        $this->assign("message",$message);
        $this->display("Index/error");
    }
}