/**
 * Created by Administrator on 2017/1/9.
 */
/**
 * dialog 弹出层函数
 * @type {{error: dialog.error, success: dialog.success, confirm: dialog.confirm, toconfirm: dialog.toconfirm}}
 */
var dialog = {
    //错误弹出层
    error:function(message){
        layer.open({
            content:message,
            icon:2,
            title:'错误提示'
        });
    },

    //成功弹出层
    success:function(message,url){
        layer.open({
            content:message,
            icon:1,
            yes:function(){
                location.href = url;
            },
            end:function(){
                location.href = url;
            },
            time:3000,
        });
    },

    //确认弹出层
    confirm:function(message,url){
        layer.open({
            content:message,
            icon:3,
            btn:['是','否'],
            yes: function(){
                location.href = url;
            }
        });
    },

    //无需跳转到指定页面的弹出层
    toconfirm:function(message){
        layer.open({
            content:message,
            icon:3,
            btn:['确定']
        });
    }
}