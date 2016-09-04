<?php
require_once 'functions.php';
$reset="0";
if(isset($_GET['reset']))$reset=$_GET['reset'];


if($reset==="1") sql('DROP TABLE IF EXISTS `users`;');
sql("CREATE TABLE IF NOT EXISTS users(
     id   INT UNIQUE NOT NULL AUTO_INCREMENT,
     username VARCHAR (50) UNIQUE NOT NULL,
     password VARCHAR (100) NOT NULL,
     birthday  DATE NOT NULL,
     sex INT NOT NULL,
     address  VARCHAR (500),
     profession  VARCHAR (30),
     firstname VARCHAR (50) NOT NULL,
     middlename VARCHAR (50),
     lastname VARCHAR (50) NOT NULL,
     aadhar VARCHAR (20) NOT NULL,
     phone INT,
     email VARCHAR (50),
     latitude DOUBLE,
     longitude DOUBLE,
     lasttime TIMESTAMP,
     initialtime TIMESTAMP,
     PRIMARY KEY (id)
     );");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if($reset==="1") sql('DROP TABLE IF EXISTS `users`;');
sql("CREATE TABLE IF NOT EXISTS cookiestore(
     id   INT UNIQUE NOT NULL AUTO_INCREMENT,
     username VARCHAR (50) UNIQUE NOT NULL,
     token VARCHAR (256) NOT NULL,
     keyval VARCHAR (256) NOT NULL,
     inittime TIMESTAMP NOT NULL,
     starttime TIMESTAMP NOT NULL,
     lasttime TIMESTAMP NOT NULL,
     ip  VARCHAR (25),
     info VARCHAR (200),
     active BIT NOT NULL,
     closed BIT NOT NULL,
     latitude DOUBLE,
     longitude DOUBLE,
     PRIMARY KEY (id)
     );");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if($reset!='1')
echo "SETUP COMPLETE";
else echo "RESET COMPLETE";

?>