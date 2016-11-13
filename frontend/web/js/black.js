$(function(){
    $('#button').on('click', function(){
        $('.err').html('');
        $.post('?r=black-list/add-black-list', $('form').serialize(), function(data){
            //判断是否成功.
            if (data.status == 'success') {
                layer.msg('添加成功, 等待管理员审核');
                setTimeout(function(){
                    window.location.href="?r=black-list";
                },2000)
            } else {
                $.each(data.data, function(k, v){
                    $('#'+k+'_err').html(v);
                })
            }
        },'json');
    })
})
