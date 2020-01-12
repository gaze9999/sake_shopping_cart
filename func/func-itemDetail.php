<?php
require_once('../db.inc.php');

$data = json_decode(file_get_contents('php://input'), true);
$sid = $data['itemid'];

// 取得基本資料
$sql = "SELECT i.`sId`, i.`itemName`, i.`breId`, i.`vId`, i.`price`,
               IFNULL(i.`riceId`, -1) as `riceId`,
               IFNULL(i.`description`, '無介紹') as `description`,
               IFNULL(i.`howTo`, '無介紹') as `howTo`,
               IFNULL(i.`nearBy`, '無介紹') as `nearBy`,
               IFNULL(i.`nihonshudo`, '暫無資料') as `nihonshudo`,
               IFNULL(i.`aminosando`, '暫無資料') as `aminosando`,
               IFNULL(i.`seimaibuai`, '暫無資料') as `seimaibuai`,
               IFNULL(i.`sando`, '暫無資料') as `sando`,
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

// 取得圖片資料
$imgSql ="SELECT i.`sId`,
                 m.`imgId`, m.`imgName`, m.`sId`
          FROM `sake_items` as i
                JOIN `sake_img` as m
          ON m.`sId` = i.`sId`
          WHERE i.`sId` = ?
          ORDER BY m.`imgId` ";

// 取得容量資料
$capSql ="SELECT i.`sId`, i.`itemName`,
                 i2.`sId`, i2.`itemName`, i2.`capacity`, i2.`price`
          FROM `sake_items` as i
          JOIN `sake_items` as i2
          ON i.`itemName`= i2.`itemName`
          WHERE i.`sId` = ?
          ORDER BY i2.`sId` ";

$recSql = "SELECT i.`sId`, i.`vId`,
                  v.`vId`, v.`vCatag`,
                  i2.`sId` as `sId2`, i2.`itemName`, i2.`vId`, i2.`breId` as `bId`,
                  v2.`vId`, v2.`vCatag`,
                  i3.`sId`,
                  m.`imgId`, m.`imgName`, m.`sId`
          FROM `sake_items` as i
          JOIN `sake_varieties` as v
          JOIN `sake_items` as i2
          JOIN `sake_varieties` as v2
          JOIN `sake_items` as i3
          JOIN `sake_img` as m
          ON i2.`vId`= v2.`vId`
          AND i.`vId` = v.`vId`
          AND m.`sId` = i3.`sId`
          WHERE i.`sId` = ?
          AND i2.`sId` != ?
          AND v.`vCatag` = v2.`vCatag`
          GROUP BY i2.`itemName`
          ORDER BY i2.`sId` ";

$arrParam = [ $sid ];
$arrParam2 = [ $sid, $sid ];

$stmt = $pdo->prepare($sql);
$stmtImg = $pdo->prepare($imgSql);
$stmtCap = $pdo->prepare($capSql);
$stmtRec = $pdo->prepare($recSql);
$stmt->execute($arrParam);
$stmtImg->execute($arrParam);
$stmtCap->execute($arrParam);
$stmtRec->execute($arrParam2);

if($stmt->rowCount() > 0) {
  $imgArr = array();
  $capArr = array();
  $recArr = array();
  $arr  = $stmt->fetchAll(PDO::FETCH_ASSOC);
  $arr2 = $stmtImg->fetchAll(PDO::FETCH_ASSOC);
  $arr3 = $stmtCap->fetchAll(PDO::FETCH_ASSOC);
  $arr4 = $stmtRec->fetchAll(PDO::FETCH_ASSOC);

  foreach($arr2 as $v) {
    array_push($imgArr, $v);
  };
  foreach($arr3 as $v) {
    array_push($capArr, $v);
  };
  foreach($arr4 as $v) {
    array_push($recArr, $v);
  };

  // 陣列組合
  array_push($arr, $imgArr, $capArr, $recArr);

  // echo "<pre>";
  // print_r($arr);
  // echo "</pre>";
  // exit;

  $result = urldecode(json_encode($arr));
  echo $result;
};