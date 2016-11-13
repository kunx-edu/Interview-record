$(function(){
    $('#button').on('click', function(){
        $('.err').html('');
        $.post('?r=train/add-train', $('form').serialize(), function(data){
            //判断是否成功.
            if (data.status == 'success') {
                layer.msg('添加成功');
                setTimeout(function(){
                    window.location.href="?r=train";
                },2000)
            } else {
                $.each(data.data, function(k, v){
                    $('#'+k+'_err').html(v);
                })
            }
        },'json');
    })
})
