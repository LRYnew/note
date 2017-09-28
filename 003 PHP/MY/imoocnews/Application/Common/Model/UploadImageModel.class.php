<?php
namespace Common\Model;
use Think\Model;

/**
 * Class UploadImageModel
 * @package Admin\Model
 */
class UploadImageModel extends Model{
    private $_uploadObj = "";
    private $_uploadImageData = "";

    const UPLOAD = "upload";                    //定义常量

    public function __construct(){
        //实例化Think框架的上传文件类
        $this->_uploadObj = new \Think\Upload();
        $this->_uploadObj->rootPath = "./".self::UPLOAD."/";   //设置图片保存路径
        $this->_uploadObj->subName = date(Y)."/".date(m)."/".date(d);
    }

    public function upload(){
        $res = $this->_uploadObj->upload();
        if($res){
            return __ROOT__."/".self::UPLOAD."/".$res["imgFile"]["savepath"].$res["imgFile"]["savename"];
        }else{
            return false;
        }
    }

    public function imageUpload(){
        $res = $this->_uploadObj->upload();
        if($res){
            return __ROOT__."/".self::UPLOAD."/".$res["file"]["savepath"].$res["file"]["savename"];
        }else{
            return false;
        }
    }
}