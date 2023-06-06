<?php
    require_once('repository/FilmeRepository.php');
    require_once('util/base64.php');

    $id = filter_input(INPUT_POST, 'idFilme', FILTER_SANITIZE_NUMBER_INT);
    $anime = filter_input(INPUT_POST, 'anime', FILTER_SANITIZE_SPECIAL_CHARS);
    $duracao = filter_input(INPUT_POST, 'duracao', FILTER_SANITIZE_NUMBER_INT);
    $diretor = filter_input(INPUT_POST, 'diretor', FILTER_SANITIZE_SPECIAL_CHARS);
    $volume = filter_input(INPUT_POST, 'volume', FILTER_SANITIZE_NUMBER_INT);
    $categoria = filter_input(INPUT_POST, 'categoria', FILTER_SANITIZE_SPECIAL_CHARS);
    $nota = filter_input(INPUT_POST, 'nota', FILTER_SANITIZE_NUMBER_INT);
    $sumario = filter_input(INPUT_POST, 'sumario', FILTER_SANITIZE_SPECIAL_CHARS);

    $titulo = ("{$anime} - Duração: {$duracao} Minutos");



    if(fnUpdateFilme($id, $titulo, $anime, $diretor, $duracao, $categoria, $sumario, $nota)) {
        $msg = "Sucesso ao editar o Filme no site";
    } else {
        $msg = "Falha ao editar o Filme no site";
    }

    $_SESSION['id'] = $id;
    $page = "formulario-edita-filme.php";
    setcookie('notify', $msg, time() + 10, "aniplex/{$page}", 'localhost');
    header("location: {$page}");
    exit;