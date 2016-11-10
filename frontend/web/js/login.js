$(function(){
    $('#button').on('click', function(){
        $('.err').html('')
        $.post('?r=login/login', $('form').serialize(), function(data){

            console.debug(data)

            if (data.status == 'success') {
                window.location.href='?r=index';
            } else {
                $.each(data.data, function(k, v){
                    $('#'+k+'_err').html(v[0])
                })
            }
        },'json');
    })
})