<?php
	class DaerahBanjir{
		public $id, $nama, $latitude, $longitude;
		public function __construct($data){
			$this->nama = $data['dnama'];
			$this->latitude = $data['dlatitude'];
			$this->longitude = $data['dlongitude'];
		}
	}
?>