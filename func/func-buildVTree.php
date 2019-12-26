<?php
// call vTree
function vTree($pdo){
  $sql = "SELECT `vId`, `varieties`, `vCatag`
          FROM `sake_varieties` 
          ORDER BY `vId` ";
  $stmt = $pdo->prepare($sql);
  $stmt->execute();

  if($stmt->rowCount() > 0) {
    $arr = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo "
          <div class='tree_total' data-total=''>商品數量：<p class='tree_totalData'></p></div>
          <dl>
          <dt>分類</dt>
          <dd><button class='btn tree_btn'>全部</button>
          </dd>";

    for($i = 0; $i < count($arr); $i++) {
      echo "<dd>";
      // echo "<a class='tree_btn' href='./itemList.php?cId={$arr[$i]['rId']}'>{$arr[$i]['regionName']}'></a>";
      echo "<button class='btn tree_btn' data-vId='{$arr[$i]['vId']}'>{$arr[$i]['varieties']}</button>";
      echo "</dd>";
      // TreePref($pdo, $arr[$i]['rId']);
      // echo "<input type='hidden' id='' data-cId='{$arr[$i]['rId']}' data-rName='{$arr[$i]['regionName']}'>";
    }
    echo "</dl>";
  }
}

// call prefectures
function TreePref($pdo, $prefId = 1){
  $sql = "SELECT p.`pId` ,p.`prefName`,p.`rId` as prId , r.`rId` as rrId 
          FROM `sake_prefectures` as p LEFT JOIN `sake_regions` as r 
          ON p.`rId` = r.`rId` 
          WHERE p.`rId` = ? ";

  $stmt = $pdo->prepare($sql);
  $arrParam = [$prefId];
  $stmt->execute($arrParam);
  // $arr = $stmt->fetchAll(PDO::FETCH_ASSOC);
  // echo "<pre>";
  // print_r($arr);
  // echo "</pre>";
  // exit;

  if($stmt->rowCount() > 0) {        
    $arr = $stmt->fetchAll(PDO::FETCH_ASSOC);
    for($i = 0; $i < count($arr); $i++) {
      echo "<dd>";
      echo "<a href='./itemList.php?cId={$arr[$i]['rrId']}&pId={$arr[$i]['pId']}'>{$arr[$i]['prefName']}</a>";
      echo "</dd>";
    }
  }
}
?>