$(document).ready(function(){
            (function($,c,b){$.map("click dblclick mousemove mousedown mouseup mouseover mouseout change select submit keydown keypress keyup".split(" "),function(d){a(d)});a("focusin","focus"+b);a("focusout","blur"+b);$.addOutsideEvent=a;function a(g,e){e=e||g+b;var d=$(),h=g+"."+e+"-special-event";$.event.special[e]={setup:function(){d=d.add(this);if(d.length===1){$(c).bind(h,f)}},teardown:function(){d=d.not(this);if(d.length===0){$(c).unbind(h)}},add:function(i){var j=i.handler;i.handler=function(l,k){l.target=k;j.apply(this,arguments)}}};function f(i){$(d).each(function(){var j=$(this);if(this!==i.target&&!j.has(i.target).length){j.triggerHandler(e,[i.target])}})}}})(jQuery,document,"outside");
                
            $("#settings-btn").click(function () {
                $("#settings-select").fadeToggle(200);
                $("#settings-close").fadeToggle(0);
                $("#settings-btn").fadeToggle(0);
                
            });
            $("#settings-btn").bind('clickoutside',function(e){
                $("#settings-select").fadeOut(100);
                $("#settings-btn").show();
                $("#settings-close").hide();
            });
    

            function searchBarActivator(callback){
            	if($(document).width()<900){
                        $('.head-elem:first-child').css({"display":"none"});
                        $('.head-elem:last-child').css({"display":"none"});
                      	$("#search-input").css({"width":"calc(100% - 75px)"});
                        $("#search-bar").addClass('search-bar-mbl');
                        $("#search-close").show();
                }else{
                	$("#search-bar").addClass('search-bar-dtop');
                }
                setTimeout(callback, 220);
                
            }
 			function searchResultOpen(){$("#search-results").fadeIn(150);}

            $("#search-input").click(function(e){
                $("#x").css({"display":"none"});
                /*$.when(searchBarActivator()).done(function(){
                	$("#search-results").show(150);
                });*/

                searchBarActivator(searchResultOpen);
            });
            
            function searchAllClose(){
                $("#x").css({"display":"block"});
                $("#search-results").fadeOut(100);
                if($(document).width()<900){
                    $('.head-elem:first-child').css({"display":"inline-block"});
                    $('.head-elem:last-child').css({"display":"inline-block"});
                    $("#search-bar").removeClass('search-bar-mbl');
                    $("#search-input").css({"width":"calc(100% - 35px)"});
                    $("#search-close").hide();
                }else{
                	$("#search-bar").removeClass('search-bar-dtop');
                }
            };

            $("#search-bar").bind('clickoutside',function(e){
                searchAllClose();
            });

            $('#search-close').click(function(){
                searchAllClose();
            });

            /**********************************/


	});