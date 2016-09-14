<?php
/**
 * Created by PhpStorm.
 * User: Subhashis
 * Date: 29-08-2016
 * Time: 02:42
 */
require_once 'functions.php';
checkAuth("Logout/");

//die( $_COOKIE['username']);
if(isset($_REQUEST['logout']))header("Location: logout/");
if(!isset($_COOKIE['username'])|$_COOKIE['username']==="")header("Location: Login/");
echo "Hi ".$_COOKIE['username'];
if(isset($_SESSION['started']))echo $_SESSION['started'];
