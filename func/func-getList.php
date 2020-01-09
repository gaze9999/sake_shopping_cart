<?php
require_once('../db.inc.php');

$sql = "SELECT i.`sId`, i.`itemName`, i.`breId`, i.`vId`, i.`price`,
               b.`bId`, b.`breName`, b.`rId`,
               r.`rId`, r.`regionName`,
               v.`vId`, v.`varieties`, v.`vCatId`, v.`vCatag`, v.`vcId`,
               m.`imgId`, m.`imgName`, m.`bId`, m.`sId`
        FROM `sake_items` as i
              JOIN `sake_breweries` as b
              JOIN `sake_regions` as r
              JOIN `sake_varieties` as v
              JOIN `sake_img` as m
        ON i.`breId` = b.`bId`
              AND i.`vId` = v.`vId`
              AND b.`rId` = r.`rId`
              AND m.`sId` = i.`sId`
        GROUP BY i.`itemName`
        ORDER BY i.`sId` ";

$stmt = $pdo->prepare($sql);
$stmt->execute();

if($stmt->rowCount() > 0) {
  $arr = $stmt->fetchAll(PDO::FETCH_ASSOC);
};
  
$data = json_decode(file_get_contents('php://input'), true);
$rid = $data['rid'];
$cid = $data['cid'];
$vid = $data['vid'];

if($stmt->rowCount() > 0) {
  $arr = $stmt->fetchAll(PDO::FETCH_ASSOC);
  $result = urldecode(json_encode($arr));
  echo $result;
};