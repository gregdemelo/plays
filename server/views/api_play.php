<?php header('content-type: application/json; charset=utf-8');

$arr = array('name' => 'Julius Caesar');

echo $_GET['callback'] . '('.json_encode($arr).')';
?>