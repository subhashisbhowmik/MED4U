<?php
/**
 * Created by PhpStorm.
 * User: Subhashis
 * Date: 06-09-2016
 * Time: 13:28
 */

//TODO:Add security filters/add encoders.
$fname = "";
$mname = "";
$lname = "";
$email = "";
$password = "";
print_r($_REQUEST);
if (isset($_POST['submit'])) {
    if (isset($_POST['fname'])) $fname = $_POST['fname'];
    if ($fname == "") die();
    if (isset($_POST['mname'])) $mname = $_POST['mname'];
    if (isset($_POST['lname'])) $lname = $_POST['lname'];
    if ($lname == "") die();
    if (isset($_POST['email'])) $lname = $_POST['email'];
    if ($email == "") die();
    if (isset($_POST['password'])) $lname = $_POST['password'];
    if ($password == "") die();
}//TODO: Check validity properly

//TODO:Add all relevant values----Fix DOB---Fix Sex---Fix address--Fix profession--Fix aadhar--
$result=sql("INSERT INTO `users` 
        (`id`, `username`, `password`, `birthday`, `sex`, `address`, `profession`, `firstname`, `middlename`, `lastname`, `aadhar`,      `phone`, `email`, `latitude`, `longitude`, `lasttime`,        `initialtime`) 
VALUES (NULL,   '$email',  '$password','1996-07-29', '0', 'addr',    'student',     '$fname',   '$mname',      '$lname',  '5987654512531', NULL,  '$email', '0',         '0',        CURRENT_TIMESTAMP, CURRENT_TIMESTAMP)");

//TODO:Authenticate 


header("Location: ../");

?>