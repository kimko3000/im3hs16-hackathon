<?php


  // für Spätere Verwendung initialisieren wir die Variablen $error, $error_msg, $success, $success_msg
  $error = false;
  $error_msg = "";
  $success = false;
  $success_msg = "";

  if(isset($_POST['upload-submit'])){
    if(!empty($_POST['title']) && !empty($_POST['description']) && !empty($_POST['alt']) && !empty($_POST['long'])){
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
          if ( $upload_filesize >= $max_file_size || $_FILES["img"]["error"]) {
              echo "Leider ist die Datei mit $upload_filesize KB zu gross. <br> Sie darf nicht grösser als $max_file_size sein. ";
              $uploadOk = false;
          }

          if (!$uploadOk) {
              echo "Leider konnte die Datei nicht hochgeladen werden.";
          } else {
              $file_name = time() . "." . $file_extension;
              move_uploaded_file($_FILES['img']['tmp_name'], $upload_path . $file_name );
              $result = upload($title, $description, $alt, $long, $file_name);
          }
      }
    }
    else{
      $error = true;
      $error_msg .= "Bitte füllen Sie alle Felder aus.</br>";
    }
  }
?>
