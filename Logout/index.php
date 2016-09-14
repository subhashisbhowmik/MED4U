<?php
/**
 * Created by PhpStorm.
 * User: Subhashis
 * Date: 02-09-2016
 * Time: 02:17
 */
require_once '../functions.php';
checkAuth("../Login/");
$username="";
$token="";
if(isset($_COOKIE['username']))$username=$_COOKIE['username'];
if(isset($_COOKIE['token']))$token=$_COOKIE['token'];

sql("UPDATE `cookiestore` SET closed=1 WHERE username='$username' AND token='$token'");
//die("UPDATE `cookiestore` SET closed=1 WHERE username='$username' AND token='$token'");
clearAllCookies();//TODO:Actions required in DB
session_destroy();
header("Location: ../Login/");

?>