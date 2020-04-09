$(function() {
    var otherHeight = 31;
    $(window).resize(function() {
        $("#iframe_employees").height( $(window).height() - otherHeight );
    }).resize();
});