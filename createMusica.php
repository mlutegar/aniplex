<?php
    require_once('repository/MusicaRepository.php');
    require_once('util/base64.php');
    require_once('util/uploadArquivo.php');

    $anime = filter_input(INPUT_POST, 'anime', FILTER_SANITIZE_SPECIAL_CHARS);
    $nome_musica = filter_input(INPUT_POST, 'nome_musica', FILTER_SANITIZE_SPECIAL_CHARS);
    $duracao = filter_input(INPUT_POST, 'duracao', FILTER_SANITIZE_SPECIAL_CHARS);
    $categoria = filter_input(INPUT_POST, 'categoria', FILTER_SANITIZE_SPECIAL_CHARS);
    $nota = filter_input(INPUT_POST, 'nota', FILTER_SANITIZE_NUMBER_INT);

    $titulo = ("{$nome_musica}");

    $capa = converterBase64($_FILES['capa']);
    $conteudo = uploadArquivo($_FILES['conteudo']);

    if(empty($categoria)) {
        $categoria = "Desconhecido";
    }
    
    if(empty($capa) ||  empty($anime) || empty($duracao) || empty($nota) || empty($nome_musica)){
        $msg = "Preencher todos os campos primeiro.";
    } else {
        if(fnAddMusica($nome_musica, $titulo, $anime, $duracao, $categoria, $capa, $conteudo, $nota)) {
            $msg = "Sucesso ao adicionar a Musica no site";
        } else {
            $msg = "Falha ao adicionar a Musica no site";
        }
    }

    $page = "create_musica.php";
    setcookie('notify', $msg, time() + 10, "aniplex/{$page}", 'localhost');
    header("location: {$page}");
    exit;