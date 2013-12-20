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
                <div id="feed" >
                    <img src="images/feed/menu-feed.png" onclick="location.href='index.php';">         
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
                        <div id="loginform2">
                          <table class="create" border="0">
                            <tr>
                              <td id="Judul" style="text-align:center; font-size:24px; margin-top:10px;"><b>POSKO</b></td>
                            </tr>                            
                            <tr>
                              <td><center>
                                <table id="korban" border="1">
                                <?php
                                $query = "SELECT * FROM POSKO";
                                $res = mysql_query($query);
                                $count = '1';

                                echo'  <tr>';
                                echo'    <td>NO';
                                 echo'   </td>';
                                echo'    <td>NAMA POSKO';
                                echo'    </td>';
                                 echo'    <td><center>ACTION</center>';
                                echo'    </td>';
                                echo'  </tr>';
                                while($temp = mysql_fetch_array($res)){
                                        echo'  <tr>';
                                        echo'  <td>'.$count.'</td>';
                                        echo'  <td>'.$temp['NAMA_POSKO'];
                                        echo'<td><center><input id="buttonpost" type="submit" value="DETAIL" onclick="location.href=`viewdeleteupdateposko.html`;"></input></center></td>';
                                        echo'  </td>';
                                        echo'  </tr>';
                                        $count++;
                                  }
                                  
                                echo'  <!-- -->';
                                ?>
                               </table></center>
                             </td>
                            </tr>                            
                            <tr>
                            
                             <td><center><input id="buttonpost" type="button" value="ADD" onclick="location.href='createposko.php;"></input></center>
                             </td>
                            </tr>
                            
                        </div>
                </center>
            </section>
            <!--<footer>
                <h1>Bebas Banjir</h1>
            </footer>-->
        </div>
    </body>
</html>