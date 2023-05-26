<?php
    require_once('Connection.php');

    function fnLogin($email, $password) {
        $con = getConnection();
        $sql = "select id, created_at, user, foto, age, email from login where email = :pEmail and senha = :pSenha";
        $stmt = $con->prepare($sql);
        $stmt->bindParam(":pEmail", $email);
        $stmt->bindValue(":pSenha", md5($password));

        if($stmt->execute()){
            return $stmt->fetch(PDO::FETCH_OBJ);
        }
        return null;
    }

    function fnAddUser ($user, $age, $email, $senha) {
        $con = getConnection();
        
        $sql = "insert into login (user, age, email, senha) values (:pUser, :pAge, :pEmail, :pSenha)";
        
        $stmt = $con->prepare($sql);
        $stmt->bindParam(":pUser", $user); 
        $stmt->bindValue(":pAge", $age);
        $stmt->bindParam(":pEmail", $email); 
        $stmt->bindValue(":pSenha", md5($senha));
        
        return $stmt->execute();
    }

    function fnListUsers() {
        $con = getConnection();
        $sql = "select * from login";
        $result = $con->query($sql);
        $lstUsers = array();

        while($user = $result->fetch(PDO::FETCH_OBJ)){
            array_push($lstUsers, $user);
        }

        return $lstUsers;
    }

    function fnLocalizaUserPorId($id) {
        $con = getConnection();
        $sql = "select * from login where id = :pID";
        
        $stmt = $con->prepare($sql);
        $stmt->bindParam(":pID", $id);
        
        if($stmt->execute()){
            return $stmt->fetch(PDO::FETCH_OBJ);
        }
        return null;
    }

    function fnAtualizaSenha($email, $senha) {
        $con = getConnection();

        $sql = "update login set senha = :pSenha where email = :pEmail";

        $stmt = $con->prepare($sql);
        $stmt->bindParam(":pEmail", $email);
        $stmt->bindValue(":pSenha", md5($senha));

        if($stmt->execute()) {
            return true;
        }

        return false;
    }
    function fnUpdateUser($id, $email, $user, $age) {
        $con = getConnection();
        $sql = "update login set email = :pEmail, age = :pAge, user = :pUser where id = :pID";
        
        $stmt = $con->prepare($sql);
        $stmt->bindParam(":pID", $id);
        $stmt->bindParam(":pEmail", $email);
        $stmt->bindParam(":pAge", $age);
        $stmt->bindParam(":pUser", $user);

        return $stmt->execute();
    }