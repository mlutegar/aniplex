<?php
    require_once('repository/MangaRepository.php');
    $titulo = filter_input(INPUT_POST, 'titulo', FILTER_SANITIZE_SPECIAL_CHARS);

    header("location: listagem-de-mangas.php?titulo={$titulo}");
    exit;