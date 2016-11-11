$(function(){
    $('#button').on('click', function(){
        $('.err').html('')
        $.post('?r=register/reg', $('form').serialize(), function(data){

            if (data.status == 'success') {
                layer.msg('注册成功');
                setTimeout(function(){
                    window.location.href="?r=login"
                },2000)
            } else {
                $.each(data.data, function(k, v){
                    $('#'+k+'_err').html(v[0])
                })
            }
        },'json');
    })
})