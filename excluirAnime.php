<?php
    require_once('repository/AnimeRepository.php');
    session_start();

    $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
    $anime = fnLocalizaAnimePorId($_SESSION['id']);
    $conteudo = $anime->conteudo;

    $msg = "";
    if(fnDeleteAnime($_SESSION['id'], $conteudo)){
        $msg = "Sucesso ao deletar";
    } else {
        $msg = "Falha ao deletar";
    }

    unset($_SESSION['id']);

    $page = "admin_list_animes.php";
    setcookie('notify', $msg, time() + 10, "/aniplex/{$page}", 'localhost');
    header("location: {$page}");
    exit;