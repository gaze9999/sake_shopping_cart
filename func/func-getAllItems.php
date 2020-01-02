<?php
require_once('../db.inc.php');

$sql = "SELECT i.`sId`, i.`itemName`, i.`breId`, i.`vId`, b.`bId`, b.`breName`, b.`rId`, r.`rId`, r.`regionName`, b.`pId`, p.`pId`, p.`prefName`, v.`vId`, v.`varieties`, v.`vCatId`, v.`vCatag`, v.`vcId`
        FROM `sake_items` as i JOIN `sake_breweries` as b JOIN `sake_regions` as r JOIN `sake_prefectures` as p JOIN `sake_varieties` as v 
        ON i.`breId` = b.`bId` AND i.`vId` = v.`vId` AND b.`rId` = r.`rId` AND p.`pId` = b.`pId` 
        GROUP BY i.`itemName` 
        ORDER BY i.`sId` ";

$stmt = $pdo->prepare($sql);
$stmt->execute();

if($stmt->rowCount() > 0) {
  $arr = $stmt->fetchAll(PDO::FETCH_ASSOC);
};
?>