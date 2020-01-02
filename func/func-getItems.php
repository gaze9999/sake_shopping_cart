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

getAll($rid, $cid, $vid);

// pdoExec();

function getAll($rid, $cid, $vid) {
  global $arr, $pdo, $sql;
  $sql.= "GROUP BY i.`itemName` 
          ORDER BY i.`sId` ";
  $stmt = $pdo->prepare($sql);
  $stmt->execute();
  
  if($stmt->rowCount() > 0) {
    $arr = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if (empty($rid)) {
    } else if (!empty($rid)) {
      $arr = ridFilter($rid, $arr);
    }
    if (empty($cid)) {
    } else if (!empty($cid)) {
      $arr = cidFilter($cid, $arr);
    }
    if (empty($vid)) {
    } else if (!empty($vid)) {
      $arr = vidFilter($vid, $arr);
    }
  };
  
  $result = urldecode(json_encode($arr));
  echo $result;
}


function ridFilter($rid, $arr) {
  global $data, $ridArr;
  $ridArr = array();
  if (!empty($data['rid'])) {
    foreach ($arr as $k => $v) {
      if (in_array($arr[$k]['rId'], $rid)) {
        array_push($ridArr, $v);
      }
    }
    return $ridArr;
  } else {
    return $arr;
  }
}

function cidFilter($cid, $arr) {
  global $data, $cidArr;
  $cidArr = array();
  if (!empty($data['cid'])) {
    foreach ($arr as $k => $v) {
      if ($arr[$k]['vcId'] == $cid) {
        array_push($cidArr, $v);
      }
    }
    return $cidArr;
  } else {
    return $arr;
  }
}

function vidFilter($vid, $arr) {
  global $data, $vidArr;
  $vidArr = array();
  if (!empty($data['vid'])) {
    foreach ($arr as $k => $v) {
      if ($arr[$k]['vId'] == $vid) {
        array_push($vidArr, $v);
      }
    }
    return $vidArr;
  } else {
    return $arr;
  }
}

function pdoExec() {
  global $pdo, $sql, $arrParam, $rid;
  $sql.= "GROUP BY i.`itemName` 
          ORDER BY i.`sId` ";
  $stmt = $pdo->prepare($sql);

  // $stmt->execute();
  // $arr = $stmt->fetchAll(PDO::FETCH_ASSOC);
  // echo "<pre>";

  // ridFilter($rid, $arr);
  // print_r(ridFilter($rid, $arr));

  // print_r($arr);
  // echo "</pre>";
  // exit;

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