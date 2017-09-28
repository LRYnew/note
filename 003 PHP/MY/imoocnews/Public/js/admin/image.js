/**
 * 图片上传功能
 */
$(function() {
    $("#file_upload").uploadify({
        "swf":SCOPE.ajax_upload_swf_path,                   //配置swf路径
        "uploader":SCOPE.ajax_upload_image_url,            //配置图片上传地址
        "buttonText":"上传图片",                             //设置上传按钮文字
        "fileTypeDesc":"Image Files",
        "fileObjName":"file",                                //上传到服务器的变量名，例如：$_FILE["file"]
        "fileTypeExts":"*.gif; *.jpg; *.png",
        "onUploadSuccess":function(file,data,response){
            // response true/false
            if(response){
                var obj = JSON.parse(data); //由JSON字符串转换为JSON对象

                $("#" + file.id).find(".data").html("上传完毕");

                $("#upload_org_code_img").attr("src",obj.data); //设置img元素的src属性
                $("#file_upload_image").attr("value",obj.data); //设置input元素的value属性
                $("#upload_org_code_img").show();               //jQuery方法show()，显示元素
            }else {
                return dialog.error("上传失败");
            }
        }
    });

    $("#video_upload").uploadify({
        "swf":SCOPE.ajax_upload_swf_path,                   //配置swf路径
        "uploader":SCOPE.ajax_upload_video_url,            //配置图片上传地址
        "buttonText":"上传视频",                             //设置上传按钮文字
        "fileTypeDesc":"video Files",
        "fileObjName":"file",                                //上传到服务器的变量名，例如：$_FILE["file"]
        "fileTypeExts":"*.flv;*.mp4;*.swf;",
        'fileSizeLimit':"100MB",
        "onUploadSuccess":function(file,data,response){
            // response true/false
            if(response){
                var obj = JSON.parse(data); //由JSON字符串转换为JSON对象

                $("#" + file.id).find(".data").html("上传完毕");

                //$("#upload_org_code_img").attr("src",obj.data); //设置img元素的src属性
                $("#file_upload_video").attr("value",obj.data); //设置input元素的value属性
                //$("#upload_org_code_img").show();               //jQuery方法show()，显示元素
            }else {
                return dialog.error("上传失败");
            }
        }
    });
});





