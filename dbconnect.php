<?php

$server = "localhost";
$username = "root";
$password = "";
$database = "siagabanjir";

mysql_connect($server, $username, $password) or die("Koneksi gagal");
mysql_select_db($database) or die("Database tidak bisa dibuka");
mysql_select_db("siagabanjir");

?>