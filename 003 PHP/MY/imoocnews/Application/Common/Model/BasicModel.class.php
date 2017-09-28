<?php
namespace Common\Model;
use Think\Exception;
use Think\Model;
/**
 * Class BasicModel 基本管理模型
 * @package Admin\Model
 */
class BasicModel extends Model{
    public function __construct(){

    }
    //存储缓存方法
    public function save($data){
        if(!$data || !is_array($data)){
            throw new Exception("没有成功提交数据");
        }
        $id = F("basic_web_config",$data);
        return $id;
    }
    //查找缓存数据
    public function select(){
        return F("basic_web_config");
    }
}