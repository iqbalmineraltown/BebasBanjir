<?php
	class Bantuan{
		public $id, $nama, $jumlah, $satuan;
		public function __construct($data){
			$this->nama = $data['dnama'];
			$this->jumlah = $data['djumlah'];
			$this->satuan = $data['dsatuan'];
		}
	}
?>