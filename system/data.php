<?php

  function get_db_connection(){
  $db = mysqli_connect('localhost', '572825_4_1', 'oV=5WjzxYu79', '572825_4_1')
  or die('Fehler beim Verbinden mit dem MySQL-Server.');
  mysqli_set_charset($db, 'utf8');
  return $db;
}

function get_result($sql){
  $db = get_db_connection();
   echo $sql;
  $result = mysqli_query($db,$sql);
  mysqli_close($db);
  return $result;
}


/* *********************************************************
/* Login
/* ****************************************************** */

function login($username , $password){
  $sql = "SELECT * FROM user WHERE username = '".$username."' AND password = '".$password."';";
  return get_result($sql);
}

/* *********************************************************
/* Registrieren
/* ****************************************************** */

function register($username, $email , $password){
  $sql = "INSERT INTO user (`username`, `email`, `password`) VALUES ('$username', '$email', '$password');";
  return get_result($sql);
}

function checkforexistance($username, $email){
  $sql = "SELECT * FROM user WHERE username = '".$username."' AND email = '".$email."';";
  return get_result($sql);
}

/* *********************************************************
/* Fotos
/* ****************************************************** */

function upload($title, $description, $alt, $long, $file_name){
  $sql = "INSERT INTO picture (`title`, `description`, `alt`, `long`, `file_name`) VALUES ('$title', '$description', '$alt', '$long', '$file_name');";
  return get_result($sql);
}

function get_pictures(){
  $sql = "SELECT * FROM picture;";
  return get_result($sql);
}

function update_picture($picture_id, $title, $description, $alt, $long){
  $sql_ok = false;
  $sql = "UPDATE picture SET ";
  if($title != ""){
    $sql .= "title = '$title', ";
    $sql_ok = true;
  }
  if($description != ""){
    $sql .= "description = '$description', ";
    $sql_ok = true;
  }
  if($alt != ""){
    $sql .= "alt = '$alt', ";
    $sql_ok = true;
  }
  if($long != ""){
    $sql .= "long = '$long', ";
    $sql_ok = true;
  }
  $sql = substr_replace($sql, ' ', -2, 1);
  $sql .= " WHERE picture_id = $picture_id ;";

  if($sql_ok){
    return get_result($sql);
  }else{
    return false;
  }
}

/* *********************************************************
/* POI generieren
/* ****************************************************** */

function create_poi($title, $description, $alt, $long){
  $sql = "INSERT INTO point_of_interest (`title`, `description`, `alt`, `long`) VALUES ('$title', '$description', '$alt', '$long');";
  return get_result($sql);
}

function get_poi(){
  $sql = "SELECT * FROM point_of_interest;";
  return get_result($sql);
}



?>
