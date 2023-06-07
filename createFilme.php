<?php
    require_once('repository/FilmeRepository.php');
    require_once('util/base64.php');

    $anime =  filter_input(INPUT_POST, 'anime', FILTER_SANITIZE_SPECIAL_CHARS);
    $duracao = filter_input(INPUT_POST, 'duracao', FILTER_SANITIZE_SPECIAL_CHARS);
    $diretor = filter_input(INPUT_POST, 'diretor', FILTER_SANITIZE_SPECIAL_CHARS);
    $categoria = filter_input(INPUT_POST, 'categoria', FILTER_SANITIZE_SPECIAL_CHARS);
    $nota = filter_input(INPUT_POST, 'nota', FILTER_SANITIZE_NUMBER_INT);
    $sumario = filter_input(INPUT_POST, 'sumario', FILTER_SANITIZE_SPECIAL_CHARS);

    $titulo = ("{$anime}");

    $capa = converterBase64($_FILES['capa']);

    if(empty($categoria)) {
        $categoria = "Desconhecido";
    }
    if(empty($sumario)) {
        $sumario = "Sem sumario";
    }

    if(empty($capa) ||  empty($diretor) || empty($duracao) || empty($nota) || empty($anime)){
        $msg = "Preencher todos os campos primeiro.";
    } else {
        if(fnAddFilme($titulo, $anime, $diretor, $duracao, $categoria, $sumario, $capa, $nota)) {
            $msg = "Sucesso ao adicionar o Filme no site";
        } else {
            $msg = "Falha ao adicionar o Filme no site";
        }
    }

    $page = "create_filme.php";
    setcookie('notify', $msg, time() + 10, "aniplex/{$page}", 'localhost');
    header("location: {$page}");
    exit;