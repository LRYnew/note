/**
 * Created by Administrator on 2017/1/9.
 */
/**
 * 管理后台登录页面业务类
 * @type {{}}
 */
var login ={
    //登录方法
    check:function(){
        //获取用户名和密码
        var username = $('input[name="username"]').val();
        var password = $('input[name="password"]').val();
        //判断用户名和密码不为空再上传服务器
        if(!username){
            dialog.error("用户名不能为空！");
        }else if(!password){
            dialog.error("密码不能为空！");
        }else {
            //用户名和密码上传服务器
            var url = "/imoocnews/admin.php/admin/login/check";
            var data = {
                "username":username,
                "password":password
            };
            $.post(url,data,function(result){
                if(result.status == 0){
                    return dialog.error(result.message);
                }
                if(result.status == 1){
                    return dialog.success(result.message,"/imoocnews/admin.php/admin/index/index");
                }
            },"JSON");
        }
    }
}