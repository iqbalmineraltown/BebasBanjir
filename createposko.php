<!DOCTYPE html>
<html lang="en" class="no-js"> 
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
        <title>BEBAS BANJIR</title>
        <link rel="stylesheet" type="text/css" href="css/demo.css" />
        <link rel="stylesheet" type="text/css" href="css/style.css" /><link rel="stylesheet" type="text/css" href="css/default.css" />
        <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false&libraries=places"></script>
        <script>
        function initialize() {

          var markers = [];
          var map = new google.maps.Map(document.getElementById('map-canvas'), {
            mapTypeId: google.maps.MapTypeId.ROADMAP
          });

          var defaultBounds = new google.maps.LatLngBounds(
              new google.maps.LatLng(-33.8902, 151.1759),
              new google.maps.LatLng(-33.8474, 151.2631));
          map.fitBounds(defaultBounds);

          // Create the search box and link it to the UI element.
          var input = /** @type {HTMLInputElement} */(
              document.getElementById('pac-input'));
          map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

          var searchBox = new google.maps.places.SearchBox(
            /** @type {HTMLInputElement} */(input));

          // [START region_getplaces]
          // Listen for the event fired when the user selects an item from the
          // pick list. Retrieve the matching places for that item.
          google.maps.event.addListener(searchBox, 'places_changed', function() {
            var places = searchBox.getPlaces();

            for (var i = 0, marker; marker = markers[i]; i++) {
              marker.setMap(null);
            }

            // For each place, get the icon, place name, and location.
            markers = [];
            var bounds = new google.maps.LatLngBounds();
            for (var i = 0, place; place = places[i]; i++) {
              var image = {
                url: place.icon,
                size: new google.maps.Size(71, 71),
                origin: new google.maps.Point(0, 0),
                anchor: new google.maps.Point(17, 34),
                scaledSize: new google.maps.Size(25, 25)
              };

              // Create a marker for each place.
              var marker = new google.maps.Marker({
                map: map,
                icon: image,
                title: place.name,
                position: place.geometry.location
              });

              markers.push(marker);

              bounds.extend(place.geometry.location);
    }

    map.fitBounds(bounds);
  });
  // [END region_getplaces]

  // Bias the SearchBox results towards places that are within the bounds of the
  // current map's viewport.
  google.maps.event.addListener(map, 'bounds_changed', function() {
    var bounds = map.getBounds();
    searchBox.setBounds(bounds);
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
                        <form name="insert" action="controller.php" method="post" autocomplete="on">
                        <input type="hidden" name="dispatch" value="createposko">
                          <table class="create" border="0">
                            <tr>
                              <td id="Judul" style="text-align:center; font-size:24px; margin-top:10px;"><b>CREATE POSKO</b></td>
                            </tr>
                            <tr>
                              <td><input type="text" name="nama" placeholder="Type Posko Name" value="<?php echo @$_SESSION['createposko.php']['nama']; ?>"></td>
                            </tr>
                            <tr>
                              <td><input type="text" name="latitude" placeholder="Type Latitude" value="<?php echo @$_SESSION['createposko.php']['latitude']; ?>"></td>
                            </tr>
                            <tr>
                              <td><input type="text" name="longitude" placeholder="Type Longitude" value="<?php echo @$_SESSION['createposko.php']['longitude']; ?>"></td>
                            </tr>
                            <tr>
                              <td>
                                <input id="pac-input" class="controls" type="text" placeholder="Search Box"></input><div id="map-canvas"></div></td>
                            </tr>
                            <tr>
                              <td>
                                <textarea class="textarea" rows="4" cols="25"></textarea></td>
                            </tr>                               
                            <tr>
                              <!--button-->
                              <td><center><input id="buttonpost" type="submit" value="POST" ></input></center>
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