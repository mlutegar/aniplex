<?php
    require_once('repository/MusicaRepository.php');
    $titulo = filter_input(INPUT_POST, 'titulo', FILTER_SANITIZE_SPECIAL_CHARS);

    header("location: admin_list_musicas.php?titulo={$titulo}");
    exit;