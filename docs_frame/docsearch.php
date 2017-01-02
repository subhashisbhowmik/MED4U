<?php
/**
 * Created by PhpStorm.
 * User: Subhashis
 * Date: 02-01-2017
 * Time: 23:58
 */
require_once '../functions.php';
if (checkAuth("")==0) die('0');
$words="";
if(isset($_REQUEST['search']))$words=$_REQUEST['search'];
//$words="Hello  there! mY name[is]S/b123";
$words = preg_replace("![^a-z0-9]+!i", " ", $words);
$words=strtolower($words);
$wordlist=explode(" ",$words);
//print_r($wordlist);
//TODO: JOIN Chambers, Hospitals etc, add more to the OR queue
$q="SELECT *, `users`.`id` AS `user_id`, `doctors`.`id` AS `doc_id` FROM `doctors` JOIN `users` ON `userid`=`users`.`id` WHERE ";
foreach($wordlist as $word){
    $q.="LOWER(`qualifications`) LIKE '%$word%' OR ";
    $q.="LOWER(`specializations`) LIKE '%$word%' OR ";
    $q.="LOWER(`firstname`) LIKE '%$word%' OR ";
    $q.="LOWER(`middlename`) LIKE '%$word%' OR ";
    $q.="LOWER(`lastname`) LIKE '%$word%' OR ";
    $q.="LOWER(`profession`) LIKE '%$word%' OR ";
    $q.="LOWER(`phone`) LIKE '%$word%' OR ";
    $q.="LOWER(`email`) LIKE '%$word%' OR ";
}
$q=substr($q, 0, -3);
//echo $q;
$r=sql($q);
$doctors=array();
foreach($r as $row){
//    print_r($row);
//    echo '<br/>';
    $doctor=array('docid'=>$row['doc_id'],'name'=>$row['firstname'].' '.$row['lastname'],'phone'=>$row['phone'],'email'=>$row['email'],'qualifications'=>$row['qualifications'],'specializations'=>$row['specializations'],'others'=>'');
    array_push($doctors,$doctor);
}
$out=json_encode($doctors);
echo $out;



