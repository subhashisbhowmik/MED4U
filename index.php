<?php
/**
 * Created by PhpStorm.
 * User: Subhashis
 * Date: 29-08-2016
 * Time: 02:42
 */
session_start();
//die( $_COOKIE['username']);
if(isset($_GET['logout']))header("Location: logout/");
if(!isset($_COOKIE['username'])|$_COOKIE['username']==="")header("Location: Login/");
echo "Hi ".$_COOKIE['username'];
