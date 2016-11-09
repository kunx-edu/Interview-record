$(function(){
    $(".selectXueke").mouseover(function(){
        $(this).addClass("rotateActive");
        $(this).css('cursor','pointer');
    })
    $(".selectXueke").mouseout(function(){
        $(this).removeClass("rotateActive");
    })

    //$(".selectXueke").on('click', function(){
    //    var data = $(this).attr('data')
    //    window.location.href="?r=interview/add"
    //})
})