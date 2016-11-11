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
  $sql = "INSERT INTO user (username, email, password) VALUES ('$username', '$email', '$password');";
  return get_result($sql);
}

function checkforexistance($username, $email){
  $sql = "SELECT * FROM user WHERE username = '".$username."' AND email = '".$email."';";
  return get_result($sql);
}

/* *********************************************************
/* Fotos
/* ****************************************************** */

function upload($title, $description, $file_name, $alt, $long, $datetime_shoot){
  $sql = "INSERT INTO picture (title, description, file_name, alt, long, datetime_shoot) VALUES ('$title', '$description', '$file_name', '$alt', '$long', '$datetime_shoot');";
}

function get_pictures(){
  $sql = "SELECT * FROM picture;";
  return get_result($sql);
}

/* *********************************************************
/* POI generieren
/* ****************************************************** */

function create($title, $description, $file_name, $alt, $long, $datetime_shoot){
  $sql = "INSERT INTO point_of_interest (title, description, alt, long) VALUES ('$title', '$description', '$file_name', '$alt', '$long');";
}

function get_poi(){
  $sql = "SELECT * FROM point_of_interest;";
  return get_result($sql);
}



?>
