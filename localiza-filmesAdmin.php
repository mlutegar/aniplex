<?php
    require_once('repository/FilmeRepository.php');
    $titulo = filter_input(INPUT_POST, 'titulo', FILTER_SANITIZE_SPECIAL_CHARS);

    header("location: admin_list_filmes.php?titulo={$titulo}");
    exit;