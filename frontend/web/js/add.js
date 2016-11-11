$(function(){
    //$('#interview_time').cxCalendar();
    $('#upload_file').on('click', function(){
        $('#in_file').click();
    })
    var num = 0;
    $('#in_file').change(function(){
        layer.load(0, {shade: false}); //0代表加载的风格，支持0-2
        $("#up").ajaxSubmit({

            type: "POST",//提交类型
            dataType: "json",//返回结果格式
            url: '?r=interview/upload',//请求地址
            success: function (data) {//请求成功后的函数
                console.debug("success",data)
                if(data.status === "success"){
                    //当上传成功,自动创建html
                    $('<li>' +
                    '<img src="'+data.url+'" alt=""/>' +
                    '<span class="btn-closed">X</span>' +
                    '</li>').appendTo($(".file-imgList"))
                }
                layer.closeAll('loading');
            },
            error: function (data) {
                console.debug("error",data)
            },//请求失败的函数
            async: true
        });
    })

    $('.file-imgList').on("click",".btn-closed", function(){
        console.debug($(this).parent().remove());
    });
})

