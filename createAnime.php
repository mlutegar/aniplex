<?php
    require_once('repository/AnimeRepository.php');
    require_once('util/base64.php');
    require_once('util/uploadArquivo.php');

    $anime = filter_input(INPUT_POST, 'anime', FILTER_SANITIZE_SPECIAL_CHARS);
    $episodios = filter_input(INPUT_POST, 'episodios', FILTER_SANITIZE_NUMBER_INT);
    $temporadas = filter_input(INPUT_POST, 'temporadas', FILTER_SANITIZE_NUMBER_INT);
    $autor = filter_input(INPUT_POST, 'autor', FILTER_SANITIZE_SPECIAL_CHARS);
    $categoria = filter_input(INPUT_POST, 'categoria', FILTER_SANITIZE_SPECIAL_CHARS);
    $nota = filter_input(INPUT_POST, 'nota', FILTER_SANITIZE_NUMBER_INT);
    $sumario = filter_input(INPUT_POST, 'sumario', FILTER_SANITIZE_SPECIAL_CHARS);

    $titulo = ("{$anime} - {$temporadas} - Temporada");

    $capa = converterBase64($_FILES['capa']);
    $conteudo = uploadArquivo($_FILES['conteudo']);

    if(empty($categoria)) {
        $categoria = "Desconhecido";
    }
    if(empty($sumario)) {
        $sumario = "Sem sumario";
    }

    if(empty($capa) ||  empty($anime) || empty($episodios) || empty($nota) || empty($episodios)){
        $msg = "Preencher todos os campos primeiro.";
    } else {
        if(fnAddAnime($titulo, $anime, $episodios, $temporadas, $categoria, $sumario, $capa, $conteudo, $nota)) {
            $msg = "Sucesso ao adicionar o Anime no site";
        } else {
            $msg = "Falha ao adicionar o Anime no site";
        }
    }

    $page = "create_filme.php";
    setcookie('notify', $msg, time() + 10, "aniplex/{$page}", 'localhost');
    header("location: {$page}");
    exit;