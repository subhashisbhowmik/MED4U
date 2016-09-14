<?php
/**
 * Created by PhpStorm.
 * User: Subhashis
 * Date: 29-08-2016
 * Time: 02:21
 */
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
$password=hashPass($password);
$result=sql("SELECT * FROM `users` WHERE username='$username' AND password='$password';");
//echo "SELECT * FROM `users` WHERE username='$username' AND password='$password';";

if($result&&$result->num_rows>0){
    $id=$result->fetch_assoc();
    //echo "WELCOME ".$id['firstname'].".";
    //setcookie('username',$id['username'],time()+30*24*3600);
    //setcookie('password',$id['password'],time()+30*24*3600);//TO-DO: Replace With Token. *Potential Security Issue*
    $key=randomString(256);
    $token=randomString(256);
    $username=$id['username'];
    $ip=$_SERVER['REMOTE_ADDR'];
    $rememberMe=1;//TODO: And and Take remember me input

    //setcookie('username',$id['username'],time()+30*24*3600);
    //setcookie('token',$token,time()+30*24*3600);
    //setcookie('key',$key,time()+30*24*3600);


    //TODO:add more details to DB
    sql("INSERT INTO  `cookiestore` (username,token,keyval,inittime,lasttime,ip,active,closed) VALUES ('$username','$token','$key',CURRENT_TIMESTAMP ,CURRENT_TIMESTAMP,'$ip',$rememberMe,0 )");
    //echo "INSERT INTO `cookiestore` (username,token,keyval,inittime,lasttime,ip,active,closed) VALUES ('$username','$token','$key',CURRENT_TIMESTAMP ,CURRENT_TIMESTAMP,'$ip',1,0 )";
    $_SESSION['started']=1;
    echo '1!';
    echo $username.'!';
    echo $token.'!'.$key;
    
    //echo $_COOKIE['username'];

}else{
    echo "0"; //TO-DO: Set proper UI Action
}
