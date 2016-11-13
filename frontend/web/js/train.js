$(function(){
    $('#button').on('click', function(){
        $.post('?r=train/add-train', $('form').serialize(), function(data){

        },'json');
    })
})
