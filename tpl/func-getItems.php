<?php
require_once('../db.inc.php');
global $forList;

// echo json_encode($_SERVER['input']);
// echo json_encode($_POST);
$data = json_decode(file_get_contents('php://input'), true);

// echo "<pre>";
// print_r($data);
// print_r($_POST);
// print_r($_SERVER);
// echo "</pre>";
// exit;

$sqlAll = "SELECT i.`sId`, i.`itemName`, i.`breId`, i.`vId`, i.`nihonshudo`, i.`capacity`, i.`price`, i.`discount`, b.`bId`, b.`breName`, b.`rId`, b.`pId`, p.`pId`, p.`prefName`, p.`rId`, r.`rId`, r.`regionName`, v.`vId`, v.`varieties`, v.`vCatag`, v.`alchoholAdd`, v.`seimaibuai` 
           FROM `sake_items` as i JOIN `sake_breweries` as b JOIN `sake_prefectures` as p JOIN `sake_regions` as r JOIN `sake_varieties` as v 
           ON r.`rId` = p.`rId` AND p.`pId` = b.`pId` AND b.`bId` = i.`breId` AND i.`vId` = v.`vId` ";

$sql = "SELECT i.`sId`, i.`itemName`, i.`breId`, b.`bId`, b.`breName`, b.`rId`, r.`rId`, r.`regionName` 
        FROM `sake_items` as i JOIN `sake_breweries` as b JOIN `sake_regions` as r
        WHERE r.`rId` = ? AND b.`rId` = ? AND b.`bId` = i.`breId`
        GROUP BY i.`itemName` 
        ORDER BY i.`sId` ";

$arrParam = [$data['cid'], $data['cid']];
$stmt = $pdo->prepare($sql);
$stmt->execute($arrParam);

if($stmt->rowCount() > 0) {
  $arr = $stmt->fetchAll(PDO::FETCH_ASSOC);
  // echo $stmt->rowCount();
  // for ($i=0;$i<$stmt->rowCount();$i++) {
    // echo "<pre>";
    // print_r($arr[$i]);
    // echo "</pre>";
  // }
  $result = urldecode(json_encode($arr));
  
  echo $result;
}
?>