<?php 
$server = "localhost";
$username = "root";
$password = "";
$database = "siagabanjir";

mysql_connect($server, $username, $password) or die("Koneksi gagal");
mysql_select_db($database) or die("Database tidak bisa dibuka");
mysql_select_db("siagabanjir");
?>
<!DOCTYPE html>
<html lang="en" class="no-js"> 
    <head>
        <meta charset="UTF-8" />
        <title>BEBAS BANJIR</title>
        <link rel="stylesheet" type="text/css" href="css/demo.css" />
        <link rel="stylesheet" type="text/css" href="css/style.css" /><link rel="stylesheet" type="text/css" href="css/default.css" />
    </head>
    <body>
        <div class="container">
            <header>
                <div id="logo">
                    <img src="images/logo.png" height="50px">
                </div>                    
                <div id="feed" style="opacity:1">
                    <img src="images/feed/menu-feed.png">         
                </div>                    
                <div id="posko">
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
                    <div id="tengah">
						<?php
						$query = "SELECT * FROM POSTINGAN";
						$res = mysql_query($query);
						
						while($temp = mysql_fetch_array($res)){
							echo '<div id="isi">';
							echo '<div id="side">';
							echo '<img src="images/feed/thumb-nandar.png">';
							$stat = $temp['LEVEL'];
							if($stat == 1)
								echo '<img src="images/feed/status-red.png">';
							else 
								echo '<img src="images/feed/status-green.png">';
							echo '</div>';
							echo '<div id="feeds">';
							echo '<h1>Rasmunandar Rustam<span>@nandarustam</span></h1>';
							echo '<p>'.$temp['KONTEN'].'</p>';
							echo '<h3>from Pasar Minggu, Jakarta Selatan</h3>';
							echo '<br/>';
							echo '<img src="images/feed/image-sample.png" style="margin-bottom:10px;">';
							echo '<button type="button" id="komen"></button>
								<button type="rss" id="rss"></button>
								<button type="button" id="like"></button>';
							echo '</div>';
							echo '</div>';
						
						}
						
						
						
						?>
                    </div>
            </section>
            <!--<footer>
                <h1>Bebas Banjir</h1>
            </footer>-->
        </div>
    </body>
</html>