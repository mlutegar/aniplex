<?php
    session_start();

    require_once('repository/LoginRepository.php');

    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $senha = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_SPECIAL_CHARS);
    $user = filter_input(INPUT_POST, 'user', FILTER_SANITIZE_SPECIAL_CHARS);
    $age = filter_input(INPUT_POST, 'age', FILTER_SANITIZE_NUMBER_INT);

    if(empty($email) || empty($senha) || empty($user) || empty($age)){
        $msg = "Preencher todos os campos primeiro.";
    }
    else{
        if(fnAddUser($user, $age, $email, $senha))
        {
            $msg = "Sucesso ao criar conta";
        } else {
            $msg = "Preencha todos os campos corretamente";
        }
    }

    $page = "login.php";
    setcookie('notify', $msg, time() + 10, "aniplex/{$page}", 'localhost');
    header("location: {$page}");
    exit;