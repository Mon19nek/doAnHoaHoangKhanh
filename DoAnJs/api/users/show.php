<?php
header('Acces-Control-Allow-Origin: *');
require_once('../core/db_user.php');

if(isset($_GET['id'])){
    $id = $_GET['id'];

    $user = findUser($id);
    if($user != null){
        $response = array(
            'code' =>200,
            'message' => 'delete succes',
            'data'  => $user  
        );}
        else{
            $response = array (
                'code'=>600,
                'message' =>'user not found'
        );
        }
        echo json_encode($response);
    }
