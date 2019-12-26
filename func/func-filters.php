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
      echo "
      <dd>
        <div class='form-check filter_form'>
          <input type='checkbox' class='form-check-input filter_checkbox'id='region-{$arr[$i]['regionName']}' data-region='{$arr[$i]['rId']}'>
          <label class='form-check-label' for='region-{$arr[$i]['regionName']}'>{$arr[$i]['regionName']}</label>
        </div>
      </dd>";
    }
    echo "</dl>";
  }
}