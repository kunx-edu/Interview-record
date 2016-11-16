$(function(){
    $('.button').on('click', function(){
        $('#file').click();
    })

    $('#file').change(function(){

        //获取选择的文件.
        var value = $(this).val();

        //判断是否有选择.
        if (value.length > 0) {

            layer.load(0, {shade: false}); //0代表加载的风格，支持0-2

            $("#form").ajaxSubmit({
                type: "POST",//提交类型
                dataType: "json",//返回结果格式
                url: '?r=manage/import-data',//请求地址
                success: function (data) {//请求成功后的函数
                    if (data.status === "success") {
                        //当上传成功,自动创建html
                        //$('<li>' +
                        //'<img src="' + data.url + '" alt=""/>' +
                        //'<span class="btn-closed">X</span>' +
                        //'</li>').appendTo($(".file-imgList"))
                        //
                        //$('<input type="hidden" name="InterviewQuestionsPhoto[url][]" value="' + data.path + '" path="' + data.url + '">').appendTo($(".img-up"))
                    } else {
                        layer.msg(data.message);
                    }
                    layer.closeAll('loading');
                },
                error: function (data) {
                    //layer.msg('上传失败')
                    //layer.closeAll('loading');
                },//请求失败的函数
                async: true
            });

            }
    })
})
