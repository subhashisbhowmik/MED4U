<?php
/**
 * Created by PhpStorm.
 * User: Subhashis
 * Date: 29-08-2016
 * Time: 02:21
 */
//session_start();
//if(isset($_COOKIE['username'])&&$_COOKIE['username']!="")header("Location: ");
require_once 'functions.php';
$username="";
$password="";
if(isset($_POST['username']))$username=$_POST['username'];
if(isset($_POST['password']))$password=$_POST['password'];
if($username===""|$password===""){
    echo 0;
    die();
}//header("Location: Login");
//echo $_POST['username']."<br>";
$username=filter_var($username, FILTER_SANITIZE_STRING);
$password=filter_var($password, FILTER_SANITIZE_STRING);

$result=sql("SELECT * FROM `users` WHERE username='$username' AND password='$password';");
//echo "SELECT * FROM `users` WHERE username='$username' AND password='$password';";

if($result&&$result->num_rows>0){
    $id=$result->fetch_assoc();
    //echo "WELCOME ".$id['firstname'].".";
    //setcookie('username',$id['username'],time()+30*24*3600);
    //setcookie('password',$id['password'],time()+30*24*3600);//TODO: Replace With Token. *Potential Security Issue*
    $key=RandomString(256);
    $token=RandomString(256);

    echo '1!';
    echo $id['username'].'!';
    echo $token.'!'.$key;
    //TODO:add to DB
    //echo $_COOKIE['username'];
}else{
    echo "0"; //TODO: Set proper UI Action
}
