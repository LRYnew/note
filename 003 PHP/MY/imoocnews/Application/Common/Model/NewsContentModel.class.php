<?php
namespace Common\Model;
use Think\Model;

/**
 * Class NewsContentModel 文章内容模型
 * @package Admin\Model
 */
class NewsContentModel extends Model{
    private $_db;
    //构造方法
    public function __construct(){
        $this->_db = M("news_content");
    }
    //插入数据方法
    public function insert($data=array()){
        if(!is_array($data) || !$data){
            return false;
        }
        if(isset($data["content"]) && $data["content"]){
            $data["content"] = htmlspecialchars($data["content"]);
        }
        $data["create_time"] = time();
        return $this->_db->add($data);
    }
    //获取单条数据
    public function find($id){
        if(!$id || !is_numeric($id)){
            return array();
        }
        $data["news_id"] = $id;
        return $this->_db->where($data)->find();
    }
    //更新数据
    public function save($id,$data){
        if(!$id || !is_numeric($id)){
            return false;
        }
        $where["news_id"]=$id;
        return $this->_db->where($where)->save($data);
    }
}