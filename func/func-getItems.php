<?php
require('../func/func-getAllItems.php');

$data = json_decode(file_get_contents('php://input'), true);
$rid = $data['rid'];
$cid = $data['cid'];
$vid = $data['vid'];

getAll($cid, $vid, $rid);

function getList() {
  global $arr;
  $result = urldecode(json_encode($arr));
  echo $result;
}

function getAll($cid, $vid, $rid) {
  global $arr, $imgs;
  $newArr = array();
  $newArr[0] = ridFilter($rid, $arr[0]);
  $newArr[0] = cidFilter($cid, $newArr[0]);
  $newArr[0] = vidFilter($vid, $newArr[0]);

  array_push($newArr, $imgs);
  $result = urldecode(json_encode($newArr));
  echo $result;
}

function ridFilter($rid, $arrr) {
  global $data, $ridArr;
  $ridArr = array();
  if (!empty($data['rid'])) {
    foreach ($arrr as $k => $v) {
      if (in_array($arrr[$k]['rId'], $rid)) {
        array_push($ridArr, $v);
      }
    }
    return $ridArr;
  } else {
    return $arrr;
  }
}

function cidFilter($cid, $arrc) {
  global $data, $cidArr;
  $cidArr = array();
  if (!empty($data['cid'])) {
    foreach ($arrc as $k => $v) {
      if ($arrc[$k]['vcId'] == $cid) {
        array_push($cidArr, $v);

      }
    }
    return $cidArr;
  } else {
    return $arrc;
  }
}

function vidFilter($vid, $arrv) {
  global $data, $vidArr, $newArr;
  $vidArr = array();
  if (!empty($data['vid'])) {
    foreach ($arrv as $k => $v) {
      if ($arrv[$k]['vId'] == $vid) {
        array_push($vidArr, $v);
      }
    }
    return $vidArr;
  } else {
    return $arrv;
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