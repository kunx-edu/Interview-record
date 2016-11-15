$(function(){
    $('.pass').on('click', function(){
        var th = $(this).parent().parent().parent()
        var href = $(this).attr('href');
        $.get(href,'', function(data){
            if (data.status == 'success') {
                layer.msg('审核成功')
                th.remove();
            } else {
                layer.msg('审核失败');
            }
        },'json');
    })
})