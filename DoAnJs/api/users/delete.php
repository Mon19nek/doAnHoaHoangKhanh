<?php
header('Access-Control-Allow-Origin: *');
require_once '../core/db_user.php';
if(isset($_GET['id'])){
    $id = $_GET['id'];

    $user = findUser(($id));
    if($user != null ) {
        deleteUser($id);
        $response = array(
            'code' =>200,
            'message' =>'delete success'
        );
    }else{
        $response = array(
            'code' =>600,
            'message' =>'user not found'
            );
    }
    echo json_encode($response);
}