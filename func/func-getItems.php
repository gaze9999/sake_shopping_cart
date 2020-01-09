<?php
require('../func/func-getAllItems.php');

$data = json_decode(file_get_contents('php://input'), true);
$rid = $data['rid'];
$cid = $data['cid'];
$vid = $data['vid'];

// echo "<pre>";
// print_r($arr);
// echo "</pre>";
// exit;

getList();

function getList() {
  global $arr;
  $result = urldecode(json_encode($arr));
  echo $result;
}

// getAll($rid, $cid, $vid);

function getAll($rid, $cid, $vid) {
  global $arr;
  $arr = ridFilter($rid, $arr);
  $arr = cidFilter($cid, $arr);
  $arr = vidFilter($vid, $arr);
  $result = urldecode(json_encode($arr));
  echo $result;
}

function ridFilter($rid, $arr) {
  global $data, $ridArr;
  $ridArr = array();
  if (!empty($data['rid'])) {
    foreach ($arr[0] as $k => $v) {
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
    foreach ($arr[0] as $k => $v) {
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
    foreach ($arr[0] as $k => $v) {
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