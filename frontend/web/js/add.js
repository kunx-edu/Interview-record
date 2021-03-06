$(function(){
    //$('#interview_time').cxCalendar();
    $('#upload_file').on('click', function(){
        $('#in_file').click();
    })
    var num = 0;
    $('#in_file').change(function(){

        var val = $("#in_file").val();

        console.debug(val);

        if (val.length > 0) {

            layer.load(0, {shade: false}); //0代表加载的风格，支持0-2
            $("#up").ajaxSubmit({

                type: "POST",//提交类型
                dataType: "json",//返回结果格式
                url: '?r=interview/upload',//请求地址
                success: function (data) {//请求成功后的函数
                    if (data.status === "success") {
                        //当上传成功,自动创建html
                        $('<li>' +
                        '<img src="' + data.url + '" alt=""/>' +
                        '<span class="btn-closed">X</span>' +
                        '</li>').appendTo($(".file-imgList"))

                        $('<input type="hidden" name="InterviewQuestionsPhoto[url][]" value="' + data.path + '" path="' + data.url + '">').appendTo($(".img-up"))
                    } else {
                        layer.msg(data.message);
                    }
                    layer.closeAll('loading');
                },
                error: function (data) {
                    layer.msg('上传失败')
                    layer.closeAll('loading');
                },//请求失败的函数
                async: true
            });
        }
    })

    $('.file-imgList').on("click",".btn-closed", function(){
        //删除之前获取input中的path.
        //用来删除img-up中隐藏域中对应的图片值.
        var src = $(this).prev().attr('src')

        //删除自己.
        $(this).parent().remove();

        //删除img-up中图片对应的隐藏域值.
        $('input[path="'+src+'"]').remove();
    });

    $("#interview_time").on('click', function(){
        $("#interview_time").cxCalendar();
    })

    $('#sound_recording_file').on('click', function(){
        $('#tape_file').click();
    })

    $('#tape_file').change(function(){

        if ($('#tape_file').val().length > 0) {

            layer.load(0, {shade: false}); //0代表加载的风格，支持0-2
            $("#tape").ajaxSubmit({

                type: "POST",//提交类型
                dataType: "json",//返回结果格式
                url: '?r=interview/upload-tape',//请求地址
                success: function (data) {//请求成功后的函数

                    if (data.status === "success") {
                        //当上传成功,自动创建html
                        //$('<li>' +
                        //'<img src="' + data.url + '" alt=""/>' +
                        //'<span class="btn-closed">X</span>' +
                        //'</li>').appendTo($(".file-imgList"))
                        $('.tape').append('<span><a href="'+data.url+'" target="_blank">录音文件</a></span>')
                        $('#interview-sound_recording_file').val(data.path)
                        layer.closeAll('loading');

                    } else {
                        layer.msg(data.message);
                    }
                    layer.closeAll('loading');
                    //layer.msg('上传成功');
                },
                error: function (data) {
                    layer.msg('上传失败')
                    layer.closeAll('loading');
                },//请求失败的函数
                async: true
            });
        }
    })

    $('#button_interview').on('click', function(){
        $.post('?r=interview/add-interview', $('#interviewForm').serialize(), function(data){
            if (data.status == 'success') {
                window.location.href='?r=interview';
            } else {
                $.each(data.data, function(k, v){
                    $('#'+k+'_err').html(v);
                    $('#'+k+'_err').removeClass('hide');
                    $('#'+k+'_err').css('color','red');
                })
            }
        },'json');
    })
})

