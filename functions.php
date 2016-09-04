<?php
$conn=NULL;
connect();

function connect(){
    $server="localhost";
    $user="local";
    $pass="local";
    $dbname="med";


    global $conn;
    $conn = new mysqli($server, $user, $pass, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
}

function sql($query=""){
    global $conn;
    return $conn->query($query);
}

function RandomString($len=10)
{
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $randstring = '';
    for ($i = 0; $i < $len; $i++) {
        $randstring .= $characters[rand(0, strlen($characters)-1)];
    }
    return $randstring;
}
//echo (RandomString());
function encode($str){
    $result='';
    for($i=0;$i<strlen($str);$i++){
        if(($str[$i]<'0'|$str[$i]>'9')&($str[$i]<'a'|$str[$i]>'z')&($str[$i]<'A'|$str[$i]>'Z')){
            $result.="[".strval(ord($str[$i])).']';
        }else{
            $result.=$str[$i];
        }
    }
    return $result;
}

function decode($str){
    $result='';
    $on=0;
    $temp='';
    for($i=0;$i<strlen($str);$i++){
        if($str[$i]=='['){
            $on=1;
        }else if($str[$i]==']'){
            $on=0;
            $result.=chr(intval($temp));
            $temp='';
        }
        if($on===0&$str[$i]!=']'){
            $result.=$str[$i];
        }else if($str[$i]!=']'&$str[$i]!='['){
            $temp.=$str[$i];
        }
    }
    return $result;
}
//echo decode(encode("Hi! It's me.\n<br>"));
//echo encode("Hi! It's me.\n<br>");

function getAadharInfo($cardNumber){ //TODO:Update when ACCESS GRANTED
    $a=array('a','a');
    array_push($a,'0');
    array_push($a,'1');
    array_push($a,'2');
    array_push($a,'2');
    array_push($a,'4');
    array_push($a,'5');
    return $a;
}
//print_r( getAadharInfo(''));

function clearAllCookies(){
    if (isset($_SERVER['HTTP_COOKIE'])) {
        $cookies = explode(';', $_SERVER['HTTP_COOKIE']);
        foreach($cookies as $cookie) {
            $parts = explode('=', $cookie);
            $name = trim($parts[0]);
            setcookie($name, '', time()-1000);
            setcookie($name, '', time()-1000, '/');
        }
    }
}
?>