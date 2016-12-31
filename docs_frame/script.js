$(document).ready(function(){
            $(".visible-appts").click(function(){
                $(this).parent().find(".edit-appt-div").show(250); 
            });
        
            $(".feedback-req").click(function(){
               $(this).parent().find(".feedback-box").slideToggle(200); 
            });
        
            $(".feedback-submit").click(function(){
               $(this).parent().parent().fadeOut(50); 
            });

            $(".feedback-close").click(function(){
                $(this).parent().hide(100);
            });
               
            $("#show-appts").click(function(){
                $("#my-appts-div").fadeToggle(200);        
            });
        
           
            /**********************************/






            var canOpen=true;
            
            
            $(".doc-name").click(function(e){
               if(canOpen){
                   canOpen=false;
                    e.stopPropagation();
					var active =$(this).parent().parent().attr("id","active");
					/*active.animate({left: "1vw"},0).animate({top:"1vh"},0);*/
					$(this).parent().parent().find(".venue-time").attr("class","venue-time-dynamic");
                    $(this).parent().parent().attr("class","fixed-card");
                    $(this).parent().parent().find('.tileClose').show(300);
                    $(this).parent().parent().find('.full-info').show(500);
					/*$("#my-appointments").fadeOut();
					$("#mainflow").find(".card").fadeOut();*/
					
               }
            });
        
			$(".appt-btn-grp-control").click(function(){
				if(canOpen==false){
					$(this).parent().find(".appt-btn-grp").fadeToggle();
				}
			});
		
            $(".tileClose").click(function(e){
				e.stopPropagation();
				$(this).parent().removeAttr("id");
                $(this).parent().find(".venue-time-dynamic").attr("class","venue-time");
                $(this).parent().find(".tileClose").hide();
                $(this).parent().find(".full-info").hide();
                $(this).parent().attr("class","card");
				/*$("#my-appointments").fadeIn();
                $("#mainflow").find(".card").fadeIn();
				*/
                canOpen =true;
            });
        
	});