function showHideClick(bar,hide,call) {
    bar.hidden=hide;
    bar.dom.stop(true);
    bar.hider.stop(true);
    bar.shower.stop(true);
    call();
    (hide) ? bar.dom.fadeOut(500) : bar.dom.fadeIn(500);
    (hide) ? bar.hider.fadeOut("fast") : bar.hider.fadeIn(800);
    (hide) ? bar.shower.fadeIn(800) : bar.shower.fadeOut("fast");
}

function entleaMouse(bar,enter){
    bar.dom.stop(true);
    bar.hider.stop(true,true);
    (enter) ? bar.dom.fadeIn("fast") : bar.dom.fadeOut("fast");
}

function setupBar(bar, onShow, onHide) {
    if(onShow===undefined){onShow=function(){};}
    if(onHide===undefined){onHide=function(){};}
    // Assumes that if the browser can get to here it supports display:none
    bar.shower.animate({opacity:1});

    bar.hider.click(function() {
        showHideClick(bar,true,onShow);
    });
    bar.shower.click(function() {
        showHideClick(bar,false,onHide);
    });
    bar.shower.mouseenter(function(e){
        if (!bar.mouseLeft) return;
        entleaMouse(bar,true);
    });
    bar.shower.mouseleave(function(e){
        if (!bar.hidden) return;
        bar.mouseLeft = true;
        entleaMouse(bar,false);
    });
}

$(document).ready(function() {
    var sideMenu = $("#side-menu");
    var sideShow = $("#side-menu-open");

    sideShow.animate({opacity:1});

    $("#side-menu-close").click(function() {
        sideMenu.animate({left:-sideMenu.outerWidth(), opacity:0},500,"swing");
        sideShow.fadeIn(800);
    });
    sideShow.click(function() {
        sideShow.fadeOut("fast");
        sideMenu.animate({left:0,opacity:1},500,"swing");
    });

    var footer = {
        dom : $("#footer"),
        hider : $("#foot-hide"),
        shower : $("#foot-show"),
        hidden : false,
        mouseLeft : false,
        content : $("#content")
    };
    setupBar(footer);

    var header = {
        dom : $("#header"),
        hider : $("#head-hider"),
        shower : $("#head-shower"),
        hidden : false,
        mouseLeft : false,
        content : footer.content
    };
    setupBar(header, function() {
        header.content.animate({"padding-top":10});
    }, function() {
        header.content.animate({"padding-top":90});
    });
});