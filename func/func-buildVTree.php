<?php
require_once('../db.inc.php');

$sql = "SELECT `vId`, `varieties`, `vCatId`, `vCatag`
        FROM `sake_varieties` 
        ORDER BY `vId` ";
$stmt = $pdo->prepare($sql);
$stmt->execute();

$sql2 = "SELECT `vId`, `vCatId`, `vCatag`
        FROM `sake_varieties` 
        GROUP BY `vCatId` 
        ORDER BY `vId` ";
$stmt2 = $pdo->prepare($sql2);
$stmt2->execute();

if($stmt->rowCount() > 0) {
  $arr  = $stmt->fetchAll(PDO::FETCH_ASSOC);
  $arr2 = $stmt2->fetchAll(PDO::FETCH_ASSOC);
  for ($i = )

  echo "<pre>";
  print_r($arr);
  echo "</pre>";
  echo "<pre>";
  print_r($arr2);
  echo "</pre>";

  // for ($i = 0; $i < count($arr); $i++) {
  //   // echo "<dt>
  //   //         <button class='btn tree_btn' data-cId='{$arr[$i]['vId']}'>{$arr[$i]['vCatag']}</button>
  //   //       </dt>";
    $result = urldecode(json_encode($arr));
    $result2 = urldecode(json_encode($arr2));
    echo $result;
    echo $result2;
  // }
}




?>