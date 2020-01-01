<?php
require_once('../db.inc.php');

$data = json_decode(file_get_contents('php://input'), true);
global $data, $pdo, $sql, $arrParam, $rid, $vid, $cid;
$rid = $data['rid'];
$cid = $data['cid'];
$vid = $data['vid'];
  

$sql = "SELECT i.`sId`, i.`itemName`, i.`breId`, i.`vId`, b.`bId`, b.`breName`, b.`rId`, r.`rId`, r.`regionName`, b.`pId`, p.`pId`, p.`prefName`, v.`vId`, v.`varieties`, v.`vCatId`, v.`vCatag`, v.`vcId`
        FROM `sake_items` as i JOIN `sake_breweries` as b JOIN `sake_regions` as r JOIN `sake_prefectures` as p JOIN `sake_varieties` as v 
        ON i.`breId` = b.`bId` AND i.`vId` = v.`vId` AND b.`rId` = r.`rId` AND p.`pId` = b.`pId` ";

getAll();

function getAll() {
  // global $sql, $arrParam, $rid, $vid, $cid;
  // cidPost($cid, $vid);
  pdoExec(); 
}

function ridPost($rid, $cid, $vid) {
  global $data, $pdo, $sql, $arrParam, $rid, $vid, $cid;
  cidPost($cid, $vid);
  if ($data['cid'] > 0) {
    global $data, $pdo, $sql, $arrParam;
    $sql.= "AND r.`rId` IN (?) ";
    array_push($arrParam, $data['rid']);
  } else {
    $sql.= "WHERE r.`rId` IN (?) ";
    $arrParam = [$data['rid']];
  }
  pdoExec();
}

// if ($data['rid'] > 0) {
//   global $data, $pdo, $sql, $arrParam;
//   cidPost($data['cid'], $data['vid']);
//   if ($data['cid'] > 0) {
//     global $data, $pdo, $sql, $arrParam;
//     $sql.= "AND r.`rId` IN (?) ";
//     array_push($arrParam, $data['rid']);
//   } else {
//     $sql.= "WHERE r.`rId` IN (?) ";
//     $arrParam = [$data['rid']];
//   }
//   pdoExec();
// } else {
//   global $data, $pdo, $sql, $arrParam;
//   cidPost($data['cid'], $data['vid']);
//   pdoExec();
// }

function cidPost($cid, $vid) {
  global $data, $sql, $arrParam;
  if ($cid > 0) {
    $sql.= "WHERE v.`vcId` = ? ";
    $arrParam = [$data['cid']];
    vidPost($vid);
  } else {
    $arrParam = [];
    vidPost($vid);
  }
};

function vidPost($vid) {
  global $data, $sql, $arrParam;
  if ($vid > 0) {
    $sql.= "AND i.`vId` = ? AND i.`vId` = v.`vId` ";
    array_push($arrParam, $data['vid']);
  }
};

function pdoExec() {
  global $pdo, $sql, $arrParam;
  $sql.= "GROUP BY i.`itemName` 
          ORDER BY i.`sId` ";
  $stmt = $pdo->prepare($sql);

  $stmt->execute();
  $arr = $stmt->fetchAll(PDO::FETCH_ASSOC);
  echo "<pre>";
  print_r($arrParam);
  print_r($stmt);
  print_r($arr);
  echo "</pre>";
  exit;

  if (isset($arrParam)) {
    $stmt->execute($arrParam);
  } else {
    $stmt->execute();
  };

  if($stmt->rowCount() > 0) {
    $arr = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $result = urldecode(json_encode($arr));
    echo $result;
  };
};
?>