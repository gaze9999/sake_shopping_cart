<?php
require_once('../db.inc.php');

$data = json_decode(file_get_contents('php://input'), true);

$sql = "SELECT i.`sId`, i.`itemName`, i.`breId`, i.`vId`, b.`bId`, b.`breName`, b.`rId`, r.`rId`, r.`regionName`, b.`pId`, p.`pId`, p.`prefName`, v.`vId`, v.`varieties`, v.`vCatId`, v.`vCatag` 
        FROM `sake_items` as i JOIN `sake_breweries` as b JOIN `sake_regions` as r JOIN `sake_prefectures` as p JOIN `sake_varieties` as v 
        ON i.`breId` = b.`bId` AND i.`vId` = v.`vId` AND b.`rId` = r.`rId` AND p.`pId` = b.`pId` ";

// if ($data['rid'] > 0) {
//   if ($data['cid'] > 0) {

//   }
// }

// try try













if ($data['cid'] > 0) {
  $sql.= "WHERE v.`vId` = ? OR v.`vCatId` = ? 
          GROUP BY i.`itemName` 
          ORDER BY i.`sId` ";
  $arrParam = [$data['cid'], $data['cid']];
  $stmt = $pdo->prepare($sql);
  $stmt->execute($arrParam);

  if($stmt->rowCount() > 0) {
    $arr = $stmt->fetchAll(PDO::FETCH_ASSOC);
    if ($data['vid'] > 0) {
      $sql = "SELECT i.`sId`, i.`itemName`, i.`breId`, i.`vId`, b.`bId`, b.`breName`, b.`rId`, r.`rId`, r.`regionName`, b.`pId`, p.`pId`, p.`prefName`, v.`vId`, v.`varieties`, v.`vCatId`, v.`vCatag` 
              FROM `sake_items` as i JOIN `sake_breweries` as b JOIN `sake_regions` as r JOIN `sake_prefectures` as p JOIN `sake_varieties` as v 
              ON i.`breId` = b.`bId` AND i.`vId` = v.`vId` AND b.`rId` = r.`rId` AND p.`pId` = b.`pId` 
              WHERE i.`vId` = ? AND v.`vId` = ? 
              GROUP BY i.`itemName` 
              ORDER BY i.`sId` ";
      $arrParam = [$data['vid'], $data['vid']];
      $stmt = $pdo->prepare($sql);
      $stmt->execute($arrParam);
      $arr = $stmt->fetchAll(PDO::FETCH_ASSOC);
      }
    }
    $result = urldecode(json_encode($arr));
    echo $result;

} else {
  $sql.= "GROUP BY i.`itemName` 
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