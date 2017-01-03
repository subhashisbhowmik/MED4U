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
    var l = window.top.location.href;
    // var url=loc.substr(0,loc.indexOf('#'));
    // var d=l.substr(l.indexOf('#')+1);
    // d=d.substr(l.indexOf('#')+1);
    // alert(l);
    //var v=decodeURI(d).toString();
    if (l.indexOf("search=") != -1) {
        var srch = l.substr(l.indexOf('search=') + 7);
        if (srch.indexOf('&') != -1)srch = srch.substr(0, srch.indexOf('&'));
        srch = decodeURI(srch).toString();
        $searchIn.val(srch);
        $searchIn.get(0).focus();
        sendPost(srch);
        $starholder.hide('fast');
        $starredHeader.slideUp('fast');
    }
    $searchIn.focusin(function () {
        $starholder.hide('fast');
        $starredHeader.slideUp('fast');
    });
    $searchIn.focusout(function () {
        if ($searchIn.val() == "") {
            $starholder.slideDown('fast');
            $starredHeader.slideDown('fast');
        }
    });

    function sendPost(v) {
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
                        // location.hash+="#search="+v;
                        // location.hash="";
                        var loc = window.top.location.href;
                        var url = loc.substr(0, loc.indexOf('#'));
                        var dat = loc.substr(loc.indexOf('#') + 1);

                        console.log(dat);
                        if (dat.indexOf('#') != -1)
                            dat = dat.substr(0, dat.indexOf('#'));
                        console.log(dat);

                        window.top.location.href = encodeURI(url + '#' + dat + "#search=" + v);
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