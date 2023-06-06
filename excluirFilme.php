<?php
    require_once('repository/FilmeRepository.php');
    session_start();

    $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
    $filme = fnLocalizaFilmePorId($_SESSION['id']);

    $msg = "";
    if(fnDeleteFilme($_SESSION['id'], $conteudo)){
        $msg = "Sucesso ao deletar";
    } else {
        $msg = "Falha ao deletar";
    }

    unset($_SESSION['id']);

    $page = "admin_list_filmes.php";
    setcookie('notify', $msg, time() + 10, "/aniplex/{$page}", 'localhost');
    header("location: {$page}");
    exit;