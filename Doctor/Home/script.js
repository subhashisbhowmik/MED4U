$(document).ready(function () {
	// for (i = 0; i < 9; i++)
	// {	fill(i);	}
var canOpen = true;
$('div.item').click(function () {
    if (canOpen) {
        
        var x = $(this).offset().left;
        var y = $(this).offset().top;
        $(this).clone(true).insertAfter($(this));
        $(this).css({position: 'absolute'});
        $(this).offset({top: y, left: x});
        $(this).attr("tx", $(this).css("left")).attr("ty", $(this).css("top"));
        $(this).attr('class', 'itemx');
        $(this).addClass('itemx');
        $(this).animate({left: '1%'},0).animate({top: '1%'},0);
        $(this).find('.tileClose').show();
			$(this).find('.item_content').show(150);	
			canOpen = false;
        
    }
});

$('button.tileClose').click(function (e) {
    
		$(this).parent().find('.item_content').hide(50);
		$(this).hide();
    e.stopPropagation();
    $p = $(this).parent().animate({left: $(this).attr("tx")},0).animate($(this).attr("ty"),0);
		
    $(this).parent().attr("class", "item").css({position: 'absolute'});
    $p.fadeOut({
        duration: 40,
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

document.onreadystatechange = function () {
  if (document.readyState == "interactive") {
        setTimeout(function(){
            document.getElementById("preloader").style.display="none";
        },700);
  }
}