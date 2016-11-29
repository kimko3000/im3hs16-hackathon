<?php
session_start();
  if (!isset($_SESSION['user_id'])) {
      header('Location:login.php');
  } else {
      $user_id = $_SESSION['user_id'];
  }
  require_once 'system/data.php';
  require_once 'system/security.php';
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
    <div class="page-header">
      <h1 class="logo">Tourismusbilder</h1>
      <a href="home.php"><button class="plus-btn btn btn-lg btn-circle btn-primary"><span class="glyphicon glyphicon-home"></span></button></a>
      <a href="pictures.php"><button class="plus-btn btn btn-lg btn-circle btn-primary"><span class="glyphicon glyphicon-picture"></span></button></a>
      <a href="upload.php"><button class="plus-btn btn btn-lg btn-circle btn-primary"><span class="glyphicon glyphicon-camera"></span></button></a>
      <a href="create_poi.php"><button class="plus-btn btn btn-lg btn-circle btn-primary"><span class="glyphicon glyphicon-map-marker"></span></button></a>
      <a href="logout.php"><button class="plus-btn btn btn-lg btn-circle btn-primary"><span class="glyphicon glyphicon-eject"></span></button></a>
</div>
<div id="map"></div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<script>
function myMap() {
  var myCenter = new google.maps.LatLng(46.65698709999999,9.578025700000012);
  var mapCanvas = document.getElementById("map");
  var mapOptions = {center: myCenter, zoom: 10};
  var map = new google.maps.Map(mapCanvas, mapOptions);
  var marker = new google.maps.Marker({position:myCenter});
  marker.setMap(map);
  google.maps.event.addListener(marker,'click',function() {
    var infowindow = new google.maps.InfoWindow({
      content:"hier kommt ein Bild irgendwann"
    });
  infowindow.open(map,marker);
  });
}
</script>
<script src="https://maps.googleapis.com/maps/api/js?callback=myMap"></script>
<script src="assets/js/main.js"></script>

  </body>
</html>
