
<?php
require_once('../db.inc.php');
$data = json_decode(file_get_contents('php://input'), true);

$sqlR = "SELECT `rId`, `regionName`
         FROM `sake_regions`
         ORDER BY `rId`";

$sqlV = "SELECT `vId`, `vCatag`, `vcId`
         FROM `sake_varieties`
         GROUP BY `vcId`
         ORDER BY `vcId`";

$sqlC = "SELECT CAST(`capacity` as decimal(18, 0)) as `cap`
         FROM `sake_items`
         GROUP BY `cap`
         ORDER BY `cap`";

$stmtR = $pdo->prepare($sqlR);
$stmtR->execute();
$stmtV = $pdo->prepare($sqlV);
$stmtV->execute();
$stmtC = $pdo->prepare($sqlC);
$stmtC->execute();

if($stmtR->rowCount() > 0) {
  $arr = array();
  $arrReg = array();
  $arrVar = array();
  $arrCap = array();
  $arrR = $stmtR->fetchAll(PDO::FETCH_ASSOC);
  $arrV = $stmtV->fetchAll(PDO::FETCH_ASSOC);
  $arrC = $stmtC->fetchAll(PDO::FETCH_ASSOC);

  foreach($arrR as $v) {
    array_push($arrReg, $v);
  };
  foreach($arrV as $v) {
    array_push($arrVar, $v);
  };
  foreach($arrC as $v) {
    array_push($arrCap, $v);
  };

  array_push($arr, $arrReg, $arrVar, $arrCap);

  $result = urldecode(json_encode($arr));
  echo $result;
}
?>