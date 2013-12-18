<?php
	class DAM extends mysqli{
		public function __construct(){
			if($_SERVER['SERVER_NAME']=="localhost"){
				parent::__construct("localhost","root","","siagabanjir");
			}
			else {
				parent::__construct("localhost","root","","siagabanjir");
			}
		}
		
		public function createPosko($data){
			$nama = $data->nama;
			$latitude = $data->latitude;
			$longitude = $data->longitude;
			$query = "INSERT INTO `posko` (`NAMA_POSKO`,`LATITUDE`,`LONGITUDE`) VALUES ('$nama','$latitude','$longitude')";		
			return parent::query($query);
		}
	}
?>