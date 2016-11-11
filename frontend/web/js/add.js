$(function(){
    //$('#interview_time').cxCalendar();
    $('#upload_file').on('click', function(){
        $('#in_file').click();
    })

    $('#in_file').change(function(){
        //$.post('?r=interview/upload', $('#up').serialize(),function(data){
        //    console.debug(data)
        //},'json');
        //$('#up').submit();
        $("#up").ajaxSubmit({

            type: "POST",//提交类型
            dataType: "json",//返回结果格式
            url: '?r=interview/upload',//请求地址
            success: function (data) {//请求成功后的函数
                console.debug(data)
            },
            error: function (data) {
                console.debug(data)
            },//请求失败的函数
            async: true
        });
    })
})
