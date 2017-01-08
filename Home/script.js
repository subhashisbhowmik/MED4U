$(document).ready(function () {
    var justopened=false;
    var hash=decodeURI(location.hash).toString();
    if (hash.charCodeAt(1) <= 57 && hash.charCodeAt(1) > 48) {
        setTimeout(function () {
            justopened=true;
            $('#wrapper').find('#i' + hash[1]).click();
        },100);
    }
    $("#preloader").delay(700).fadeOut(250);
    var _w = $(document).width(), _h = $(window).height();
    //if ((width <= 1023) && (height >= 768)) {


    var canOpen = true;
    $('div.item').click(function () {
        if (canOpen) {
            // console.log($(this).index());
            if(!justopened) {
                location.hash = $(this).index() + 1;
                location.hash += '#';//Quickfix
            }
            var x = $(this).offset().left;
            var y = $(this).offset().top;
            $(this).clone(true).insertAfter($(this));
            $(this).css({"position": 'absolute'}).offset({top: y, left: x});

            $(this).attr("tx", x).attr("ty", y);
            $(this).addClass('itemx').css({"cursor": "default", "backgroundColor": "#888"});
            $(this).animate({left: '1%'}, 0).animate({top: '1%'}, 0);

            $(this).find('.tile_icon').addClass('activeIcon');
            $(this).find('.tileClose').show();
            $(this).find('.tileIframeWrapper').delay(200).fadeIn(20);

            canOpen = false;
        }
    });

    $('.tileClose').click(function (e) {
        location.hash = "";
        canOpen = true;
        e.stopPropagation();
        var p = $(this).parent();
        p.find('.tileIframeWrapper').fadeOut(1);
        $(this).hide();
        if (_w >= 601) {
            p.addClass("tileHide").removeClass('itemx');
            p.css({"backgroundColor": "inherit", "top": "inherit", "left": "inherit"});
            p.animate({left: p.attr("tx") - 5}, 0).animate({top: p.attr("ty") - 50}, 0);
            p.delay(300);
        }

        p.fadeOut({
            duration: 70,
            complete: function () {
                p.remove();
            }
        });


    });


});
function fill(Id) {
    var data = {"id": Id};
    $.ajax({
        type: "POST",
        dataType: "json",
        url: "req.php",
        data: data,
        success: function (data) {
            var s = data['head'] + "</br>" + data['body'];
            $("#i" + Id + " > .text").html(s);
            $("#i" + Id + " > .item_content").html("Modified" + s);
        }
    });
}

