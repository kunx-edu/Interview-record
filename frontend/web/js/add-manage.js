$(function(){
    $('#button').on('click', function(){
        $.post('?r=manage/add-manage', $('form').serialize(), function(data){
            console.debug(data);
            if (data.status == 'success') {
                layer.msg('添加成功')
                setTimeout(function(){
                    window.location.href="?r=manage"
                },1000)
            } else {
                $.each(data.data, function(k, v){
                    $('.'+ k+'_err').html(v)
                    $('.'+ k+'_err').css('color','red');
                })
            }
        },'json')
    })
})