<?php
    require_once('repository/MangaRepository.php');
    require_once('util/base64.php');
    require_once('util/uploadArquivo.php');

    $anime = filter_input(INPUT_POST, 'anime', FILTER_SANITIZE_SPECIAL_CHARS);
    $volume = filter_input(INPUT_POST, 'volume', FILTER_SANITIZE_NUMBER_INT);
    $autor = filter_input(INPUT_POST, 'autor', FILTER_SANITIZE_SPECIAL_CHARS);
    $categoria = filter_input(INPUT_POST, 'categoria', FILTER_SANITIZE_SPECIAL_CHARS);
    $nota = filter_input(INPUT_POST, 'nota', FILTER_SANITIZE_NUMBER_INT);
    $sumario = filter_input(INPUT_POST, 'sumario', FILTER_SANITIZE_SPECIAL_CHARS);

    $titulo = ("{$anime} - Vol.{$volume}");

    $capa = converterBase64($_FILES['capa']);
    $conteudo = uploadArquivo($_FILES['conteudo']);

    if(empty($categoria)) {
        $categoria = "Desconhecido";
    }
    if(empty($sumario)) {
        $sumario = "Sem sumario";
    }

    if(empty($capa) ||  empty($anime) || empty($volume) || empty($nota)){
        $msg = "Preencher todos os campos primeiro.";
    } else {
        if(fnAddManga($titulo, $anime, $volume, $categoria, $nota, $sumario, $capa, $conteudo)) {
            $msg = "Sucesso ao adicionar o Manga no site";
        } else {
            $msg = "Falha ao adicionar o Manga no site";
        }
    }

    $page = "create_manga.php";
    setcookie('notify', $msg, time() + 10, "supermanga/{$page}", 'localhost');
    header("location: {$page}");
    exit;