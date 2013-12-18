<?php
	class Korban{
		public $id, $nama, $usia, $jenis_kelamin;
		public function __construct($data){
			$this->nama = $data['dnama'];
			$this->usia = $data['dusia'];
			$this->jenis_kelamin = $data['djenis_kelamin'];
		}
	}
?>