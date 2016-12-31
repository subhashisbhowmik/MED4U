$(document).ready(function () {
	
    $("#preloader").delay(1000).fadeOut(250);
var canOpen = true;
$('div.item').click(function () {
    if (canOpen) {
       
        var x = $(this).offset().left;
        var y = $(this).offset().top;
        $(this).clone(true).insertAfter($(this));
        $(this).css({position: 'absolute'});
        $(this).offset({top: y, left: x});
        $(this).attr("tx", $(this).css("left")).attr("ty", $(this).css("top"));
        $(this).addClass('itemx').css({"cursor":"default","backgroundColor":"#888"});
        $(this).animate({left: '1%'},0).animate({top: '1%'},0);
        $(this).find('.tileClose').show();
        $(this).find('.tile_icon').addClass('activeIcon');
        $(this).find('.tileIframeWrapper').fadeIn(200);
        
        canOpen = false;
    }
});

$('.tileClose').click(function (e) {
        $(this).parent().find('.tileIframeWrapper').fadeOut(100);
        //$(this).parent().find('.item_content').hide();
        $(this).hide();
    e.stopPropagation();
    $p = $(this).parent().removeClass('itemx');
        
    $(this).parent().attr("class", "item");
    $p.fadeOut({
        duration:30,
        complete: function () {
            $p.remove();
            canOpen = true;
        }
    });
});


});
function fill(Id)
{
	var data = { "id": Id};
	$.ajax({
		type: "POST",
		dataType: "json",
		url: "req.php", 
		data: data,
		success: function(data)
		{
			var s = data['head']+"</br>"+data['body'];
			$("#i"+Id+" > .text").html(s);
			$("#i"+Id+" > .item_content").html("Modified"+s);
		}
	});
}

