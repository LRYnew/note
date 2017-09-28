<?php
namespace Admin\Controller;
use Think\Controller;

/**
 * 资讯内容管理平台登录类
 * @package Admin\Controller
 */
class LoginController extends Controller{
    public function index(){
        if(session("AdminUser")){
            $this->redirect("/admin/index/index");
        }
        $this->display();
    }
    //登录方法
    public function check(){
        //I方法验证传入变量：字符串、特殊符号转义、空格
        $username = I("post.username","","string,htmlspecialchars,trim");
        $password = I("post.password","","string,htmlspecialchars,trim");
        //校验用户名及密码的合法性
        if(!$username){
            return show(0,"请输入合法用户名");
        }elseif(!$password){
            return show(0,"请输入合法密码");
        }else{
            //校验用户数据库数据库信息
            $res = D('Admin')->getByAdminUser($username);
            if(!$res || $res["status"] != 1){
                return show(0,"用户名不存在");
            }elseif($res['password'] !== getMd5Password($password)){
                return show(0,'密码错误,请重新输入');
            }else{
                session('AdminUser',$res);
                $where["id"] = $res["admin_id"];
                $where["lastlogintime"] = time();
                $result = D("Admin")->updateAdminById($where);
                return show(1,"登录成功");
            }
        }
    }
    public function checkOut(){
        session("AdminUser",null);
        return redirect("/imoocnews/admin.php/admin/login/index");
    }
}