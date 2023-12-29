<?php
    require_once'mysql.php';
    $pdo = get_pdo();

    // Create User
    function createUser($email,$password,$role){
        global $pdo;
        $sql = "INSERT INTO USERS(EMAIL, PASSWORD, ROLE)VALUES(:email,:password,:role)";
        $stmt = $pdo->prepare($sql);

        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password',$password);
        $stmt->bindParam('role',$role);

        $stmt->execute();
    }

    // Update User
    function updateUser($id,$email,$password,$role){
        global $pdo;
        $sql ="UPDATE USERS SET EMAIL=:email, PASSWORD=:password ,ROLE=:role WHERE ID=:id";
        $stmt = $pdo->prepare($sql);
        
        $stmt->bindParam(':id',$id);
        $stmt->bindParam(':email',$email);
        $stmt->bindParam(':password',$password);
        $stmt->bindParam(':role',$role);

        $stmt->execute();
    }

    // delete User
    function deleteUser($id){
        $sql = "DELETE FROM USERS WHERE ID=:id";
        global $pdo;
        $stmt = $pdo->prepare($sql);

        $stmt->bindParam(':id',$id);

        $stmt->execute();


    }

    // get User
    function getUser(){
        global $pdo;
        $sql= "SELECT * FROM users";
        $stmt = $pdo->prepare($sql);

        
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $result = $stmt->fetchAll();
        return $result;
    }

    function findUser($userId){
        global $pdo;
        $sql ="SELECT * FROM USERS WHERE ID=:id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam("id",$userId);
    
        // Thực hiện truy vấn
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);

        // Lấy danh sách kết quả
        $result = $stmt->fetchAll();

        // Lập kết quả
        foreach($result as $row){
            return array(
                'id' =>$row['id'],
                'email'=>$row['email'],
                'password' => $row['password'],
                'role' => $row['role']
            );
        }

        return null;
    }

    // Tim User bang email
    function findUserByEmail($email){
        global $pdo;

        $sql ="SELECT * FROM USERS WHERE email=:email";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam("email",$email);
    
        // Thực hiện truy vấn
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);

        // Lấy danh sách kết quả
        $result = $stmt->fetchAll();

        // Lập kết quả
        foreach($result as $row){
            return array(
                'id' =>$row['id'],
                'email'=>$row['email'],
                'password' => $row['password'],
                'role' => $row['role']
            );
        }

        return null;
    }

?>
