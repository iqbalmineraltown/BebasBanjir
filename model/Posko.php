<?php
	class Posko{
		public $id, $nama, $latitude, $longitude;
		public function __construct($data){
			$this->nama = $data['nama'];
			$this->latitude = $data['latitude'];
			$this->longitude = $data['longitude'];
		}
	}
?>