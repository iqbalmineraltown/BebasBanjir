<?php
	session_start();
	$action = $_REQUEST['dispatch'];
	
	if($action == "createposko"){
		$data = array();
		$data['nama'] = $_POST['nama'];
		$data['latitude'] = $_POST['latitude'];
		$data['longitude'] = $_POST['longitude'];
		
		include_once("controller/PoskoManager.php");
		$pm = new PoskoManager();
		
		$value = $pm->createPosko($data);
		
		header("Location: index.html");
		exit(0);
	}
?>