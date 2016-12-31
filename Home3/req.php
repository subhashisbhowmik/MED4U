<?php
	$r=[];
	$v = $_REQUEST["id"];
	$r['head'] = "Head".$v;
	$r['body'] = "Body".$v;
	echo json_encode($r);
?>
	
