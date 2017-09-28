<?php
namespace Admin\Controller;
use Think\Controller;
use Think\Exception;
use Think\Think;

/**
 * Class AdminController
 * @package Admin\Controller
 */
class AdminController extends CommonController{
    public function index(){
        $data = array();
        $page = $_GET["p"]?$_GET["p"]:1;
        $pageSize = $_GET["pagesize"]?$_GET["pagesize"]:5;
        $Users = D("Admin")->getAdminUser($data,$page,$pageSize);
        if(!$Users){
            return show(0,"未查找到用户信息");
        }
        $UsersCount = D("Admin")->getAdminUserConut($data);

        $pageObj = new \Think\Page($UsersCount,$pageSize);
        $resPage = $pageObj->show();
        $this->assign("users",$Users)
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
            $resContent = D("Admin")->updateAdminById($data);
            if($resContent === false || $resContent==""){
                return show(0,"操作失败");
            }
            return show(1,"操作成功");
        }catch(Exception $e){
            return show(0,$e->getMessage());
        }
    }

    //添加操作
    public function add(){
        if($_POST){
            $username = I("post.username","","string,trim,htmlspecialchars");
            $realname = I("post.realname","","string,trim,htmlspecialchars");
            if($_POST["password"]){
                $password = I("post.password","","string,trim,htmlspecialchars");
                if(!$password){
                    return show(0,"密码不符合规则,请重新填写");
                }
            }
            if(!$username){
                return show(0,"用户名不符合规则,请重新填写");
            }
            if(!$realname){
                return show(0,"请填写正确的真实姓名");
            }
            if($_POST["email"]){
                $email = I("post.email","","email");
                if(!$email){
                    return show(0,"邮箱不符合规则");
                }
            }
            if($id = $_POST["admin_id"]){
                $where["email"] = $email;
                $where["realname"] = $realname;
                $where["id"] = $id;
                return $this->save($where);
            }
            $data = $_POST;
            $password = getMd5Password($password);
            $data["password"] = $password;
            try{
                $adminId = D("Admin")->insert($data);
                if(!$adminId){
                    return show(0,"添加失败");
                }
                return show(1,"添加成功");
            }catch(Exception $e){
                return show(0,$e->getMessage());
            }
        }else{
            $this->display();
        }
    }
    //用户信息编辑操作
    public function edit(){
        $id = $_GET["id"];
        try{
            $user = D("Admin")->find($id);
            if(!$user){
                return show(0,"未查找到相关用户信息");
            }
        }catch(Exception $e){
            return show(0,$e->getMessage());
        }
        $this->assign("user",$user);
        $this->display();
    }
    //用户密码修改操作
    public function editpassword(){
        if($_POST){
            $oldPassword = I("post.old_password","","string,trim,htmlspecialchars");
            $password = I("post.password","","string,trim,htmlspecialchars");
            $id = I("post.admin_id","","int,trim,htmlspecialchars");
            if(!$oldPassword){
                return show(0,"原密码输入不符合规则");
            }
            if(!$password){
                return show(0,"新密码输入不符合规则");
            }
            $oldPassword = getMd5Password($oldPassword);
            $password = getMd5Password($password);
            $user = D("Admin")->find($id);
            if(!$user){
                return show(0,"未查找到相关用户信息");
            }
            if($oldPassword == $user["password"]){
                $where["password"] = $password;
                $where["id"] = $id;
                return $this->save($where);
            }else{
                return show(0,"原密码错误,密码修改失败");
            }
        }else{
            $id = intval($_GET["id"]);
            try{
                $user = D("Admin")->find($id);
                if(!$user){
                    return show(0,"未查找到相关用户信息");
                }
            }catch(Exception $e){
                return show(0,$e->getMessage());
            }
            $this->assign("user",$user);
            $this->display();
        }
    }
}