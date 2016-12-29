<?php
require_once 'functions.php';
	if(isset($_REQUEST['action']))
	{
		$query = "";
		if($_REQUEST['action'] == "getSlots" && isset($_REQUEST['docID'])  && $_REQUEST['docID'] != "" && isset($_REQUEST['venue']) && $_REQUEST['venue'] != "")
		{
			$docID = $_REQUEST['docID'];
			$venue = $_REQUEST['venue'];			
			$query1 = "SELECT * from Slots WHERE docID='$docID' AND venue='$venue' ORDER BY sTime";
		}
		else if($_REQUEST['action'] == "addSlot" && isset($_REQUEST['docID'])  && $_REQUEST['docID'] != "" && isset($_REQUEST['venue']) && $_REQUEST['venue'] != "" && isset($_REQUEST['sTime'])  && $_REQUEST['sTime'] != "" && isset($_REQUEST['eTime'])  && $_REQUEST['eTime'] != ""&& isset($_REQUEST['cap'])  && $_REQUEST['cap'] != "")
		{
			$docID = $_REQUEST['docID'];
			$venue = $_REQUEST['venue'];			
			$sTime = $_REQUEST['sTime'];			
			$eTime = $_REQUEST['eTime'];			
			$cap = $_REQUEST['cap'];												
			queryMysq("INSERT INTO Slots VALUES(NULL,'$docID','$venue','$cap','0','$sTime','$eTime')");
		}
		else if($_REQUEST['action'] == "setAppointment" && isset($_REQUEST['slotID'])  && $_REQUEST['slotID'] != "" && isset($_REQUEST['pID']) && $_REQUEST['pID'] != "")
		{
			$slotID = $_REQUEST['slotID'];
			$pID = $_REQUEST['pID'];			
			$query = "SELECT * from Slots WHERE id='$slotID' AND cap > apps";
			$num=sql($query)->num_rows;
			if($num > 0)
			{
				$result = sql($query);
				$slot=$result->fetch_array(MYSQLI_ASSOC); 
				$docID = $slot['docID'];
				$venue = $slot['venue'];
				$appNo = $slot['apps'];
				$sTime = $slot['sTime'];
				$eTime = $slot['eTime'];				
				$status = 2;
				if(sql("SELECT * from Reviews WHERE docID='$docID' AND pID = '$pID'")->num_rows > 0)
				{
					$status = 1;
					$appNo = $appNo + 1;
					sql("UPDATE Slots SET apps = '$appNo' WHERE id='$slotID';");
				}
				sql("INSERT INTO Appointments VALUES(NULL,'$docID','$pID','$appNo','$venue','$status','$sTime','$eTime')");
			}
		}
		else if($_REQUEST['action'] == "getAppointments" && isset($_REQUEST['docID'])  && $_REQUEST['docID'] != "" && isset($_REQUEST['venue']) && $_REQUEST['venue'] != "")
		{
			$docID = $_REQUEST['docID'];
			$venue = $_REQUEST['venue'];			
			$query1 = "SELECT * from Appointments WHERE docID='$docID' AND venue='$venue' ORDER BY appNo";
		}
		else if($_REQUEST['action'] == "getAppointments" && isset($_REQUEST['pID'])  && $_REQUEST['pID'] != "")
		{
			$pID = $_REQUEST['pID'];
			$query1 = "SELECT * from Appointments WHERE pID='$pID' ORDER BY sTime";
		}
		else if($_REQUEST['action'] == "review" && isset($_REQUEST['docID'])  && $_REQUEST['docID'] != "" && isset($_REQUEST['pID'])  && $_REQUEST['pID'] != "" && isset($_REQUEST['venue']) && $_REQUEST['venue'] != "" && isset($_REQUEST['rating']) && $_REQUEST['rating'] != "" && isset($_REQUEST['comment']))
		{
			$pID = $_REQUEST['pID'];			
			$docID = $_REQUEST['docID'];
			$venue = $_REQUEST['venue'];			
			$rating = $_REQUEST['rating'];
			$comment = $_REQUEST['comment'];						
			$time = "123345";//get System Time here
			sql("INSERT INTO Reviews VALUES(NULL,'$docID','$pID','$venue','$rating','$comment','$time')");
		}
		if($query != "")
		{
			$result = sql($query1);
			//$num = $result->num_rows;
			$row=$result->fetch_array(MYSQLI_ASSOC); 
			echo json_encode($row);
		}
	}
?>
