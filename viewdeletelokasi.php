<!DOCTYPE html>

<?php
$server = "localhost";
$username = "root";
$password = "";
$database = "siagabanjir";

mysql_connect($server, $username, $password) or die("Koneksi gagal");
mysql_select_db($database) or die("Database tidak bisa dibuka");
mysql_select_db("siagabanjir");
$data = mysql_query("SELECT * FROM  `daerah_banjir` ORDER BY ID DESC LIMIT 10");
$arrLat = array();
$arrLong = array();
$arrAdd = array();
while($info = mysql_fetch_array( $data )) 
 {
 	array_push($arrLat, $info['LATITUDE']);
	array_push($arrLong, $info['LONGITUDE']);
	array_push($arrAdd, $info['NAMA_WILAYAH']);
 }

?>

<!DOCTYPE html>
<html lang="en" class="no-js">
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="initial-scale=1.0, user-scalable=no">
		<title>BEBAS BANJIR</title>
		<link rel="stylesheet" type="text/css" href="css/demo.css" />
		<link rel="stylesheet" type="text/css" href="css/style.css" />
		<link rel="stylesheet" type="text/css" href="css/default.css" />
		<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false&libraries=places"></script>
		<script>
			function initialize() {
				var myLatlng = new google.maps.LatLng(<?php echo json_encode($arrLat[0]) ?>;, <?php echo json_encode($arrLong[0]) ?>;);
				var myLatlng2 = new google.maps.LatLng(<?php echo json_encode($arrLat[1]) ?>;, <?php echo json_encode($arrLong[1]) ?>;);
				var myLatlng3 = new google.maps.LatLng(<?php echo json_encode($arrLat[2]) ?>;, <?php echo json_encode($arrLong[2]) ?>;);
				var myLatlng4 = new google.maps.LatLng(<?php echo json_encode($arrLat[3]) ?>;, <?php echo json_encode($arrLong[3]) ?>;);
				var myLatlng5 = new google.maps.LatLng(<?php echo json_encode($arrLat[4]) ?>;, <?php echo json_encode($arrLong[4]) ?>;);
				var myLatlng6 = new google.maps.LatLng(<?php echo json_encode($arrLat[5]) ?>;, <?php echo json_encode($arrLong[5]) ?>;);
				var myLatlng7 = new google.maps.LatLng(<?php echo json_encode($arrLat[6]) ?>;, <?php echo json_encode($arrLong[6]) ?>;);
				var myLatlng8 = new google.maps.LatLng(<?php echo json_encode($arrLat[7]) ?>;, <?php echo json_encode($arrLong[7]) ?>;);
				var myLatlng9 = new google.maps.LatLng(<?php echo json_encode($arrLat[8]) ?>;, <?php echo json_encode($arrLong[8]) ?>;);
				var myLatlng10 = new google.maps.LatLng(<?php echo json_encode($arrLat[9]) ?>;, <?php echo json_encode($arrLong[9]) ?>;);
				var mapOptions = {
					zoom : 25,
					center : myLatlng
				}
				var map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);

				var marker = new google.maps.Marker({
					position : myLatlng,
					map : map,
					title : '<?php echo json_encode($arrAdd[0]) ?>'
				});
				
				var marker2 = new google.maps.Marker({
					position : myLatlng2,
					map : map,
					title : '<?php echo json_encode($arrAdd[1]) ?>'
				});
				
				var marker3 = new google.maps.Marker({
					position : myLatlng3,
					map : map,
					title : '<?php echo json_encode($arrAdd[2]) ?>'
				});
				
				var marker4 = new google.maps.Marker({
					position : myLatlng4,
					map : map,
					title : '<?php echo json_encode($arrAdd[3]) ?>'
				});
				
				var marker5 = new google.maps.Marker({
					position : myLatlng5,
					map : map,
					title : '<?php echo json_encode($arrAdd[4]) ?>'
				});
				
				var marker6 = new google.maps.Marker({
					position : myLatlng6,
					map : map,
					title : '<?php echo json_encode($arrAdd[5]) ?>'
				});
				
				var marker7 = new google.maps.Marker({
					position : myLatlng7,
					map : map,
					title : '<?php echo json_encode($arrAdd[6]) ?>'
				});
				
				var marker8 = new google.maps.Marker({
					position : myLatlng8,
					map : map,
					title : '<?php echo json_encode($arrAdd[7]) ?>'
				});
				
				var marker9 = new google.maps.Marker({
					position : myLatlng9,
					map : map,
					title : '<?php echo json_encode($arrAdd[8]) ?>'
				});
				
				var marker10 = new google.maps.Marker({
					position : myLatlng10,
					map : map,
					title : '<?php echo json_encode($arrAdd[9]) ?>'
				});
			}


			google.maps.event.addDomListener(window, 'load', initialize);

		</script>
	</head>
	<body>
		<div class="container">
			<header>
				<div id="logo">
					<img src="images/logo.png" height="50px">
				</div>
				<div id="feed" >
					<img src="images/feed/menu-feed.png">
				</div>
				<div id="posko">
					<img src="images/feed/menu-help.png">
				</div>
				<div id="map" style="opacity:1">
					<img src="images/feed/menu-map.png">
				</div>
			</header>
			<section class="keterangan">
				<div id="post">
					<button type="button" id="post"></button>
				</div>
				<div id="user">
					<img src="images/feed/nandar.png">
				</div>
			</section>
			<section class="main">
				<center>
					<div id="loginform2">
						<form name="insert" action="viewdeletelokasi.php" method="post" autocomplete="on">
							<table class="create" border="0">
								<tr>
									<td id="Judul" style="text-align:center; font-size:24px; margin-top:10px;"><b>REPORTS AROUND</b></td>
								</tr>
								<tr>
									<td><div id="map-canvas"></div></td>
								</tr>
								<tr>
									<!--button-->
									<td>
									<center>
										<input id="buttonpost" type="button" value="Remove" >
									</center></input></td>
								</tr>
							</table>
						</form>
					</div>
				</center>
			</section>
			<!--<footer>
			<h1>Bebas Banjir</h1>
			</footer>-->
		</div>
	</body>
</html>
