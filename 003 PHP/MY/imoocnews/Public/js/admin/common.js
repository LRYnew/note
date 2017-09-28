/**
 * Created by Administrator on 2017/1/12.
 */

/**
 * 展开用户列表
 */
function showlist(th){
    $(".nav-right-list").toggle();
    var str = $(".nav-right-list").attr("style");
    if (str === "display: block;"){
        $(th).addClass("active");
    }else {
        $(th).removeClass("active");
    }
}

/**
 * 添加按钮操作
 */
$("#btn-Add").click(function(){
    var url = SCOPE.add_url;
    window.location.href = url;
});

/**
 * 菜单添加操作
 */
$("#submit-add").click(function(){
    // serializeArray()获取表单数据，返回序列化对象数组形式
    var data = $("#form-add").serializeArray();

    // 对数据格式化,形成json格式
    var postData = {};
    $(data).each(function(i){
        postData[this.name] = this.value;
    });

    // post上传数据到服务器
    var url = SCOPE.save_url;
    var jump_url = SCOPE.jump_url;
    $.post(url,postData,function(result){
        if(result.status == 1){
            //成功
            return dialog.success(result.message,jump_url);
        }else if(result.status == 0){
            //失败
            return dialog.error(result.message);
        }
    },"json");
});
/**
 * 排序操作
 */
$("#btn-listorder").click(function(){
    //获取listorder内容
    var data = $("#form-table").serializeArray();
    var url = SCOPE.listorder_url;
    //格式化数据
    var postData = {};
    $(data).each(function(i){
        postData[this.name] = this.value;
    });

    //post上传到服务器
    $.post(url,postData,function(result){
        if(result.status == 1){
            //成功
            return dialog.success(result.message,result["data"]["jump_url"]);
        }else if(result.status ==0){
            //失败
            return dialog.error(result.message);
        }
    },"JSON");
});
/**
 * edit页面跳转操作
 */
$(".table-wrapper .btn-update").click(function(){
    var id = $(this).attr('atr-id');
    var url = SCOPE.edit_url + "/id/" + id;
    window.location.href = url;
});
//点击删除操作
$(".table-wrapper .btn-delete").click(function(){
    updateStatus($(this));
});
//点击更新状态操作
$(".table-wrapper .btn-status").click(function(){
    updateStatus($(this));
});
/**
 * 更新操作
 * @param th
 */
function updateStatus(th){
    var id = $(th).attr('atr-id');
    var message = $(th).attr('atr-message');
    var status = $(th).attr('atr-status')?$(th).attr('atr-status'):-1;
    var url = SCOPE.set_status_url;

    var data = {};
    data["id"] = id;
    data["status"] = status;
    layer.open({
        content:message,
        icon:3,
        btn:['是','否'],
        yes: function(){
            toUpdateStatus(url,data);
        }
    });
}
/**
 * 更新函数
 * @param url
 * @param data
 */
function toUpdateStatus(url,data){
    $.post(url,data,function(result){
        if (result.status == 1){
            return dialog.success(result.message,"");
        }else if(result.status == 0){
            return dialog.error(result.message);
        }
    },"JSON");
}

/**
 * 推送操作
 */
$("#btnPosition").click(function(){
    var id = $("#positionId").val();
    var url = SCOPE.position_url;
    var push = {};
    var postData = {};

    $("input[name='pushcheck']:checked").each(function(i){
        push[i] = $(this).val();
    });
    if(id == 0){
        return dialog.error("请选择推荐位");
    }
    postData["position_id"] = id;
    postData["push"] = push;

    $.post(url,postData,function(result){
        if(result.status == 1){
            //成功
            return dialog.success(result.message,result["data"]['jump_url']);
        }
        if(result.status == 0){
            //失败
            return dialog.error(result.message);
        }
    },'json');
});