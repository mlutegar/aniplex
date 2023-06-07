<?php
    require_once('repository/MusicaRepository.php');
    session_start();

    $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
    $musica = fnLocalizaMusicaPorId($_SESSION['id']);
    $conteudo = $musica->conteudo;

    $msg = "";
    if(fnDeleteMusica($_SESSION['id'], $conteudo)){
        $msg = "Sucesso ao deletar";
    } else {
        $msg = "Falha ao deletar";
    }

    unset($_SESSION['id']);

    $page = "admin_list_musicas.php";
    setcookie('notify', $msg, time() + 10, "/aniplex/{$page}", 'localhost');
    header("location: {$page}");
    exit;