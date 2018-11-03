<?php
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Simple Map</title>
    <link rel='stylesheet' href='css/styles.css' type='text/css' />
    <meta name="viewport" content="initial-scale=1.0">
    <meta charset="utf-8">
    <style>
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
        #map {
            height:70%;
            width:100%;
        }
        /* Optional: Makes the sample page fill the window. */
        html, body {
            height: 100%;
            padding: 2%;
        }
        #logo {
          background-color: #dce1ef;
          text-align: center;
        }
        body {
          background-image: url("img/logoback.jpg"); /* new tag */
          background-size: 100%;
          background-repeat: no-repeat;
        }
        
        #logo {
          background-image: url("img/back2.png"); /* new tag */
          background-size: 100%;
          background-repeat: no-repeat;
          border-radius: 20px;
        }
        
        img {
          width: 20%;
        }
        
      
    </style>
  </head>
  <body>
    <br>
    <div id="logo"> <a href="https://fontmeme.com/fonts/vtks-desgaste-font/"><img src="https://fontmeme.com/permalink/181103/ca0dd70f5648766571c81587901b3e9a.png" alt="vtks-desgaste-font" border="0"></a> </div>
    <br>
    <div id="map"></div>
    <script>
      var map;
      function initMap() {
        map = new google.maps.Map(document.getElementById('map'), {
          center: {lat: 36.652658, lng: -121.797381},
          zoom: 12
        });
      }
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyClmnFTOdiYmpEXfFyIsqyHn6wtmSWdBxs&callback=initMap"
    async defer></script>
  </body>
</html>