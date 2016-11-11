
<?php

session_start();
if(isset($_SESSION['user_id']))
unset($_SESSION['user_id']);
session_destroy();


require_once("system/data.php");
require_once("system/security.php");

// für Spätere Verwendung initialisieren wir die Variablen $error, $error_msg, $success, $success_msg
$error = false;
$error_msg = "";
$success = false;
$success_msg = "";


if(isset($_POST['upload-submit'])){
  // Kontrolle mit isset, ob email und password ausgefüllt wurde
  if(!empty($_POST['title']) && !empty($_POST['description']) && !empty($_POST['alt']) && !empty($_POST['long'])){
    $title = filter_data($_POST['title']);
    $description = filter_data($_POST['description']);
    $alt = filter_data($_POST['alt']);
    $long = filter_data($_POST['long']);
        if($result){
          $success = true;
          $success_msg = "Der neue point of interest wurde generiert.</br>";
        }
        else{
          $error = true;
          $error_msg .= "Es gibt ein Problem mit der Datenbankverbindung.</br>";
        }
  }else{
    $error = true;
    $error_msg .= "Bitte füllen Sie alle Felder aus.</br>";
  }
}



 ?>



<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="author" content="Kim Schläpfer, Luca Toneatti, Fabio Follador">

    <title>Tourismusbilder</title>

    <link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="assets/css/main.css" type="text/css">
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">

  </head>
  <body>

    <!-- http://bootsnipp.com/snippets/kE9rg -->
    <div class="container">
       <div class="row">
        <div class="col-md-6 col-md-offset-3">
          <div class="panel panel-login">
            <div class="panel-body">
              <div class="row">
                <div class="col-lg-12">
                  <form id="upload-form" action="#" method="post" role="form" style="display: block;">
                    <h2>Create new Point of interest</h2>
                      <div class="form-group">
                        <input type="text" name="title" id="title" tabindex="1" class="form-control" placeholder="title of the point of interest" value="">
                      </div>
                      <div class="form-group">
                        <input type="text" name="description" id="description" tabindex="2" class="form-control" placeholder="description of the point of interest">
                      </div>
                      <div class="form-group">
                        <input type="text" name="alt" id="alt" tabindex="3" class="form-control" placeholder="enter latitude">
                      </div>
                      <div class="form-group">
                        <input type="text" name="long" id="long" tabindex="4" class="form-control" placeholder="enter longitude">
                      </div>
                      <div class="col-xs-6 form-group pull-right">
                            <input type="submit" name="upload-submit" id="upload-submit" tabindex="4" class="form-control btn btn-login" value="Create">
                      </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>


    <?php
      // Gibt es einen Erfolg zu vermelden?
      if($success == true){
    ?>
        <div class="alert alert-success" role="alert"><?php echo $success_msg; ?></div>
    <?php
      }   // schliessen von if($success == true)
      // Gibt es einen Fehler?
      if($error == true){
    ?>
        <div class="alert alert-danger" role="alert"><?php echo $error_msg; ?></div>
    <?php
      }   // schliessen von if($success == true)
    ?>
      </div><!-- /container -->
















<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<script src="assets/js/main.js"></script>
  </body>
</html>
