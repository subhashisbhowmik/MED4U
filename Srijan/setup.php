<?php 
require_once 'functions.php';
createTable('slots',
	      'id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	      docID INT,
	      venue INT,
	      cap INT,
	      apps INT,
	      stime INT,
	      etime INT');
createTable('appointments',
	      'id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	      docID INT,
	      pID int,
	      appNo INT,
	      venue INT,
	      status INT,
	      stime INT,
	      etime INT');	
createTable('reviews',
	      'id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	      docID INT,
	      pID INT,
	      venue INT,
	      rating INT,
	      comments VARCHAR(200),
	      time INT');	            
echo "Done";
?>
