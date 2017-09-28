<?php
namespace Common\Model;
use Think\Exception;
use Think\Model;
class PositionModel extends Model{
    private $_db;
    public function __construct(){
        $this->_db = M("position");
    }

    //获取数据库全部记录
    public function getPositions($data=array(),$page=1,$pageSize=10){
        $offset = ($page-1)*$pageSize;
        $data["status"] = array("neq",-1);
        $list = $this->_db
            ->where($data)
            ->order("id desc")
            ->limit($offset,$pageSize)
            ->select();
        return $list;
    }

    //获取数据库全部记录
    public function getPositionsConut($data=array()){
        if(!$data || !is_array($data)){
            E("获取数据的条件不符合规则");
        }
        return $this->_db->where($data)->count();
    }

    //插入数据库方法
    public function insert($data){
        if(!$data || !is_array($data)){
            return false;
        }
        $data["create_time"] = time();
        return $this->_db->add($data);
    }

    //获取数据库单挑数据
    public function find($id){
        if(!$id || !is_numeric($id)){
            throw new Exception("推荐位对应ID值不符合规则,请排查原因");
        }
        $where["id"] = $id;
        return $this->_db->where($where)->find();
    }

    //修改数据
    public function updatePositionById($id,$data){
        if(!$id || !is_numeric($id)){
            throw new Exception("推荐位对应ID值不符合规则,请排查原因");
        }
        if(!$data || !is_array($data)){
            throw new Exception("推荐位数据不符合规则,请排查原因");
        }
        $where["id"] = $id;
        return $this->_db->where($where)->save($data);
    }
}