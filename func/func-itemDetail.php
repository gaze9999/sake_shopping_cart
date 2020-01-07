<?php
require('../func/func-getAllItems.php');

$result = urldecode(json_encode($arr));
echo $result;