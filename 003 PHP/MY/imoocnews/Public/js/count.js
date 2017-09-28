/**
 * Created by Administrator on 2017/2/6.
 */
/**
 * 文章计数器
 * @type {{}}
 */
var postData = {};
var url = SCOPE.count_url;

$(".news-count").each(function(i){
    postData[i] = $(this).attr("news-id");
});

$.post(url,postData, function(result){
    if (result.status == 1){
        var counts = result.data;

        $.each(counts,function(newsId,count){
            $(".node-" + newsId).html(count);
        });
    }
    if (result.status == 0){
        return dialog.error(result.message);
    }
},"json");
