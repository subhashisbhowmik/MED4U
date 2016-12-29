<?php 
require_once 'functions.php';
createTable('Slots',
	      'id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	      docID INT,
	      venue INT,
	      cap INT,
	      apps INT,
	      sTime INT,
	      etime INT');
createTable('Appointments',
	      'id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	      docID INT,
	      pID int,
	      appNo INT,
	      venue INT,
	      status INT,
	      sTime INT,
	      etime INT');	
createTable('Reviews',
	      'id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	      docID INT,
	      pID INT,
	      venue INT,
	      rating INT,
	      commnets VARCHAR(200),
	      time INT');	            
echo "Done";
?>
