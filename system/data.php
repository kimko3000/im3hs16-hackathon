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
  $sql = "INSERT INTO `picture`(`title`, `description`, `file_name`, `alt`, `long`,`datetime_shoot`) VALUES ('$title', '$description', '$file_name', '$alt', '$long', '$datetime_shoot');";
}

function get_pictures(){
  $sql = "SELECT * FROM picture;";
  return get_result($sql);
}

/* *********************************************************
/* Like Funktion
/* ****************************************************** */

$strSQL_Result  = mysqli_query($connection,"SELECT `like_id` FROM `like` WHERE user_id=1");
$row            = mysqli_fetch_array($strSQL_Result);

$like       = $row['like_id'];
if($_POST)
{
    if(isset($_COOKIE["572825_4_1"]))
    {
        echo "-1";
        exit;
    }
    setcookie("572825_4_1", "liked", time()+3600*24, "/like-unlike-in-php-mysql/", ".demo.phpgang.com");
    if(mysqli_real_escape_string($connection,$_POST['op']) == 'like')
    {
        $update = "`like`=`like_id`+1";
    }

    mysqli_query($connection,"UPDATE `like` SET $update WHERE `id`=1");
    echo 1;
    exit;
}

/* *********************************************************
/* Fotos
/* ****************************************************** */


?>
