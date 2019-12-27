<?php
require_once('../db.inc.php');
$data = json_decode(file_get_contents('php://input'), true);

// print_r($data);

if (isset($data['vid'])) {
  $sql = "SELECT `vId`, `varieties`, `vCatId`, `vCatag`
          FROM `sake_varieties` 
          WHERE `vId` = ? OR `vCatId` = ? 
          ORDER BY `vId` ";
  $stmt = $pdo->prepare($sql);
  $arrParam = [$data['vid'], $data['vid']];
  $stmt->execute($arrParam);

  if($stmt->rowCount() > 0) {
    $arr = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $result = urldecode(json_encode($arr));
    echo $result;
  }
} else {
  $sql = "SELECT `vId`, `vCatId`, `vCatag`
          FROM `sake_varieties` 
          WHERE `vCatId` = 0
          ORDER BY `vId` ";
  $stmt = $pdo->prepare($sql);
  $stmt->execute();

  if($stmt->rowCount() > 0) {
    $arr = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $result = urldecode(json_encode($arr));
    echo $result;
  }
}
?>