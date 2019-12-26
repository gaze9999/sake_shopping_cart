<?php
require_once('./db.inc.php');
function getRegions($pdo){
  $sql = "SELECT `rId`, `regionName`
          FROM `sake_regions` ";
  $stmt = $pdo->prepare($sql);
  $stmt->execute();

  if($stmt->rowCount() > 0) {
  $arr = $stmt->fetchAll(PDO::FETCH_ASSOC);
  echo "
  <dl>
  <dt>地方</dt>
  <dd><button class='btn tree_btn'>全部</button>
  </dd>";
    for($i = 0; $i < count($arr); $i++) {
      echo "<dd>";
      echo "<button class='btn filter_btn' data-region='{$arr[$i]['rId']}'>{$arr[$i]['regionName']}</button>";
      echo "</dd>";
    }
    echo "</dl>";
  }
}