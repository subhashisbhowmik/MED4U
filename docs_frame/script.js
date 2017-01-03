$(document).ready(function () {
    var done = 1;
    var $searchIn = $('input#searchInput');
    var timer;
    var post;
    var $results = $('#searchResults');
    var $dummy = $('#dummy>.starredDocs');
    var $starholder = $('#starredDocsWrapper');
    var $starredHeader = $('#staredHeader');
    var $noresult = $('#noResult');
    // alert();
    $searchIn.focusin(function () {
        $starholder.hide('fast');
        $starredHeader.hide('fast');
    });
    $searchIn.focusout(function () {
        if ($searchIn.val() == "") {
            $starholder.show('fast');
            $starredHeader.show('fast');
        }
    });

    function sendSearchReq() {
        timer = setTimeout(function () {
            var v = $searchIn.val();
            if (v == "") {
                $noresult.hide();
            } else if (v != "" && done != 0) {
                done = 0;
                post = $.post('./docsearch.php', {search: v}, function (data) {
                    if (data == "0") window.location.replace("../Login/");
                    else {
                        $results.html("");
                        var docs = JSON.parse(data);
                        if (docs.length == 0) {
                            $noresult.show();
                        }
                        else {
                            $noresult.hide();
                            for (var i = 0; i < docs.length; i++) {
                                var doc = docs[i];
                                var clone = $dummy.clone(true);
                                clone.find('img').attr('src', doc.icon);
                                clone.find('.strDocName').html(doc.name);
                                clone.find('.strDocInfo').html(doc.qualifications + '<br/>' + doc.specializations + '<br/>' + doc.phone + '<br/>' + doc.email)
                                clone.appendTo($results);
                            }
                        }
                    }
                }).always(function () {
                    done = 1;
                });
            }
        }, 800);
    }

    $searchIn.on('input', function () {
        // alert($searchIn.val());
        clearTimeout(timer);
        if (post != null)
            post.abort();
        done = 1;
        // alert('Change');
        sendSearchReq();
    });

    $(".visible-appts").click(function () {
        $(this).parent().find(".edit-appt-div").show(250);
    });

    $(".feedback-req").click(function () {
        $(this).parent().find(".feedback-box").slideToggle(200);
    });

    $(".feedback-submit").click(function () {
        $(this).parent().parent().fadeOut(50);
    });

    $(".feedback-close").click(function () {
        $(this).parent().hide(100);
    });

    $("#show-appts").click(function () {
        $("#my-appts-div").fadeToggle(200);
    });


    /**********************************/


    var canOpen = true;


    $(".doc-name").click(function (e) {
        if (canOpen) {
            canOpen = false;
            e.stopPropagation();
            var active = $(this).parent().parent().attr("id", "active");
            /*active.animate({left: "1vw"},0).animate({top:"1vh"},0);*/
            $(this).parent().parent().find(".venue-time").attr("class", "venue-time-dynamic");
            $(this).parent().parent().attr("class", "fixed-card");
            $(this).parent().parent().find('.tileClose').show(300);
            $(this).parent().parent().find('.full-info').show(500);
            /*$("#my-appointments").fadeOut();
             $("#mainflow").find(".card").fadeOut();*/

        }
    });

    $(".appt-btn-grp-control").click(function () {
        if (canOpen == false) {
            $(this).parent().find(".appt-btn-grp").fadeToggle();
        }
    });

    $(".tileClose").click(function (e) {
        e.stopPropagation();
        $(this).parent().removeAttr("id");
        $(this).parent().find(".venue-time-dynamic").attr("class", "venue-time");
        $(this).parent().find(".tileClose").hide();
        $(this).parent().find(".full-info").hide();
        $(this).parent().attr("class", "card");
        /*$("#my-appointments").fadeIn();
         $("#mainflow").find(".card").fadeIn();
         */
        canOpen = true;
    });

});