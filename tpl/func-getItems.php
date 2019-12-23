<?php
require_once('../db.inc.php');

echo "<pre>";
print_r($_POST);
echo "</pre>";
exit;

$sqlAll = "SELECT i.`sId`, i.`itemName`, i.`breId`, i.`vId`, i.`nihonshudo`, i.`capacity`, i.`price`, i.`discount`, b.`bId`, b.`breName`, b.`rId`, b.`pId`, p.`pId`, p.`prefName`, p.`rId`, r.`rId`, r.`regionName`, v.`vId`, v.`varieties`, v.`vCatag`, v.`alchoholAdd`, v.`seimaibuai` 
           FROM `sake_items` as i JOIN `sake_breweries` as b JOIN `sake_prefectures` as p JOIN `sake_regions` as r JOIN `sake_varieties` as v 
           ON r.`rId` = p.`rId` AND p.`pId` = b.`pId` AND b.`bId` = i.`breId` AND i.`vId` = v.`vId` ";

$sql = "SELECT i.`sId`, i.`itemName`, i.`breId`, b.`bId`, b.`breName`, b.`rId`, r.`rId`, r.`regionName` 
        FROM `sake_items` as i JOIN `sake_breweries` as b JOIN `sake_regions` as r
        WHERE r.`rId` in (?) ";

$arrParam = [$_POST['cid']];
$stmt = $pdo->prepare($sql);
$stmt->execute($arrParam);

if($stmt->rowCount() > 0) {
  $arr = $stmt->fetchAll(PDO::FETCH_ASSOC);
}
?>