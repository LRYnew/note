<?php
namespace Common\Model;
use Think\Exception;
use Think\Model;
/**
 * Class PositionContentModel 推荐位内容模型
 * @package Admin\Model
 */
class PositionContentModel extends Model{
    //参数
    private $_db;
    //构造方法
    public function __construct(){
        $this->_db = M("position_content");
    }
    //插入数据方法
    public function insert($data){
        if(!$data || !is_array($data)){
            throw new Exception("数据不符合规则，请排查原因");
        }
        if(!$data["create_time"]){
            $data["create_time"] = time();
        }
        return $this->_db->add($data);
    }
    //获取数据库全部记录
    public function getPositionContent($data=array(),$page=1,$pageSize=10){
        if(!is_array($data)){
            throw new Exception("判断条件出现错误，请排查原因");
        }
        if(!is_numeric($page)){
            throw new Exception("当前页数不符合规则");
        }
        if(!is_numeric($pageSize)){
            throw new Exception("每页页数不符合规则");
        }
        if($data["title"] && isset($data["title"])){
            $data["title"] = array("like",$data["title"]."%");
        }
        $offset = ($page-1)*$pageSize;
        $data["status"] = array("neq",-1);
        $list = $this->_db
            ->where($data)
            ->order("listorder desc,id desc")
            ->limit($offset,$pageSize)
            ->select();
        return $list;
    }
    //获取数据库全部记录总数
    public function getPositionContentCount($data){
        if(!is_array($data)){
            throw new Exception("判断条件出现错误，请排查原因");
        }
        $data["status"] = array("neq",-1);
        return $this->_db->where($data)->count();
    }

    //更新
    public function updatePositionContentById($data){
        if(!is_numeric($data["id"]) && $data["id"]){
            throw new Exception("ID值未查找到相关推荐内容");
        }
        if($data["status"] && !is_numeric($data["status"])){
            throw new Exception("更新状态不符合规则");
        }
        $where["id"] = $data["id"];
        return $this->_db->where($where)->save($data);
    }
    //获取单条数据记录
    public function find($id){
        if(!$id || !is_numeric($id)){
            throw new Exception("推荐内容ID不符合规则");
        }
        $where["id"] = $id;
        return $this->_db->where($where)->find();
    }
}