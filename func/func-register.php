<?php
session_start();
require_once('../db.inc.php');

$data = json_decode(file_get_contents('php://input'), true);
$uId = $data['usrId'];
$uPwd = $data['usrPwd'];
$uName = $data['usrName'];
$uMail = $data['usrMail'];
$uGen = $data['usrGen'];
$status;
$output['status'] = array();

checkUsrName();

function checkUsrName() {  
  global $uId, $pdo, $status, $output;
  $sql = "SELECT `username`
          FROM `users`
          WHERE `username` = ? ";
  $arrParam = [ $uId ];      
  $stmt = $pdo->prepare($sql);
  $stmt->execute($arrParam);
  if($stmt->rowCount() > 0) {
    $arr = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $status = "2";
    array_push($output['status'], $status);
    $result = urldecode(json_encode($output));
    echo $result;
  } else {
    insertData();
  }
}

function insertData() {
  global $uId, $uPwd, $uName, $uMail, $uGen;
  global $pdo, $status, $output;
  $sql = "INSERT INTO `users`(`username`, `pwd`, `name`, `gender`, `email`)
  VALUES ( ?, ?, ?, ?, ? ) ";
  $arrParam = [
  $uId,
  sha1($uPwd),
  $uName,
  $uGen,
  $uMail
  ];
  $stmt = $pdo->prepare($sql);
  $stmt->execute($arrParam);
  if($stmt->rowCount() > 0) {
  $arr = $stmt->fetchAll(PDO::FETCH_ASSOC);
  $status = "1";
  array_push($output['status'], $status);
  $result = urldecode(json_encode($output));
  echo $result;
  }
}
?>