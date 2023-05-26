<?php
    require_once('repository/MangaRepository.php');
    require_once('util/base64.php');
    
    $id = filter_input(INPUT_POST, 'idManga', FILTER_SANITIZE_NUMBER_INT);
    $anime = filter_input(INPUT_POST, 'anime', FILTER_SANITIZE_SPECIAL_CHARS);
    $volume = filter_input(INPUT_POST, 'volume', FILTER_SANITIZE_NUMBER_INT);
    $categoria = filter_input(INPUT_POST, 'categoria', FILTER_SANITIZE_SPECIAL_CHARS);
    $nota = filter_input(INPUT_POST, 'nota', FILTER_SANITIZE_NUMBER_INT);
    $sumario = filter_input(INPUT_POST, 'sumario', FILTER_SANITIZE_SPECIAL_CHARS);

    $titulo = ("{$anime} - Vol.{$volume}");



    if(fnUpdateManga($id, $titulo, $anime, $volume, $categoria, $nota, $sumario)) {
        $msg = "Sucesso ao adicionar o Manga no site";
    } else {
        $msg = "Falha ao adicionar o Manga no site";
    }

    $_SESSION['id'] = $id;
    $page = "formulario-edita-manga.php";
    setcookie('notify', $msg, time() + 10, "supermanga/{$page}", 'localhost');
    header("location: {$page}"); 
    exit;