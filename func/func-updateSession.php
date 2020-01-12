<?php
session_start();
require_once('../db.inc.php');
$data = json_decode(file_get_contents('php://input'), true);
$qtys = $data['qtys'];
$capIds = $data['capIds'];

for ($i=0; $i < count($_SESSION['cart']); $i++) {
  $_SESSION['cart'][$i]['itemQty'] = $qtys[$i];
}
?>