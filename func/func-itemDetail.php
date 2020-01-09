<?php
require_once('../db.inc.php');

$data = json_decode(file_get_contents('php://input'), true);
$sid = $data['itemid'];

$sql = "SELECT i.`sId`, i.`itemName`, i.`breId`, i.`vId`, i.`price`,
               i.`riceId`, i.`nihonshudo`, i.`aminosando`, i.`sando`,
               i.`seimaibuai`, i.`capacity`, i.`description`,
               i2.`itemName`, i2.`capacity`,
               b.`bId`, b.`breName`, b.`rId`, b.`pId`,
               r.`rId`, r.`regionName`,
               p.`pId`, p.`prefName`,
               v.`vId`, v.`varieties`, v.`vCatId`, v.`vCatag`, v.`vcId`,
               m.`imgId`, m.`imgName`, m.`bId`, m.`sId`,
               rice.`riceId`, rice.`riceName`
        FROM `sake_items` as i
        	    JOIN `sake_items` as i2
              JOIN `sake_breweries` as b
              JOIN `sake_regions` as r
              JOIN `sake_prefectures` as p
              JOIN `sake_varieties` as v
              JOIN `sake_img` as m
              JOIN `sake_rice` as rice
        ON i.`breId` = b.`bId`
              AND i.`vId` = v.`vId`
              AND b.`rId` = r.`rId`
              AND p.`pId` = b.`pId`
              AND m.`sId` = i.`sId`
              AND i.`riceId` = rice.`riceId`
        WHERE i.`sId` = ? AND i.`itemName` = i2.`itemName`
        ORDER BY i.`sId`";

$arrParam = [ $sid ];

$stmt = $pdo->prepare($sql);
$stmt->execute($arrParam);

if($stmt->rowCount() > 0) {
  $arr = $stmt->fetchAll(PDO::FETCH_ASSOC);
  $result = urldecode(json_encode($arr));
  echo $result;
};