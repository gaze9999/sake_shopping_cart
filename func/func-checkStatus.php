<?php
session_start();
require_once('../db.inc.php');

// $data = json_decode(file_get_contents('php://input'), true);
// $uId = $data['userId'];
// $pwd = $data['userPwd'];
// $status = array();

// print_r($_SESSION['userinfo']);
// exit;

$output = array();
if(!isset($_SESSION['userinfo'])) $_SESSION['userinfo'] = [];

if (isset($_SESSION['userinfo']['userid'])) {
  $sql = "SELECT `id`, `username`, `pwd`, `name`
          FROM `users`
          WHERE `username` = ? ";

  $arrParam = [ $_SESSION['userinfo']['userid'] ];

  $stmt = $pdo->prepare($sql);
  $stmt->execute($arrParam);

  if($stmt->rowCount() > 0) {
    $status = $_SESSION['userinfo']['status'];
    array_push($output, $status);    
  }
  
} else {
  $status = 2;
  array_push($output, $status);
}

$result = urldecode(json_encode($output));
echo $result;
?>