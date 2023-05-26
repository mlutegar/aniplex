<?php

    require_once('util/sendMessageUsEmail.php');
    require_once('repository/LoginRepository.php');

    date_default_timezone_set('America/Sao_Paulo');

    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_SPECIAL_CHARS);
    $subject = filter_input(INPUT_POST, 'subject', FILTER_SANITIZE_SPECIAL_CHARS);
    $message = filter_input(INPUT_POST, 'message', FILTER_SANITIZE_SPECIAL_CHARS);

    send($email, $name, $subject, $message);