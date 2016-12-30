<?php
/**
 * Created by PhpStorm.
 * User: Subhashis
 * Date: 29-08-2016
 * Time: 02:42
 */
require_once '../functions.php';
checkAuth("../Logout/");

if (isset($_REQUEST['logout'])) header("Location: ../Logout/");
if (!isset($_COOKIE['username']) | $_COOKIE['username'] === "") header("Location: ../Login/");
//if (isset($_SESSION['started'])) echo $_SESSION['started'];
$username=$_COOKIE['username'];
$pid=sql("SELECT `id` FROM `users` WHERE `username`='$username'")->fetch_assoc()['id'];
$result=sql("SELECT * FROM `docstarred` WHERE `pid`='$pid'");
foreach ($result as $row){
    $docid=$row['docid'];
    $res=sql("SELECT * FROM `doctors` WHERE `id`='$docid'")->fetch_assoc();
    $qualifications=$res['qualifications'];
    $specializations=$res['specializations'];
    $docuserid=$res['userid'];
    $details=sql("SELECT *FROM `users` WHERE `id`='$docuserid'")->fetch_assoc();
    $name=$details['firstname']." ".$details['lastname'];
    echo $name."<br/>";
    echo $qualifications."<br/>";
    echo $specializations."<br/>";
    //TODO: Front End Stuff
}
?>
