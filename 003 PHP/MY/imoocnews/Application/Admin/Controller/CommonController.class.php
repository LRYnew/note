<?php
namespace Admin\Controller;
use Think\Controller;

/**
 * 公共类
 * @package Admin\Controller
 */
class CommonController extends Controller{
    /**
     * 构造方法
     */
    public function __construct(){
        //继承父元素构造方法
        parent::__construct();
        $this->_init();
    }

    /**
     * 初始化
     */
    private function _init(){
        //判断是否登录
        $isLogin = $this->isLogin();
        if(!$isLogin){
            //未登录跳转到登录页面
            $this->redirect("/admin/login/index");
        }
    }

    /**
     * 获取用户登录信息
     * @return mixed|void
     */
    public function getLoginUser(){
        return session("AdminUser");
    }
    /**
     * 判定是否登录方法
     */
    public function isLogin(){
        $User = $this->getLoginUser();
        //判断$User是否存在/是否为数组/
        if($User && is_array($User)){
            return true;
        }
        return false;
    }
}