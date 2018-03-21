$(document).ready(function(){
    var win = $(window).height();
    $(".height-full").height(win + 48);
    console.log(win);
    var height = $(".days").height();
    var padding = $(".doctor").css("padding-bottom").replace(/[^-\d\.]/g, '');
    var border = $(".doctor").css("border-bottom-width").replace(/[^-\d\.]/g, '');
     $(".doctor").height(height - padding - border);
});

