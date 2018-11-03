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
          background-image: url("img/back5.png"); /* new tag */
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
        
        //----FIRST DISASTER -------------------------------------------------------------------------- --------------------------------------------------------------------------
        var image = 'img/earthquake.png';
        var location = {lat: 36.652658, lng: -121.797381};
        var contentString = 
            '<div id="content">'+
            '<div id="siteNotice">'+
            '</div>'+
            '<h1 id="firstHeading" class="firstHeading">6.8 Earthquake</h1>'+
            '<div id="bodyContent">'+
            '<p><b>DANGER:</b> There was an earthquake in the area, ' +
            'keep caution of buildings. '+
            '<br><br>'+
            '(updated on: November 3, 2018).</p>'+
            '</div>'+
            '</div>';
        
        // pop up window text box  
        var infowindow = new google.maps.InfoWindow({
          content: contentString
        });
        
        // actual market for disaster
        var marker = new google.maps.Marker({
          position: location,
          map: map,
          animation: google.maps.Animation.DROP,
          title: '6.8 Earthquake',
          icon: image
        });
      
        // for animation
        marker.addListener('click', function() {
          if (marker.getAnimation() !== null) {
            marker.setAnimation(null);
          } else {
            marker.setAnimation(google.maps.Animation.BOUNCE);
          }
        });
        
        // so textbox can pop open
        marker.addListener('click', function() {
          infowindow.open(map, marker);
        });
      
        
        marker.setMap(map);
  //---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
      
      }
      
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyClmnFTOdiYmpEXfFyIsqyHn6wtmSWdBxs&callback=initMap"
    async defer></script>
  </body>
</html>