<?php
include 'functions.php';

// include_once 'request.php';
// include_once 'router.php';
// $router = new Router(new Request);
// $router->get('/', function() {
//   return <<<HTML
//   <h1>Hello world</h1>
// HTML;
// });
// $router->get('/profile', function($request) {
//   return <<<HTML
//   <h1>Profile</h1>
// HTML;
// });
// $router->post('/data', function($request) {
//   return json_encode($request->getBody());
// });
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
        
        
      
    </style>
  </head>
  <body>
    <body>
    <div id="map"></div>
    <?php
        $test = getIncident();
        // foreach($test as $v1) {
        //   echo "<br>";
        //   foreach($v1 as $v2) {
        //     echo $v2['latitude'];
        //     echo " ";
        //     echo $v2['longitude'];
        //     echo " ";
        //     echo $v2['disasterType'];
        //   }
        // }
        // function displayLat() {
        //   echo "36.653822";
        // }
        echo getSize();
    ?>
    <script type="text/javascript">
      var map;
      function initMap() {
        var myLatLng = {lat: 36.653822, lng: -121.797381};
        
        map = new google.maps.Map(document.getElementById('map'), {
          center: myLatLng,
          zoom: 12
        });

        
        //----FIRST DISASTER -------------------------------------------------------------------------- --------------------------------------------------------------------------
        //var image = 'img/earthquake.png';
        var location = JSON.parse('<?php echo json_encode($test); ?>');
        //document.write(location);
        //var location = {lat: 36.653822, lng: -121.797381};
        // var contentString = 
        //     '<div id="content">'+
        //     '<div id="siteNotice">'+
        //     '</div>'+
        //     '<h1 id="firstHeading" class="firstHeading">Earthquake</h1>'+
        //     '<div id="bodyContent">'+
        //     '<p><b>DANGER:</b> There was an earthquake in the area, ' +
        //     'keep caution of buildings. '+
        //     '<br><br>'+
        //     '(updated on: November 3, 2018).</p>'+
        //     '</div>'+
        //     '</div>';
        
        // pop up window text box
        // var infowindow = new google.maps.InfoWindow({
        //   content: contentString
        // });
        
        // actual marker for disaster
        //console.log(location[1][0]);
        //console.log(Number(location[1][0]['latitude']));
        var infowindow = new google.maps.InfoWindow();
        var marker, i;
        var size = <?php echo getSize(); ?>;
        console.log(size);
        for(i = 1; i <= size; i++) {
            marker = new google.maps.Marker({
              position: {lat: Number(location[i][0]['latitude']), lng: Number(location[i][0]['longitude'])},
              map: map,
              animation: google.maps.Animation.DROP,
              title: location[i][0]['disasterType'],
              icon: 'img/'+location[i][0]['disasterType']+'.png'
            });
          
          google.maps.event.addListener(marker, 'click', (function(marker, i) {
            return function() {
              if (marker.getAnimation() !== null) {
                marker.setAnimation(null);
              } else {
                 marker.setAnimation(google.maps.Animation.BOUNCE);
              }
              infowindow.setContent(location[i][0]['disasterType']);
              infowindow.open(map, marker);
            }
          })(marker, i));
        
        }
      
        // for animation
        // marker.addListener('click', function() {
        //   if (marker.getAnimation() !== null) {
        //     marker.setAnimation(null);
        //   } else {
        //     marker.setAnimation(google.maps.Animation.BOUNCE);
        //   }
        // });
        
        // so textbox can pop open
        // marker.addListener('click', function() {
        //   infowindow.open(map, marker);
        // });
      
        
        marker.setMap(map);
  //---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
      }
      
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyClmnFTOdiYmpEXfFyIsqyHn6wtmSWdBxs&callback=initMap"
    async defer></script>
  </body>
  </body>
</html>