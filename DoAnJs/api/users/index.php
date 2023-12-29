<?php
header('Access-Control-Allow-Origin: *');
require_once '../core/db_usẻ.php';
$userList = getUser();
echo json_encode($userList);