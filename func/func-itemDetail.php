<?php
require_once('../db.inc.php');

$data = json_decode(file_get_contents('php://input'), true);
$sid = $data['itemid'];

$sql = "SELECT i.`sId`, i.`itemName`, i.`breId`, i.`vId`, i.`price`,
               IFNULL(i.`riceId`, -1) as `riceId`,
               IFNULL(i.`description`, '無介紹') as `description`,
               IFNULL(i.`nihonshudo`, 0) as `nihonshudo`,
               IFNULL(i.`aminosando`, 0) as `aminosando`,
               IFNULL(i.`seimaibuai`, 0) as `seimaibuai`,
               IFNULL(i.`sando`, 0) as `sando`,
               b.`bId`, b.`breName`, b.`rId`, b.`pId`,
               r.`rId`, r.`regionName`,
               p.`pId`, p.`prefName`,
               v.`vId`, v.`varieties`, v.`vCatag`,
               rice.`riceId`, rice.`riceName`
        FROM `sake_items` as i
              JOIN `sake_breweries` as b
              JOIN `sake_regions` as r
              JOIN `sake_prefectures` as p
              JOIN `sake_varieties` as v
              JOIN `sake_rice` as rice
        ON i.`breId` = b.`bId`
              AND i.`vId` = v.`vId`
              AND b.`rId` = r.`rId`
              AND p.`pId` = b.`pId`
              AND IFNULL(i.`riceId`, -1) = rice.`riceId`
        WHERE i.`sId` = ?
        ORDER BY i.`sId`";

$imgSql ="SELECT i.`sId`,
                 m.`imgId`, m.`imgName`, m.`sId`
          FROM `sake_items` as i
                JOIN `sake_img` as m
          ON m.`sId` = i.`sId`
          WHERE i.`sId` = ?
          ORDER BY m.`imgId` ";

$capSql ="SELECT i.`sId`, i.`itemName`,
                 i2.`sId`, i2.`itemName`, i2.`capacity`
          FROM `sake_items` as i
          JOIN `sake_items` as i2
          ON i.`itemName`= i2.`itemName`
          WHERE i.`sId` = ?
          ORDER BY i2.`sId` ";

$arrParam = [ $sid ];

$stmt = $pdo->prepare($sql);
$stmtImg = $pdo->prepare($imgSql);
$stmtCap = $pdo->prepare($capSql);
$stmt->execute($arrParam);
$stmtImg->execute($arrParam);
$stmtCap->execute($arrParam);

if($stmt->rowCount() > 0) {
  $imgArr = array();
  $capArr = array();
  $arr  = $stmt->fetchAll(PDO::FETCH_ASSOC);
  $arr2 = $stmtImg->fetchAll(PDO::FETCH_ASSOC);
  $arr3 = $stmtCap->fetchAll(PDO::FETCH_ASSOC);

  foreach($arr2 as $v) {
    array_push($imgArr, $v);
  };
  foreach($arr3 as $v) {
    array_push($capArr, $v);
  };

  array_push($arr, $imgArr, $capArr);

  // echo "<pre>";
  // print_r($arr);
  // echo "</pre>";
  // exit;

  $result = urldecode(json_encode($arr));
  echo $result;
};