<?php
session_start();
require_once('../db.inc.php');

$data = json_decode(file_get_contents('php://input'), true);
$uId = $data['userId'];
$pwd = $data['userPwd'];
$status = array();

if( !empty($uId) || !empty($pwd) ) {
  $sql = "SELECT `id`, `username`, `pwd`, `name`
          FROM `users`
          WHERE `username` = ?
          AND `pwd` = ? ";

  $arrParam = [
    $uId,
    sha1($pwd)
  ];

  $stmt = $pdo->prepare($sql);
  $stmt->execute($arrParam);

  if($stmt->rowCount() > 0) {
    $arr = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $_SESSION['userinfo']['status'] = 1;
    $_SESSION['userinfo']['userid'] = $arr[0]['username'];
    $_SESSION['userinfo']['username'] = $arr[0]['username'];
    $_SESSION['userinfo']['name'] = $arr[0]['name'];
    $_SESSION['userinfo']['identity'] = 'user';

    $status = 1;
    echo $status;
  } else {
    $status = 2;
    echo $status;
  }
} else {
  $status = 0;
  echo $status;
}
?>