<?php
namespace Admin\Controller;
use Home\Controller\CommonController;
use Think\Controller;
class VideoController extends CommonController{
    //视频上传
    public function ajaxuploadvideo(){
        $upload = D("UploadVideo");
        $res = $upload->videoUpload();
        if($res === false){
            return show(0,"上传失败","");
        }else{
            return show(1,"上传成功",$res);
        }
    }
}