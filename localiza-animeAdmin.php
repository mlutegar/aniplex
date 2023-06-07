<?php
    require_once('repository/AnimeRepository.php');
    $titulo = filter_input(INPUT_POST, 'titulo', FILTER_SANITIZE_SPECIAL_CHARS);

    header("location: admin_list_animes.php?titulo={$titulo}");
    exit;