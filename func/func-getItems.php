<?php
require_once('../db.inc.php');

$data = json_decode(file_get_contents('php://input'), true);

// echo "<pre>";
// print_r($data);
// echo "</pre>";

$sql = "SELECT i.`sId`, i.`itemName`, i.`breId`, i.`vId`, b.`bId`, b.`breName`, b.`rId`, r.`rId`, r.`regionName` ,  b.`pId`, p.`pId`, p.`prefName`, v.`vId`, v.`varieties`, v.`vCatag`
        FROM `sake_items` as i JOIN `sake_breweries` as b JOIN `sake_regions` as r JOIN `sake_prefectures` as p JOIN `sake_varieties` as v ";

if ($data['vid'] > 0) {
  $sql.= "WHERE r.`rId` = b.`rId` AND b.`bId` = i.`breId` AND i.`vId` = ? AND v.`vId` = ? 
          GROUP BY i.`itemName` 
          ORDER BY i.`sId` ";

  $arrParam = [$data['vid'], $data['vid']];
  $stmt = $pdo->prepare($sql);
  $stmt->execute($arrParam);

  if($stmt->rowCount() > 0) {
    $arr = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $result = urldecode(json_encode($arr));
    echo $result;
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
  }
}
?>