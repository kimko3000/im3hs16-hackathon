
<?php

session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location:login.php');
} else {
    $user_id = $_SESSION['user_id'];
}

require_once("system/data.php");
require_once("system/security.php");
require_once("system/upload.php");

// für Spätere Verwendung initialisieren wir die Variablen $error, $error_msg, $success, $success_msg
$error = false;
$error_msg = "";
$success = false;
$success_msg = "";

if(isset($_POST['upload-submit'])){
    $title = filter_data($_POST['title']);
    $description = filter_data($_POST['description']);
    $alt = filter_data($_POST['alt']);
    $long = filter_data($_POST['long']);
    $file_name = "";
    // Bildupload
    $uploadOk = true;
    $upload_path = "img/";   // Zielverzeichnis für hochzuladene Datei
    $max_file_size = 500000;      // max. Dateigrösse in Byte

    // Filetype kontrollieren
    if ( ($_FILES['img']['name']  != "")){
        $filetype = $_FILES['img']['type'];
        switch($filetype){
            case "image/jpeg":
                $file_extension = "jpg";
                break;
            case "image/gif":
                $file_extension = "gif";
                break;
            case "image/png":
                $file_extension = "png";
                break;
            default:
              $uploadOk = false;
        }

        // Dateigrösse kontrollieren
        $upload_filesize = $_FILES["img"]["size"];
        if ( $upload_filesize >= $max_file_size) {
            echo "Leider ist die Datei mit $upload_filesize KB zu gross. <br> Sie darf nicht grösser als $max_file_size sein. ";
            $uploadOk = false;
        }

        if (!$uploadOk) {
            echo "Leider konnte die Datei nicht hochgeladen werden.";
        } else {
            $file_name = time() . "." . $file_extension;
            move_uploaded_file($_FILES['img']['tmp_name'], $upload_path . $file_name );
        }
    }

    $result = upload($title, $description, $alt, $long, $uploadOk);
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
    </div>


    <!-- http://bootsnipp.com/snippets/kE9rg -->
    <div class="container">
       <div class="row">
        <div class="col-md-6 col-md-offset-3">
          <div class="panel panel-login">
            <div class="panel-body">
              <div class="row">
                <div class="col-lg-12">
                  <form enctype="multipart/form-data" action="<?PHP echo $_SERVER['PHP_SELF'] ?>" method="post">
                    <h2>UPLOAD PICTURE</h2>
                      <div class="form-group">
                        <input type="text" name="title" id="title" tabindex="1" class="form-control" placeholder="title of your picture" value="">
                      </div>
                      <div class="form-group">
                        <input type="text" name="description" id="description" tabindex="2" class="form-control" placeholder="description of your picture">
                      </div>
                      <div class="form-group">
                        <input type="text" name="alt" id="alt" tabindex="3" class="form-control" placeholder="enter latitude">
                      </div>
                      <div class="form-group">
                        <input type="text" name="long" id="long" tabindex="4" class="form-control" placeholder="enter longitude">
                      </div>
                      <div class="form-group">
                        <div class="col-sm-5">
                          <input type="file" name="img" id="img">
                        </div>
                      </div>
                      <div class="col-xs-6 form-group pull-right">
                            <input type="submit" name="upload-submit" id="upload-submit" tabindex="4" class="form-control btn btn-login" value="Upload">
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
