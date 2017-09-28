<?php
namespace Common\Model;
use Think\Model;
class UploadVideoModel extends Model{
    private $_uploadObj = "";
    private $_uploadImageData = "";

    const UPLOAD = "video";                    //定义常量

    public function __construct(){
        //实例化Think框架的上传文件类
        $this->_uploadObj = new \Think\Upload();
        $this->_uploadObj->rootPath = "./".self::UPLOAD."/";   //设置视频保存路径
        $this->_uploadObj->subName = date(Y)."/".date(m)."/".date(d);
    }

    public function videoUpload(){
        $res = $this->_uploadObj->upload();
        if($res){
            return __ROOT__."/".self::UPLOAD."/".$res["file"]["savepath"].$res["file"]["savename"];
        }else{
            return false;
        }
    }
}