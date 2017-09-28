<?php
/**
 * 公用方法
 */
//返回JSON信息方法
function show($status,$message,$data=array()){
    $result = array(
        "status"  =>$status,
        "message" =>$message,
        "data"    =>$data
    );
    exit(json_encode($result));
}
//返回kind需要的格式JSON信息方法
function showKind($status,$data){
    header('Content-type:application/json;charset=UTF-8');
    if($status == 0){
        exit(json_encode(array("error"=>0,"url"=>$data)));
    }
    exit(json_encode(array("error"=>1,"message"=>"上传失败")));
}

//对密码进行MD5处理方法
function getMd5Password($password){
    return md5($password.C("MD5_PRE"));
}

function getLoginAdminUsername(){
    return $_SESSION["AdminUser"]["username"] ? $_SESSION["AdminUser"]["username"]:"";
}

/**
 * 添加active类
 * @param $navc
 * @return string
 */
function getActive($navc){
    $c = strtolower(CONTROLLER_NAME);
    if(strtolower($navc) == $c){
        return 'class="active"';
    }
    return "";
}
function getNavActive($menuId,$catId){
    if($menuId == $catId){
        return "active";
    }
    return "";
}
//菜单类型判断方法
function getMenuType($type){
    return $type==1?"后台菜单":"前端导航";
}

//状态判断方法
function getStatus($status){
    if($status == 1){
        $str = "正常";
    }elseif($status == 0){
        $str = "关闭";
    }elseif($status == -1){
        $str = "删除";
    }
    return $str;
}

//判断文章栏目
function getCatName($catnavs,$id){
    if(!$catnavs){
        return "";
    }
    foreach($catnavs as $nav){
        $navlist[$nav["menu_id"]] = $nav["name"];
    }
    return $navlist[$id]?$navlist[$id]:"";
}

//判断文章来源
function getCopyFromName($id){
    $names = C("COPY_FROM");
    return $names[$id]?$names[$id]:"";
}
//
function isThumb($thumb){
    if($thumb){
        return "有";
    }else{
        return "无";
    }
}

//判断标题颜色
function getTitleColor($color,$resColor){
    if($color === $resColor){
        return "selected='selected'";
    }else{
        return "";
    }
}

//判断图片是否显示
function getImgShow($img){
    if(isset($img)&&$img){
        return "style='display:block;'";
    }
    return "style='display:none;'";
}
//判断单选框选中
function getChecked($val,$status){
    if($val == $status){
        return "checked";
    }else{
        return "";
    }
}
//判断标题颜色
function getColor($color){
    if($color){
        return "style='color:".$color."'";
    }
    return "";
}
//判断基本配置type
function getBasicType($num,$type){
    if($num == $type){
        return "class='nav-btn active'";
    }
    return "class='nav-btn'";
}