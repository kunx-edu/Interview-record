$(function(){
    $('#button').on('click', function(){
        $('.err').html('')
        $.post('?r=login/login', $('form').serialize(), function(data){
            $.each(data, function(k, v){
                $('#'+k+'_err').html(v[0])
            })
        },'json');
    })
})