<?php
/**
 * Created by PhpStorm.
 * User: Subhashis
 * Date: 06-09-2016
 * Time: 13:30
 */
require_once 'functions.php';
$email="";
if(isset($_REQUEST['email'])) $email=$_REQUEST['email'];
if($email==="")die();
$at=strrpos($email,"@");
$dot=strrpos($email,".");
//echo ("!$at,$dot,");
if($at==''||$dot=='')die();
if($dot<=$at)die("2!$at,$dot");
$result=sql("SELECT 1 FROM `users` WHERE email='$email'");
if($result->num_rows>0)die('0');
else echo 1;
?>