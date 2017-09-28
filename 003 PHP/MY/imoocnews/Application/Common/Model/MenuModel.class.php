<?php
namespace Common\Model;
use Think\Model;

/**
 * 菜单模型
 * @package Admin\Model
 */
class MenuModel extends Model{
    //定义私有变量
    private $_db;

    //构造方法：实例化Menu对象
    public function __construct(){
        $this->_db = M("Menu");
    }

    // 输出菜单列表
    public function getAdminMenus(){
        $data["status"] = array("neq",-1);
        $data["type"] = 1;
        return $this->_db->where($data)->order("listorder desc,menu_id desc")->select();
    }

    //输出前端列表
    public function getBarMenus(){
        $data["status"] = 1;
        $data["type"] = 0;
        return $this->_db->where($data)->order("listorder desc,menu_id desc")->select();
    }

    //写入方法
    public function insert($data = array()){
        if(!$data || !is_array($data)){
            return 0;
        }
        return $this->_db->add($data);
    }

    //获取数据库总数据
    public function getMenus($data,$page,$pageSize){
        $data['status'] = array('neq',-1);
        $offset = ($page-1)*$pageSize;
        $list = $this->_db->where($data)->order("listorder desc,menu_id desc")->limit($offset,$pageSize)->select();
        return $list;
    }

    //获取数据库总记录数
    public function getMenusConut($data = array()){
        $data['status'] = array('neq',-1);
        return $this->_db->where($data)->count();
    }

    //获取数据库单条数据
    public function find($id){
        if(!$id || !is_numeric($id)){
            return array();
        }
        $where['menu_id'] = $id;
        return $this->_db->where($where)->find();
    }

    //更新数据库单条数据
    public function updateMenuById($id,$data){
        if(!$id || !is_numeric($id)){
            throw_exception("Id不合法");
        }
        if(!$data || !is_array($data)){
            throw_exception("更新的数据不合法");
        }
        $where["menu_id"] = $id;
        return $this->_db->where($where)->save($data);
    }

    //更新数据库状态
    public function updateStatusById($id,$status){
        if(!$id || !is_numeric($id)){
            throw_exception("Id不合法");
        }
        if(!$id || !is_numeric($id)){
            throw_exception("状态值不合法");
        }
        $where["menu_id"] = $id;
        $data["status"] = $status;
        return $this->_db->where($where)->save($data);
    }

    //更新数据库排序
    public function updateListorderById($id,$listorder){
        if(!$id || !is_numeric($id)){
            throw_exception("Id不合法");
        }
        $data["listorder"] = intval($listorder);
        $where["menu_id"] = $id;
        return $this->_db->where($where)->save($data);
    }
}