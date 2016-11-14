$(function(){
    $('.del').on('click', function(){
        var th = $(this).parent().parent().parent()
        var href = $(this).attr('href');
        $.get(href,'', function(data){
            if (data.status == 'success') {
                layer.msg('删除成功')
                th.remove();
            } else {
                layer.msg('删除失败');
            }
        },'json');
    })

    $('#addTrain').on('click', function (){
        $.post('?r=manage/add-train', $('form').serialize(), function(data){
            if (data.status == 'success') {
                layer.msg('添加成功')
                setTimeout(function(){
                    window.location.href="?r=manage/train"
                },1000)
            } else {
                $.each(data.data, function(k, v){
                    $('#'+ k+'_err').html(v)
                    $('#'+ k+'_err').css('color','red');
                })
            }
        },'json');
    })
})
