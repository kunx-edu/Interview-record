$(function(){
    //$('#interview_time').cxCalendar();
    $('#upload_file').on('click', function(){
        $('#in_file').click();
    })

    $('#in_file').change(function(){
        //$.post('?r=interview/upload', $('#up').serialize(),function(data){
        //    console.debug(data)
        //},'json');
        $('#up').submit()
    })
})
