<?php
session_start();
require_once('../db.inc.php');
$data = json_decode(file_get_contents('php://input'), true);
// print_r($data);
$id = $data['itemid'];

unset($_SESSION['cart'][$id]);
$_SESSION["cart"] = array_values($_SESSION["cart"]);

$result = urldecode(json_encode($data));
echo $result;
?>