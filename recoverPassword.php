<?php

    require_once('util/sendRecoverEmail.php');
    require_once('repository/LoginRepository.php');

    date_default_timezone_set('America/Sao_Paulo');

    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);

    $novaSenha = sha1(uniqid('senac_') . date('Y-m-d H:i'));

    if(fnAtualizaSenha($email, $novaSenha)) {
        $login = new stdClass();
        $login->email = $email;
        $login->senha = $novaSenha;

        send($login);
    }