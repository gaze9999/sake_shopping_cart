<?php
session_start();
require_once('../db.inc.php');
unset($_SESSION['userinfo']);
if(!isset($_SESSION['userinfo'])) $_SESSION['userinfo'] = [];
echo 'ok';
?>