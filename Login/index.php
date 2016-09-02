<?php
//session_start();
if(isset($_COOKIE['username'])) header("Location: ../");
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>MED4U</title>
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="../css/doublebounce.css">

</head>

<body >

<div class="container">
    <div class="login">
        <img class="logo" src="../images/Medipack.png" height="100px"/>
        <br/><h1 class="login-heading">
            <strong>Welcome.</strong></h1>
        <!--form method="post" action="../login.php"-->
        <div class="lnk warning" hidden="hidden" style="color:#fd0;float:right;position: relative; padding-bottom: 0% ; font-size: 90%" ><strong>Invalid Username or Password</strong></div>
        <input style="display:none">
        <input type="password" style="display:none">
        <input type="text"  name="username" id="username" placeholder="Username" required="required" class="input-txt"/>

        <input type="text" style="-webkit-text-security: disc;" name="password" id="password" placeholder="Password" required="required" class="input-txt"/>
        <!--            <br/><span class="lnk" style="color:pink; float:right; margin-left:3%" hidden="hidden"></span>-->
        <div class="login-footer">
                <a href="#" class="lnk">
                    <!--span class="icon icon--min">ಠ╭╮ಠ</span-->
                    I've forgotten something
                </a>

                <!--                <div class="sk-folding-cube loader" hidden="hidden" style="position: relative;float: right;zoom:0.5;margin-left: 12px;margin-right: 12px;">-->
                <!--                    <div class="sk-cube1 sk-cube"></div>-->
                <!--                    <div class="sk-cube2 sk-cube"></div>-->
                <!--                    <div class="sk-cube4 sk-cube"></div>-->
                <!--                    <div class="sk-cube3 sk-cube"></div>-->
                <!--                </div>-->
                <button type="submit" id="submit" class="btn btn--right">Sign in</button>
                <div class="spinner loader" hidden="hidden" style="position: relative;float: right;zoom:0.5;margin-left: 12px;margin-right: 12px; margin-top:3%;overflow: visible">
                    <div class="double-bounce1"></div>
                    <div class="double-bounce2"></div>
                </div>
                <div style='clear: both'>
            </div>
        <!--/form-->
    </div>
</div>
<script src="../js/jq.js"></script>
<script src="../js/jqui.js"></script>

<script src="../js/cookie.js"></script>

<script src="js/index.js"></script>


</body>
</html>
