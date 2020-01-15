<?php
session_start();
require_once('../db.inc.php');
$data = json_decode(file_get_contents('php://input'), true);
if(isset($_SESSION['card'])) unset($_SESSION['card']);
if(!isset($_SESSION['card'])) $_SESSION['card'] = [];

$_SESSION['card'] = [
  "cardType" => $data['cardData'][0]['cardType'],
  "cardName" => $data['cardData'][1]['cardName'],
  "cardNum" => $data['cardData'][2]['cardNum'],
  "cardExp" => $data['cardData'][3]['cardExp'],
  "cardCvv" => $data['cardData'][4]['cardCvv'],
  "saveCard" => $data['cardData'][5]['savCard']
];

// $result = urldecode(json_encode($_SESSION));
// echo $result;
?>