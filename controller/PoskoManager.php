<?php
	require("/../model/Posko.php");
	include_once("dam.php");
	
	class PoskoManager{
		private $db;
		public function __construct(){
			$this->db = new DAM();
		}
		
		public function createPosko($data){
			$posko = new Posko($data);
			return $this->db->createPosko($posko);
		}
	}
?>