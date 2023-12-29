<?php 
    header('Access-Control-Allow-Origin: *');
    require_once '../core/db_user.php';
    if(isset($_POST['email'])){
        $email = $_POST['email'];
        $password = $_POST['password'];

        $user = findUserByEmail($email);  
        if($user == null){
            createUser($email,$password,'user');
            $response = array(
                'code'=>200,
                'message' =>'create'
            );
        }else {
            $response = array(
                'code' =>600,
                'message' =>'Email exits'
            );
        }
        echo json_encode($response);
        }


    
