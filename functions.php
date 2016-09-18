<?php
$conn = NULL;
connect();
session_start();
function connect()
{
    $server = "localhost";
    $user = "med";
    $pass = "Local_123";
    $dbname = "med";

    global $conn;
    $conn = new mysqli($server, $user, $pass, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
}

function sql($query = "")
{
    global $conn;
    return $conn->query($query);
}

function checkAuth($path)
{//Path to redirect when fails to validate
    $username = "";
    $token = "";
    $key = "";

    if (isset($_COOKIE['username'])) $username = $_COOKIE['username'];
    if (isset($_COOKIE['token'])) $token = $_COOKIE['token'];
    if (isset($_COOKIE['key'])) $key = $_COOKIE['key'];
    //print_r($_COOKIE);
    echo "<br/>";
    if ($username != "" && $token != "" && $key != "") {
        $result = sql("SELECT * FROM `cookiestore` WHERE username='$username' AND token='$token' AND keyval='$key' AND  closed=0");
        if ($result && $result->num_rows > 0) {
            $id = $result->fetch_assoc();
            if ($result->num_rows > 1) {
                //TODO:Take proper action
            } else {
                if (isset($_SESSION['started']) && $_SESSION['started'] == 1) {
                    //TODO: If there is anything to modify in a live session
                } else if ($id['active'] == 1) {

                    $newKey = randomString(256);
                    $inittime = $id['inittime'];
                    $ip = $_SERVER['HTTP_HOST'];
                    setcookie('key', $newKey, time() + 30 * 24 * 3600);

                    sql("UPDATE `cookiestore` SET closed=1 WHERE username='$username' AND token='$token' AND closed=0");
                    sql("INSERT INTO  `cookiestore` (username,token,keyval,inittime,lasttime,ip,active,closed) VALUES ('$username','$token','$newKey','$inittime',CURRENT_TIMESTAMP,'$ip',1,0)");
                    $_SESSION['started'] = 1;
                    //echo "INSERT INTO  `cookiestore` (username,token,keyval,inittime,lasttime,ip,active,closed) VALUES ('$username','$token','$newKey','$inittime',CURRENT_TIMESTAMP,'$ip',1,0)";
                } else {

                    clearAllCookies();
                    session_destroy();
                    header("Location: " . $path);
                }
            }
        } else {
            $result = sql("SELECT * FROM `cookiestore` WHERE username='$username' AND token='$token' AND  closed=0");
            if ($result && $result->num_rows > 0) {
                //TODO: Possibly hacked. Deploy warning.

                sql("UPDATE `cookiestore` SET closed=1 WHERE username='$username' AND token='$token' AND closed=0");
            }
            clearAllCookies();
            session_destroy();
            header("Location: " . $path);
        }
    } else {
        clearAllCookies();
        session_destroy();
        header("Location: " . $path);
    }
}

function hashPass($pass)
{
    return $pass; //TODO: Decide a hashing algorithm
}


function randomString($len = 10)
{
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $randstring = '';
    for ($i = 0; $i < $len; $i++) {
        $randstring .= $characters[rand(0, strlen($characters) - 1)];
    }
    return $randstring;
}

//echo (RandomString());
function encode($str)
{
    $result = '';
    for ($i = 0; $i < strlen($str); $i++) {
        if (($str[$i] < '0' | $str[$i] > '9') & ($str[$i] < 'a' | $str[$i] > 'z') & ($str[$i] < 'A' | $str[$i] > 'Z')) {
            $result .= "[" . strval(ord($str[$i])) . ']';
        } else {
            $result .= $str[$i];
        }
    }
    return $result;
}

function decode($str)
{
    $result = '';
    $on = 0;
    $temp = '';
    for ($i = 0; $i < strlen($str); $i++) {
        if ($str[$i] == '[') {
            $on = 1;
        } else if ($str[$i] == ']') {
            $on = 0;
            $result .= chr(intval($temp));
            $temp = '';
        }
        if ($on === 0 & $str[$i] != ']') {
            $result .= $str[$i];
        } else if ($str[$i] != ']' & $str[$i] != '[') {
            $temp .= $str[$i];
        }
    }
    return $result;
}

//echo decode(encode("Hi! It's me.\n<br>"));
//echo encode("Hi! It's me.\n<br>");

function getAadharInfo($cardNumber)
{ //TODO:Update when ACCESS GRANTED
    $a = array('a', 'a');
    array_push($a, '0');
    array_push($a, '1');
    array_push($a, '2');
    array_push($a, '2');
    array_push($a, '4');
    array_push($a, '5');
    return $a;
}

//print_r( getAadharInfo(''));

function clearAllCookies()
{
    if (isset($_SERVER['HTTP_COOKIE'])) {
        $cookies = explode(';', $_SERVER['HTTP_COOKIE']);
        foreach ($cookies as $cookie) {
            $parts = explode('=', $cookie);
            $name = trim($parts[0]);
            setcookie($name, '', time() - 1000);
            setcookie($name, '', time() - 1000, '/');
        }
    }
}

?>