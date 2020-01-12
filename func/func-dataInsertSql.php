<?php
  session_start();
  require_once('../db.inc.php');

  $data = json_decode(file_get_contents('php://input'), true);
  $cId = $data['capIds'];
  $qty = $data['qtys'];
  $orderArr = array();
  $arrOId = array();
  $orderId = 0;

  // $orderArr['orderId'] = array();
  // $orderArr['capId'] = array();
  // $orderArr['qtys'] = array();

  $sqlGetOrderId = "SELECT `orderId`
                    FROM `sake_cart`
                    ORDER BY `orderId` DESC
                    LIMIT 1 ";
  $stmtOId = $pdo->prepare($sqlGetOrderId);
  $stmtOId->execute();
  if($stmtOId->rowCount() > 0) {
    $arrOId = $stmtOId->fetchAll(PDO::FETCH_ASSOC);
    $orderId = $arrOId[0]['orderId']+1;
  }

  foreach ($cId as $k => $v) {
    $orderArr[$k]['orderId'] = array();
    $orderArr[$k]['capId'] = array();
    array_push($orderArr[$k]['orderId'], $orderId);
    array_push($orderArr[$k]['capId'], $v);
  }

  foreach ($qty as $k => $v) {
    $orderArr[$k]['qtys'] = array();
    array_push($orderArr[$k]['qtys'], $v);
  }

  $sql = "INSERT INTO `sake_cart`
                 (`orderId`, `orderUserId`, `capId`, `qty`)
          VALUES (?, ?, ?, ? ) ";

  for ($i=0; $i < count($orderArr); $i++) {
    global $orderArr;
    $sqlParam = [
      $orderArr[$i]['orderId'][0],
      1,
      $orderArr[$i]['capId'][0],
      $orderArr[$i]['qtys'][0]
    ];

    $stmt = $pdo->prepare($sql);
    $stmt->execute($sqlParam);

    if ($stmt->rowCount() > 0) {
      $arr = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
  }  
  $result = urldecode(json_encode($orderArr));
  echo $result;
?>