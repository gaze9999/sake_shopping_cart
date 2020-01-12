<?php
  session_start();
  require_once('../db.inc.php');

  $data = json_decode(file_get_contents('php://input'), true);

  print_r($data);

  // $result = urldecode(json_encode($arr));
  // echo $result;
?>