<?php
session_start();
require_once('../db.inc.php');

// echo "<pre>";
// print_r($_SESSION['cart']);
// echo "</pre>";
// exit;

$sql ="SELECT i.`sId`, i.`itemName`, i.`breId`,
              i.`vId`, i.`price`, i.`capacity`,
              b.`bId`, b.`breName`,
              m.`imgId`, m.`imgName`
        FROM `sake_items` as i
              JOIN `sake_breweries` as b
              JOIN `sake_img` as m
        ON i.`breId` = b.`bId`
        WHERE i.`sId` = ?
        GROUP BY i.`itemName` ";

$arr = array();

for ($i = 0; $i < count($_SESSION['cart']); $i++) {
  $itemId['itemId']   = $_SESSION['cart'][$i]['itemId'];
  $capId              = $_SESSION['cart'][$i]['capId'];
  $itemQty['itemQty'] = $_SESSION['cart'][$i]['itemQty'];
  $itemPrice          = $_SESSION['cart'][$i]['itemPrice'];

  $arrParam = [$capId];
  $stmt = $pdo->prepare($sql);
  $stmt->execute($arrParam);
  if($stmt->rowCount() > 0) {
    $arrSid = $stmt->fetchAll(PDO::FETCH_ASSOC);
    array_push($arr, $arrSid);
    array_push($arr[$i], $itemQty);
    array_push($arr[$i], $itemId);
  }
}
$result = urldecode(json_encode($arr));
echo $result;
?>