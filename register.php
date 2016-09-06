<?php
/**
 * Created by PhpStorm.
 * User: Subhashis
 * Date: 06-09-2016
 * Time: 13:28
 */
$fname="";
$mname="";
$lname="";
$email="";
$password="";
if(isset($_POST['submit'])){
    if(isset($_POST['fname'])) $fname=$_POST['fname'];
    if($fname=="")die(0);
    if(isset($_POST['mname'])) $mname=$_POST['mname'];
    if(isset($_POST['lname'])) $lname=$_POST['lname'];
    if($lname=="")die(0);
    if(isset($_POST['email'])) $lname=$_POST['email'];
    if($email=="")die(0);
    if(isset($_POST['pass'])) $lname=$_POST['pass'];
    if($pass=="")die(0);



}