<?php
namespace Common\Model;
use Think\Exception;
use Think\Model;

/**
 * Class NewsModel 文章管理模型
 * @package Admin\Model
 */
class NewsModel extends Model{
    private $_db;
    //构造函数
    public function __construct(){
        $this->_db = M("News");
    }

    //插入数据方法
    public function insert($data=array()){
        if(!is_array($data) || !$data){
            return false;
        }
        $data["create_time"] = time();
        $data["username"] = getLoginAdminUsername();
        return $this->_db->add($data);
    }

    //获取数据库全部记录
    public function getNews($data,$page,$pageSize = 10){
        $conditions = $data;
        if($data["title"] && isset($data["title"])){
            $conditions["title"] = array("like","%".$data["title"]."%");
        }
        if($data["catid"] && isset($data["catid"])){
            $conditions["catid"] = intval($data["catid"]);
        }
        $offset = ($page - 1)*$pageSize;
        $list = $this->_db
                     ->where($conditions)
                     ->order("listorder desc,news_id desc")
                     ->limit($offset,$pageSize)
                     ->select();
        return $list;
    }

    //获取数据库全部记录数量
    public function getNewsCount($data){
        $conditions = $data;
        if($data["title"] && isset($data["title"])){
            $conditions["title"] = array("like","%".$data["title"]."%");
        }
        if($data["catid"] && isset($data["catid"])){
            $conditions["catid"] = intval($data["catid"]);
        }
        return $this->_db->where($conditions)->count();
    }

    //获取数据库单条记录
    public function find($id){
        if(!$id || !is_numeric($id)){
            return array();
        }
        $data["news_id"] = $id;
        return $this->_db->where($data)->find();
    }

    //更新数据库数据
    public function save($id,$data){
        if(!$id || !is_numeric($id)){
            return false;
        }
        $where["news_id"] = $id;
        return $this->_db->where($where)->save($data);
    }

    //更新数据库状态值
    public function updateStatus($id,$data){
        if(!$id || !is_numeric($id)){
            throw_exception("ID不符合规则");
        }
        if(!$data || !is_array($data)){
            throw_exception("状态值不符合规则");
        }
        $where["news_id"] = $id;
        return $this->_db->where($where)->save($data);
    }

    //排序
    public function updateListorderById($newsId,$listorderId){
        if(!$newsId || !is_numeric($newsId)){
            throw new Exception("Id不符合规则");
        }
        if($listorderId === "" || !is_numeric($listorderId)){
            throw new Exception("listorderId不符合规则");
        }
        $where["news_id"] = $newsId;
        $data["listorder"] = $listorderId;
        return $this->_db->where($where)->save($data);
    }
    //判定文章ID是否在范围内
    public function getNewsByIdIn($newIds){
        if(!is_array($newIds)){
            throw new Exception("文章ID不符合规则");
        }
        $where["news_id"] = array("in",implode(",",$newIds));
        return $this->_db->where($where)->select();
    }

    //根据阅读数获取文章
    public function getRank($data,$num){
        $list = $this->_db->where($data)->limit($num)->order("count desc,listorder desc,news_id desc")->select();
        return $list;
    }

    //获取最大阅读数文章
    public function maxcount(){
        $data["status"] = 1;
        return $this->_db->where($data)->limit(1)->order("count desc")->find();
    }
}