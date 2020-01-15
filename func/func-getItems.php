<?php
require('../func/func-getAllItems.php');

$data = json_decode(file_get_contents('php://input'), true);
$rid   = $data['rid'];
$vids  = $data['vid'];
$caps  = $data['cap'];
$price = $data['pri'];

listSelect($rid, $vids, $caps);

function getList() {
  global $arr;
  $result = urldecode(json_encode($arr));
  echo $result;
}

function listSelect($rid, $vids, $caps) {
  global $arr, $imgs;
  $newArr = array();
  $newArr[0] = idFilter($rid, $arr[0], 'rId', 'rid');
  $newArr[0] = idsFilter($vids, $newArr[0], 'vcId', 'vid');
  $newArr[0] = idsFilter($caps, $newArr[0], 'cap', 'cap');

  array_push($newArr, $imgs);
  $result = urldecode(json_encode($newArr));
  echo $result;
}

function idsFilter($inputId, $thatArr, $idName, $dataName) {
  global $data;
  $idArr = array();
  if (!empty($data[$dataName])) {
    foreach ($thatArr as $k => $v) {
      if (in_array($thatArr[$k][$idName], $inputId)) {
        array_push($idArr, $v);
      }
    }
    return $idArr;
  } else {
    return $thatArr;
  }
}

function idFilter($inputIds, $thatArr, $idName, $dataName) {
  global $data, $idsArr;
  $idsArr = array();
  if (!empty($data[$dataName])) {
    foreach ($thatArr as $k => $v) {
      if ($thatArr[$k][$idName] == $inputIds) {
        array_push($idsArr, $v);

      }
    }
    return $idsArr;
  } else {
    return $thatArr;
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