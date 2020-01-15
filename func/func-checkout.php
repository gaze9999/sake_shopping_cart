<?php
session_start();
require_once('../db.inc.php');
$data = json_decode(file_get_contents('php://input'), true);
if(isset($_SESSION['order'])) unset($_SESSION['order']);
if(!isset($_SESSION['order'])) $_SESSION['order'] = [];

$_SESSION['order'] = [
  "orderData" => $data['order'][0]['orderData'],
  "receiverData" => $data['order'][1]['recData'],
  "shipData" => $data['order'][2]['shipData'],
  "saveAddr" => $data['order'][3]['saveAddr'],
  "itemData" => $data['order'][4]['itemData']
];

// $result = urldecode(json_encode($data));
// echo $result;
?>