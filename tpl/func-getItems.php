<?php
require_once('../db.inc.php');

$data = json_decode(file_get_contents('php://input'), true);

$sql = "SELECT i.`sId`, i.`itemName`, i.`breId`, b.`bId`, b.`breName`, b.`rId`, r.`rId`, r.`regionName` ,  b.`pId`, p.`pId`, p.`prefName` 
        FROM `sake_items` as i JOIN `sake_breweries` as b JOIN `sake_regions` as r JOIN `sake_prefectures` as p ";

if ($data['cid'] > 0) {
  $sql.= "WHERE r.`rId` = ? AND b.`rId` = ? AND b.`bId` = i.`breId` 
          GROUP BY i.`itemName` 
          ORDER BY i.`sId` ";

  $arrParam = [$data['cid'], $data['cid']];
  $stmt = $pdo->prepare($sql);
  $stmt->execute($arrParam);

  if($stmt->rowCount() > 0) {
    $arr = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $result = urldecode(json_encode($arr));
    echo $result;
  } else {
    echo "";
  }
} else {
  $sql.= "WHERE r.`rId` = b.`rId` AND b.`bId` = i.`breId` AND b.`pId` = p.`pId` 
          GROUP BY i.`itemName` 
          ORDER BY i.`sId` ";

  $stmt = $pdo->prepare($sql);
  $stmt->execute();

  if($stmt->rowCount() > 0) {
    $arr = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $result = urldecode(json_encode($arr));
    echo $result;
  } else {
    echo "";
  }
}
?>