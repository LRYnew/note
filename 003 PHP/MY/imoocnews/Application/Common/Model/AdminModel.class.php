<?php
namespace Common\Model;
use Think\Model;

/***
 * Class AdminModel
 * @package Admin\Model
 */
class AdminModel extends Model{
    private $_db;
    //构造方法
    public function __construct(){
        //实例化Admin对象到$Admin变量
        $this->_db = M('Admin');
    }
    //获取Admin用户方法
    public function getByAdminUser($username){
        $where['username'] = $username;
        $res = $this->_db->where($where)->find();
        return $res;
    }
    //获取全部用户列表
    public function getAdminUser($where=array(),$page=1,$pageSize=10){
        if(!$page || !is_numeric($page)){
            $page = 1;
        }
        if(!$pageSize || !is_numeric($pageSize)){
            $pageSize = 10;
        }
        if(!$where || !is_array($where)){
            $where=array();
        }

        $offset = ($page-1)*$pageSize;

        $where["status"] = array("neq",-1);
        return $this->_db->where($where)->limit($offset,$pageSize)->order("lastlogintime desc,admin_id desc")->select();
    }
    //获取全部用户数量
    public function getAdminUserConut($where=array()){
        if(!$where || !is_array($where)){
            $where=array();
        }
        $where["status"] = array("neq",-1);
        return $this->_db->where($where)->count();
    }

    //更新操作
    public function updateAdminById($data){
        if(!is_numeric($data["id"]) && $data["id"]){
            throw new Exception("ID值未查找到相关内容");
        }
        if($data["status"] && !is_numeric($data["status"])){
            throw new Exception("更新状态不符合规则");
        }
        $where["admin_id"] = $data["id"];
        return $this->_db->where($where)->save($data);
    }

    //插入数据
    public function insert($data){
        if(!$data || !is_array($data)){
            E("添加的数据不符合规则");
        }
        return $this->_db->add($data);
    }

    //获取单条数据
    public function find($id){
        if(!$id || !is_numeric($id)){
            E("ID值不符合规则");
        }
        $where["admin_id"] = $id;
        return $this->_db->where($where)->find();
    }

    //获取今日登陆数
    public function getLastLoginUsers(){
        $time = mktime(0,0,0,date("m"),date("d"),date("Y"));

        $data["status"] = 1;
        $data["lastlogintime"] = array("gt",$time);

        return $this->_db->where($data)->count();
    }
}