<?php
namespace Admin\Controller;
use Think\Controller;
use Think\Exception;

/**
 * 菜单页控制器
 * @package Admin\Controller
 */
class MenuController extends CommonController{
    public function index(){
        /**
         * 分页操作逻辑
         */
        $Menu = D('Menu');
        $data = array();
        if(isset($_REQUEST["type"]) && in_array($_REQUEST["type"],array("0","1"))){
            $data["type"] = intval($_REQUEST["type"]);
            $this->assign("type",$_REQUEST["type"]);
        }else{
            $this->assign("type",-1);
        }

        $page = $_REQUEST['p']?$_REQUEST['p']:1;
        $pageSize = $_REQUEST['pagesize']?$_REQUEST['pagesize']:5;
        $Menus = $Menu->getMenus($data,$page,$pageSize);
        $MenusCount = $Menu->getMenusConut($data);

        $res = new \Think\Page($MenusCount,$pageSize);      //分页类实例
        $resPage = $res->show();                        //分页展示

        $this->assign("resPage",$resPage);
        $this->assign("menus",$Menus);
        $this->assign("menusconut",$MenusCount);
        $this->display();
    }
    //add操作方法
    public function add(){
        if($_POST){
            //I方法验证传入变量：字符串、特殊符号转义、空格
            $name = I('post.name',"","string,htmlspecialchars,trim");
            $m = I('post.m',"","string,htmlspecialchars,trim");
            $c = I('post.c',"","string,htmlspecialchars,trim");
            $f = I('post.f',"","string,htmlspecialchars,trim");
            if(!$name){
                return show(0,"请输入正确菜单名");
            }
            if(!$m){
                return show(0,"请输入正确模块名");
            }
            if(!$c){
                return show(0,"请输入正确控制器名");
            }
            if(!$f){
                return show(0,"请输入正确方法名");
            }
            //判断如果有变量menu_id，为更新操作
            if($_POST['menu_id']){
                $menuId = I('post.menu_id',"","int,trim");
                if(!$menuId){
                    return show(0,"菜单ID不合法");
                }
                return $this->save(I('post.'));
            }
            // 插入数据库
            $MenuId = D("Menu")->insert(I('post.'));
            if($MenuId){
                return show(1,"新增成功",$MenuId);
            }else{
                return show(0,"新增失败",$MenuId);
            }
        }else{
            $this->display("Menu/add");
        }
    }
    //edit操作方法
    public function edit(){
        $menuId = I('get.id');
        $menu = D('Menu')->find($menuId);
        $this->assign("menu",$menu);
        $this->display();
    }

    //save存储操作
    public function save($data){
        $menuId = $data['menu_id'];
        unset($data['menu_id']);
        try{
            $id = D("Menu")->updateMenuById($menuId,$data);
            if($id === false){
                return show(0,"修改失败");
            }
            return show(1,"修改成功");
        }catch(Exception $e){
            return show(0,$e->getMessage());
        }
    }

    //设置status
    public function setstatus(){
        try{
            if($_POST){
                $id = I("post.id","","int,trim");
                $status = I("post.status","","int,trim");
                if(!$id){
                    return show(0,"数据的ID出现问题,请查找原因");
                }
                if(!$status){
                    return show(0,"数据的状态值出现问题，请查找原因");
                }
                //更新状态值
                $res = D("Menu")->updateStatusById($id,$status);
                if($res === false){
                    return show(0,"操作失败");
                }
                return show(1,"操作成功");
            }
        }catch(Exception $e){
            return show(0,$e->getMessage());
        }
        return show(0,"没有提交数据");
    }

    //设置排序功能
    public function listorder(){
            $listorder = $_POST["listorder"];
            $jumpUrl = $_SERVER['HTTP_REFERER'];
            $data["jump_url"] = $jumpUrl;
            if(!$listorder || !is_array($listorder)){
                return show(0,"排序值出现错误");
            }else{
                try{
                    foreach($listorder as $menuId=>$value){
                        //执行更新排序排序
                        $res = D("Menu")->updateListorderById($menuId,$value);
                        if($res === false){
                            $errors[] = $menuId;
                        }
                    }
                }catch(Exception $e){
                    return show(0,$e->getMessage());
                }
                if($errors){
                    return show(0,"排序失败-".implode(",",$errors));
                }
                return show(1,"排序成功",$data);
            }
    }
}