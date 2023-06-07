<?php
    require_once('repository/AnimeRepository.php');
    require_once('util/base64.php');

    $id = filter_input(INPUT_POST, 'idAnime', FILTER_SANITIZE_NUMBER_INT);
    $anime = filter_input(INPUT_POST, 'anime', FILTER_SANITIZE_SPECIAL_CHARS);
    $episodios = filter_input(INPUT_POST, 'episodios', FILTER_SANITIZE_NUMBER_INT);
    $temporadas = filter_input(INPUT_POST, 'temporadas', FILTER_SANITIZE_NUMBER_INT);
    $categoria = filter_input(INPUT_POST, 'categoria', FILTER_SANITIZE_SPECIAL_CHARS);
    $nota = filter_input(INPUT_POST, 'nota', FILTER_SANITIZE_NUMBER_INT);
    $sumario = filter_input(INPUT_POST, 'sumario', FILTER_SANITIZE_SPECIAL_CHARS);

    $titulo = ("{$anime} - {$temporadas} - Temporada");



    if(fnUpdateAnime($id, $titulo, $anime, $episodios, $temporadas, $categoria, $sumario, $nota)) {
        $msg = "Sucesso ao adicionar o Anime no site";
    } else {
        $msg = "Falha ao adicionar o Anime no site";
    }

    $_SESSION['id'] = $id;
    $page = "formulario-edita-anime.php";
    setcookie('notify', $msg, time() + 10, "aniplex/{$page}", 'localhost');
    header("location: {$page}");
    exit;