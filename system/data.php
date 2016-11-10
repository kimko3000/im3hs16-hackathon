<?php

  function get_db_connection(){
  $db = mysqli_connect('localhost', '572825_4_1', 'oV=5WjzxYu79', '572825_4_1')
  or die('Fehler beim Verbinden mit dem MySQL-Server.');
  mysqli_set_charset($db, 'utf8');
  return $db;
}

function get_result($sql){
  $db = get_db_connection();
  // echo $sql;
  $result = mysqli_query($db,$sql);
  mysqli_close($db);
  return $result;
}



?>
