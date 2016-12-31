$(document).ready(function () {
    // alert('hi');
    var username="";
    var password="";
    var running=false;
    function animateLoad(){
        $('.loader').show('fade','swing','fast');//"slide", { direction: "left" }, 1000);
        $('button#submit').prop('disabled', true);
        running=true;
    }
    function stopAnimateLoad(){
        $('.loader').hide('fade','swing','fast');
        $('button#submit').prop('disabled', false);
        running=false;
    }
    //$('input#username').focus();
    // if($('input#username').val()!=''){
    //     var inp=$('input#password')
    //     inp.select();
    //     // var temp=inp.val();
    //     // inp.val('');
    //     // inp.val(temp);
    // }
    $('button#submit').prop('disabled', true);
    setInterval(function() {
        //alert(1);
        //alert($('input#password').val() != '');
        if($('input#username').val() != ''&&$('input#password').val() != ''&&!running ) {
            $('button#submit').prop('disabled', false);
            //alert(1);
            //$('button#submit').switchClass('btn','btn-disabled',500);
        }else{
            $('button#submit').prop('disabled', true);
            //$('button#submit').switchClass('btn-disabled','btn',500);
        }
    },100);
    $('input#username').on("keypress", function(e) {
        /* ENTER PRESSED*/
        if (e.keyCode == 13)
            $('input#password').select().focus();
    });
    $('input#password').on("keypress", function(e) {
        /* ENTER PRESSED*/
        if (e.keyCode == 13)
            $('#submit').click();
    });
    $('button#submit').click(function () {
        // document.getElementById('username').validity.valid();
        // document.getElementById('password').validity.valid();
        username=$('input#username').val();
        password=$('input#password').val();
        animateLoad();
        $.post('../login.php',{username:username, password:password},function (data) {
            // stopAnimateLoad();
            var datas=data.split('!');
            //alert(datas[0]);
            if(datas[0]==1){
                Cookies("username", datas[1], { expires : 30 });
                //alert("1");
                Cookies("token", datas[2], { expires : 30 });
                Cookies("key", datas[3], { expires : 30 });
                window.location.replace("../");
            }else if(datas[0]==0){
                //alert("Wrong info");
                //wrong();
                stopAnimateLoad();
                $('input').switchClass('input-txt','input-txt-error',100);
                var $warning=$('.warning');
                $warning.html('<strong>Invalid Username or Password</strong>');
                $warning.show('fast');

            }
        }).always(function () {
            stopAnimateLoad();
            //.addClass('input-txt-error').removeClass('input-txt');//.switchClass('input-txt','input-txt-error',100);
            //$('input').toggle().toggle();
        });
    });
    $('input').blur(function () {
        $(this).switchClass('input-txt-error','input-txt',500);
        $('.warning').hide('hide');
    });
});
