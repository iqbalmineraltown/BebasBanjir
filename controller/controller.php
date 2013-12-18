<?php
	session_start();
	
	$action = $_REQUEST['dispatch'];
	
	if($action == "createposko"){
		$data = array();
		$data['dnama'] = $_POST['nama'];
		$data['dlatitude'] = $_POST['latitude'];
		$data['dlongitude'] = $_POST['longitude'];
	}
?>