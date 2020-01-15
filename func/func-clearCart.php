<?php
session_start();
require_once('../db.inc.php');
unset($_SESSION['cart']);
if(!isset($_SESSION['cart'])) $_SESSION['cart'] = [];
?>