$(function(){
    $('#button').on('click', function(){
        $('.err').html('')
        $.post('?r=manage-login/login', $('form').serialize(), function(data){
            if (data.status == 'success') {
                layer.msg('登录成功');
                setTimeout(function(){
                    window.location.href="?r=manage/index"
                },2000)
            } else {
                $.each(data.data, function(k, v){
                    $('#'+k+'_err').html(v)
                })

            }
        },'json')
    })
})