
<?php
require_once('../db.inc.php');
$data = json_decode(file_get_contents('php://input'), true);

$sql = "SELECT `rId`, `regionName`
        FROM `sake_regions`
        ORDER BY `rId`";
$stmt = $pdo->prepare($sql);
$stmt->execute();

if($stmt->rowCount() > 0) {
  $arr = $stmt->fetchAll(PDO::FETCH_ASSOC);
  $result = urldecode(json_encode($arr));
  echo $result;
}
?>