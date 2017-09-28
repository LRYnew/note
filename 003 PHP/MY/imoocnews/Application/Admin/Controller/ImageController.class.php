<?php
namespace Admin\Controller;
use Think\Controller;

/**
 * 上传图片控制器
 * @package Admin\Controller
 */
class ImageController extends CommonController{
    private $_uploadObj;
    public function __construct(){

    }
    /**
     * 缩略图上传
     */
    public function ajaxuploadimage(){
        $upload = D("UploadImage");
        $res = $upload->imageUpload();
        if($res === false){
            return show(0,"上传失败","");
        }else{
            return show(1,"上传成功",$res);
        }
    }
    /**
     * 编辑器图片上传
     */
    public function kindupload(){
        $upload = D("UploadImage");
        $res = $upload->upload();
        if($res === false){
            return showKind(1,"上传失败");
        }
        return showKind(0,$res);
    }
}