<?php
    require_once('repository/MusicaRepository.php');
    require_once('util/base64.php');

    $id = filter_input(INPUT_POST, 'idMusica', FILTER_SANITIZE_NUMBER_INT);
    $nome_musica = filter_input(INPUT_POST, 'nome_musica', FILTER_SANITIZE_SPECIAL_CHARS);
    $anime = filter_input(INPUT_POST, 'anime', FILTER_SANITIZE_SPECIAL_CHARS);
    $duracao = filter_input(INPUT_POST, 'duracao', FILTER_SANITIZE_NUMBER_INT);
    $volume = filter_input(INPUT_POST, 'volume', FILTER_SANITIZE_NUMBER_INT);
    $categoria = filter_input(INPUT_POST, 'categoria', FILTER_SANITIZE_SPECIAL_CHARS);
    $nota = filter_input(INPUT_POST, 'nota', FILTER_SANITIZE_NUMBER_INT);
    
    $titulo = ("{$nome_musica} - Anime: {$anime} - Duração: {$duracao} Minutos");



    if(fnUpdateMusica($id, $nome_musica ,$titulo, $anime, $duracao, $categoria, $nota)) {
        $msg = "Sucesso ao adicionar a Musica no site";
    } else {
        $msg = "Falha ao adicionar a Musica no site";
    }

    $_SESSION['id'] = $id;
    $page = "formulario-edita-musica.php";
    setcookie('notify', $msg, time() + 10, "aniplex/{$page}", 'localhost');
    header("location: {$page}");
    exit;