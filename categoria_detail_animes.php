<?php
    include('config.php');
    require_once('repository/AnimeRepository.php');
    $categoria = filter_input(INPUT_GET, 'categoria', FILTER_SANITIZE_SPECIAL_CHARS);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width ,initial-scale=1">
    <script src="https://kit.fontawesome.com/7c9e86ad48.js" crossorigin="anonymous"></script>
    <title>Mangás</title>
    <link rel="stylesheet" href="css/mangas.css">
</head>

<body> <?php include("navbar.php")?>

<div id="mangas">
    <?php foreach(fnLocalizaAnimePorCategoria($categoria) as $anime): ?>
        <div id="manga-cover-above-container" style="display: none;"><div id="manga-above-cover" style="background-image: url('<?= $anime->capa?>')"></div></div>
            <div id="card-manga">
                <div onclick="window.location.href = 'manga_details_animes.php?id=<?= $anime->id ?>'" id="manga-cover-container"><div id="manga-cover" style="background-image: url('<?= $anime->capa?>')"></div></div>

                <div id="manga-information-section">
                    <div id="manga-information">
                        <h1 onclick="window.location.href = 'manga_details_animes.php?id=<?= $anime->id ?>'"><?= $anime->titulo?></h1>
                        <div id="additional-info"><p id="nota"><?= $anime->nota?></p><p id="genero"><?= $anime->categoria?></p></div>

                    <p id="sinopse">
                        <?= $anime->sumario?>
                    </p>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>

<?php include('footer.php')?></body>

</html>