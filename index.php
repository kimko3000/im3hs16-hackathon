<?php
  session_start();
  if (isset($_SESSION['id'])) {
      unset($_SESSION['id']);
  }
  session_destroy();

  require_once('system/data.php');
  require_once('system/security.php');

  ?>



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

    <header>
      <h1 class="logo">Tourismusbilder</h1>
      <a href="login.php"><button class="login-btn btn btn-lg btn-circle btn-primary"><span class="glyphicon glyphicon-user"></span></button></a>
</header>
<div id="map"></div>








<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<script async defer
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBKuRJfjZTU3bHDh8xdLsCGjY5zO7hdGXI&callback=initMap">
    </script>
<script src="assets/js/main.js"></script>
<script>
function initMap() {
  // Create a map object and specify the DOM element for display.
  var map = new google.maps.Map(document.getElementById('map'), {
    center: {lat: 46.65698709999999, lng: 9.578025700000012},
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
  </body>
</html>
