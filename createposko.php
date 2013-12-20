<!DOCTYPE html>
<html lang="en" class="no-js">
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="initial-scale=1.0, user-scalable=no">
		<title>BEBAS BANJIR</title>
		<link rel="stylesheet" type="text/css" href="css/demo.css" />
		<link rel="stylesheet" type="text/css" href="css/style.css" />
		<link rel="stylesheet" type="text/css" href="css/default.css" />
		<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?v=3&amp;sensor=false&amp;key=AIzaSyD3VSb2IYSKdPdcDWFffqh0pGy9S47Klzk"></script>
		<script type="text/javascript">
							google.maps.event.addDomListener(window, "load", function() {
								//
								// initialize map
								//
								var map = new google.maps.Map(document.getElementById("map-canvas"), {
									center : new google.maps.LatLng(33.808678, -117.918921),
									zoom : 13,
									mapTypeId : google.maps.MapTypeId.ROADMAP
								});
								//
								// initialize marker
								//
								var marker = new google.maps.Marker({
									position : map.getCenter(),
									draggable : true,
									map : map
								});
								//
								// intercept map and marker movements
								//
								google.maps.event.addListener(map, "idle", function() {
									marker.setPosition(map.getCenter());
									//document.getElementById("mapoutput").innerHTML = "<a href=\"https://maps.google.com/maps?q=" + encodeURIComponent(map.getCenter().toUrlValue()) + "\" target=\"_blank\" style=\"float: right;\">Go to maps.google.com</a>Latitude: " + map.getCenter().lat().toFixed(6) + "<br>LC: " + map.getCenter().lng().toFixed(6);
									document.getElementById("javascriptOutPut1").value = map.getCenter().lng().toFixed(6);
									document.getElementById("javascriptOutPut2").value = map.getCenter().lat().toFixed(6);
								});
								google.maps.event.addListener(marker, "dragend", function(mapEvent) {
									map.panTo(mapEvent.latLng);
								});
								//
								// initialize geocoder
								//
								var geocoder = new google.maps.Geocoder();
								google.maps.event.addDomListener(document.getElementById("mapform"), "submit", function(domEvent) {
									if(domEvent.preventDefault) {
										domEvent.preventDefault();
									} else {
										domEvent.returnValue = false;
									}
									geocoder.geocode({
										address : document.getElementById("pac-input").value
									}, function(results, status) {
										if(status == google.maps.GeocoderStatus.OK) {
											var result = results[0];
											document.getElementById("pac-input").value = result.formatted_address;
											if(result.geometry.viewport) {
												map.fitBounds(result.geometry.viewport);
											} else {
												map.setCenter(result.geometry.location);
											}
										} else if(status == google.maps.GeocoderStatus.ZERO_RESULTS) {
											alert("Sorry, the geocoder failed to locate the specified address.");
										} else {
											alert("Sorry, the geocoder failed with an internal error.");
										}
									});
								});
							});

						</script>
	</head>
	<body>
		<div class="container">
            <header>
                <div id="logo">
                    <img src="images/logo.png" height="50px">
                </div>                    
                <div id="feed" onclick="location.href='index.html';">
                    <img src="images/feed/menu-feed.png">         
                </div>                    
                <div id="posko" style="opacity:1">
                    <img src="images/feed/menu-help.png">
                </div>
                <div id="map">
                    <img src="images/feed/menu-map.png">
                </div>
            </header>
            <section class="keterangan">
                <div id="post">
                    <button type="button" id="post">
                    </button>
                </div>                    
                <div id="user">
                    <img src="images/feed/nandar.png">         
                </div>                    
            </section>
            <section class="main">
                <center>    
                <form id="mapform" action="#">
                  <input name ="pac-input" id="pac-input" class="controls" type="text" placeholder="Search Box"></input>
                  <input id="buttonpost" type="submit" value="FIND" name="submit"></input>
                </form>
                    <div id="loginform2">
                       <form name="insert" method="post" autocomplete="on">
                          <table class="create" border="0">
                            <tr>
                              <td id="Judul" style="text-align:center; font-size:24px; margin-top:10px;"><b>CREATE POSKO</b></td>
                            </tr>
                            <tr>
                              <td><input type="text" id="textfield" placeholder="NAME" name="namaposko"></td>
                            </tr>
                            <tr>
                              <td>  
                                <div id="map-canvas" style="height:250px"></div></td>
                            </tr>
                            <tr>
                                <td><input type="text" id="textfield" placeholder="Jumlah Korban"></td>
                            </tr>  
                            <tr>
                              <!--button-->
                              <td><center><input id="buttonpost" type="submit" value="ADD DETAIL" name="addDetailPosko" ></input></center>
                             </td>
                            </tr>
                            <tr>
                                <td><input type="text" id="textfield" placeholder="Kontak"></td>
                            </tr>                               
                            <tr>
                              <!--button-->
                              <input type="hidden" name="javascriptOutPut1" id="javascriptOutPut1"/>
                              <input type="hidden" name="javascriptOutPut2" id="javascriptOutPut2"/>
                              
                              <td>
                                 <center><input id="buttonpost" type="submit" value="SUBMIT" name="upload"/></input></center>

                             </td>
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
<?php
	session_start();

if (isset($_POST['upload'])) {
	$_SESSION['createposko']['latitude'] = $_POST['javascriptOutPut2'];
	$_SESSION['createposko']['longitude'] = $_POST['javascriptOutPut1'];
	$_SESSION['createposko']['nama'] = $_POST['namaposko'];
	$_SESSION['createposko']['dispatch'] = 'createposko';
	header("Location: controller.php");
	exit();
	
}

if (isset($_POST['addDetailPosko'])) {
	header("Location: addDetailKorban.html");
}
?>