<?php
function getReccIds($pdo, $categoryId){
  $sql = "SELECT p.`pId` ,p.`prefName` ,p.`rId` as prId , r.`rId` as rrId 
          FROM `sake_prefectures` as p LEFT JOIN `sake_regions` as r 
          ON p.`rId` = r.`rId` 
          WHERE r.`rId` in (?) ";
    $arrParam = [$categoryId];
    $stmt = $pdo->prepare($sql);
    $stmt->execute($arrParam);
    
    // $arr = $stmt->fetchAll(PDO::FETCH_ASSOC);
    // echo "<pre>";
    // print_r($arr);
    // echo "</pre>";
    // exit;

    if($stmt->rowCount() > 0) {
      $arr = $stmt->fetchAll(PDO::FETCH_ASSOC);
    };
  }
  
function getRecCIdsPids($pdo, $categoryId, $PrefectureId){
  $sql = "SELECT p.`pId` ,p.`prefName` ,p.`rId` as prId , r.`rId` as rrId 
          FROM `sake_prefectures` as p LEFT JOIN `sake_regions` as r 
          ON p.`rId` = r.`rId` 
          WHERE r.`rId` in (?) OR p.`pId` in (?) ";
  $arrParam = [$categoryId, $PrefectureId];
  $stmt = $pdo->prepare($sql);
  $stmt->execute($arrParam);

  if($stmt->rowCount() > 0) {
    $arr = $stmt->fetchAll(PDO::FETCH_ASSOC);
  };
};

// get Recursive Category Ids
if(isset($_GET['cId'])){
    $strCategoryIds = "";
    $strCategoryIds.= $_GET['cId'];
    getReccIds($pdo, $_GET['cId']);
    if (isset($_GET['pId'])) {
    $strPrefectureIds = "";
    $strPrefectureIds.= $_GET['pId'];
    getRecCIdsPids($pdo, $_GET['cId'], $_GET['pId']);
  }
}
?>