<?php
require_once('../db.inc.php');

$sql = "SELECT i.`sId`, i.`itemName`, i.`breId`, i.`vId`, i.`price`,
               CAST(i.`capacity` as decimal(18, 0)) as `cap`,
               b.`bId`, b.`breName`, b.`rId`, b.`pId`,
               r.`rId`, r.`regionName`,
               p.`pId`, p.`prefName`,
               v.`vId`, v.`varieties`, v.`vCatId`, v.`vCatag`, v.`vcId`
        FROM `sake_items` as i
              JOIN `sake_breweries` as b
              JOIN `sake_regions` as r
              JOIN `sake_prefectures` as p
              JOIN `sake_varieties` as v
        ON i.`breId` = b.`bId`
              AND i.`vId` = v.`vId`
              AND b.`rId` = r.`rId`
              AND p.`pId` = b.`pId`
        GROUP BY i.`itemName`
        ORDER BY i.`sId` ";

$imgSql ="SELECT i.`sId`,
                 m.`imgId`, m.`imgName`, m.`sId`
          FROM `sake_items` as i
          JOIN `sake_img` as m
          ON m.`sId` = i.`sId`
          GROUP BY m.`sId`
          ORDER BY m.`imgId` ";

$stmt = $pdo->prepare($sql);
$stmt->execute();
$stmtImg = $pdo->prepare($imgSql);
$stmtImg->execute();

if($stmt->rowCount() > 0) {
  $arr = array();
  $items = array();
  $imgs = array();
  $itemArr = $stmt->fetchAll(PDO::FETCH_ASSOC);
  $imgArr = $stmtImg->fetchAll(PDO::FETCH_ASSOC);

  foreach($itemArr as $v) {
    array_push($items, $v);
  };
  foreach($imgArr as $v) {
    array_push($imgs, $v);
  };

  array_push($arr, $items, $imgs);
};
?>