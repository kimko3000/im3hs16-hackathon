<?php

  /*
  * Create a random string
  * @author	XEWeb <>
  * @param $length the length of the string to create
  * @return $str the string
  * https://www.xeweb.net/2011/02/11/generate-a-random-string-a-z-0-9-in-php/
  */
  function randomString($length = 8) {
    $str = "";
    $characters = array_merge(range('A','Z'), range('a','z'), range('0','9'));
    $max = count($characters) - 1;
    for ($i = 0; $i < $length; $i++) {
    	$rand = mt_rand(0, $max);
    	$str .= $characters[$rand];
    }
    return $str;
  }



  // Bildupload
  function upload_image($image_file, $upload_path, $max_file_size = 500000){

    $uploadOk = true;

    // Filetype kontrollieren
  	if ( ($image_file['name']  != "")){
  		$filetype = $image_file['type'];
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
  		}
  		// Dateigrösse kontrollieren
  		$upload_filesize = $image_file["size"];
      if ( $upload_filesize > $max_file_size) {
        echo "Leider ist die Datei mit $upload_filesize KB zu gross. <br> Sie darf nicht grösser als $max_file_size sein. <br>";
        $uploadOk = false;
      }

      if ($uploadOk)
      {
        $file_name = time() . randomString() . "." . $file_extension;
        move_uploaded_file( $image_file['tmp_name'] , $upload_path . $file_name );
  	  } else {
        echo "Leider konnte die Datei nicht hochgeladen werden.";
        $file_name = "default";
      }
  	}

  	return $file_name;

  }
?>
