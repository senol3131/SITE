$(function(){
    var timer = 5000;
    var totalLi = $(".slider ul li").length;
    var liWidth = 615;
    var totalWidth = liWidth * totalLi;
    var liStatus = 0;
    $(".slider ul").css("width", totalWidth + "px");
    $(".sliderButton ul li:first").addClass("active");

    $(".sliderButton ul li").click(function(){
        var index = $(this).index();
        $(".sliderButton ul li").removeClass("active");
        $(this).addClass("active");
        newWidth = liWidth * index;
        $(".slider ul").animate({marginLeft: "-" + newWidth + "px"}, 500);
        return false
    });

    
    $.Slider = function(){
        if( liStatus < totalLi - 1 )
        {
            liStatus++;
            newWidth = liWidth * liStatus;
            $(".slider ul").animate({marginLeft: "-" + newWidth + "px"}, 500);
            $(".sliderButton ul li").removeClass("active");
            $(".sliderButton ul li:eq(" + liStatus + ")").addClass("active");
        }else{
            liStatus = 0;
            $(".slider ul").animate({marginLeft: "0"}, 500);
            $(".sliderButton ul li").removeClass("active");
            $(".sliderButton ul li:first").addClass("active");
            
        }
    }

    var turn = setInterval("$.Slider()", timer);

    $("#slider").hover(function(){
        clearInterval(turn);
    }, function(){
        turn = setInterval("$.Slider()", timer);
    });
});