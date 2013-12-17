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
        <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
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
                <center>    
                        <div id="loginform2">
                        <form name="insert" method="post" autocomplete="on" enctype="multipart/form-data">
                          <table class="create" border="0">
                            <tr>
                              <center><img src="images/feed/nandar.png"> </center>
                            </tr>
                            <tr>
                              <td scope="row">JenisBantuan</td>
                              <td><input type="text" name="jenis"></td>
                            </tr>
                             <tr>
                              <td scope="row">Di Posko</td>
                              <td>
									<select name="posko">
										<?php 
											$q = mysql_query("SELECT ID,NAMA_POSKO FROM posko");
											while($temp = mysql_fetch_array($q)){
												echo "<option value='".$temp['ID']."'>".$temp['NAMA_POSKO']."</option>";
											
											}
										?>
									</select>
								</td>
                            </tr>
                            <tr>
                              <td scope="row">Jumlah</td>
                              <td><input type="number" name="jumlah"></td>
                            </tr>                          
                            <tr>
                              <td scope="row"></td>
                              <!--button-->
                              <td><input name="upload" id="button" type="submit" ></input>
                              <input id="button" type="reset" id="clear"></input>
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


if (isset($_POST['upload'])){
$jenis1 = $_POST['jenis'];
$jumlah1 = $_POST['jumlah'];
$posko1 = $_POST['posko'];
$sql = "INSERT INTO bantuan (JENIS, JUMLAH, ID_POSKO) values ('$jenis1','$jumlah1','$posko1')";
mysql_query($sql);
}
?>