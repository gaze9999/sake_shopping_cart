<?php
  session_start();
  require_once('../db.inc.php');
  if(!isset($_SESSION['cart'])) $_SESSION['cart'] = [];

  $data = json_decode(file_get_contents('php://input'), true);
  // print_r($data);
  $_SESSION['cart'][] = [
    "itemId" => $data['iId'],
    "capId" => $data['cId'],
    "itemQty" => $data['iQty'],
    "itemPrice" => $data['iPrice']
    // "order" => 
];
  $result = urldecode(json_encode($_SESSION['cart']));
  echo $result;
?>