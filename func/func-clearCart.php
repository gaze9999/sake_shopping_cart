<?php
session_start();
require_once('../db.inc.php');
session_destroy();
if(!isset($_SESSION['cart'])) $_SESSION['cart'] = [];
echo 'cleaned';
?>