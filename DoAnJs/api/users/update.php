<?php
header('Access-Control-Allow-Origin: *');
require_once '../core/db_user.php';

if(isset($_POST['id'])){
    $id = $_GET['id'];

    $user = findUser($id);
    if($user != null){
        $email = $_POST['email'];
        $password = $_POST['password'];
        $role = $_POST['role'];
        updateUser($id,$email,$password,$role);
        $response =array(
            'code' =>200,
            'message' => 'update success'
        );
    }else{
        $response = array(
            'code' =>600,
            'message' => 'user not found'
        );
    }
    echo json_encode($response);
}