



<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="author" content="Kim Schläpfer, Luca Toneatti, Fabio Follador">

    <title>Tourismusbilder</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/main.css" type="text/css">
  </head>
  <body>
<button id="plus-btn" class="btn btn-lg btn-primary"><span class="glyphicon glyphicon-plus"></span></button>
<div id="map"></div>







<script>
function initMap() {
  // Create a map object and specify the DOM element for display.
  var map = new google.maps.Map(document.getElementById('map'), {
    center: {lat: 46.731, lng: 9.424},
    zoom: 10,
    streetViewControl: false,
    mapTypeControl: true,
    zoomControl: true,
    zoomControlOptions: {
        position: google.maps.ControlPosition.RIGHT_BOTTOM
    },

    mapTypeControlOptions: {
        style: google.maps.MapTypeControlStyle.DROPDOWN_MENU,
        position: google.maps.ControlPosition.LEFT_BOTTOM
}


  });
}
</script>
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/tether.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script async defer
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBKuRJfjZTU3bHDh8xdLsCGjY5zO7hdGXI&callback=initMap">
    </script>
<script src="assets/js/main.js"></script>

  </body>
</html>
