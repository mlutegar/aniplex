<?php 
    include('config.php');
    require_once('repository/MusicaRepository.php');
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
    <?php foreach(fnLocalizaMusicaPorCategoria($categoria) as $musica): ?>
        <div id="manga-cover-above-container" style="display: none;"><div id="manga-above-cover" style="background-image: url('<?= $musica->capa?>')"></div></div>  
            <div id="card-manga">
                <div onclick="window.location.href = 'manga_details_musica.php?id=<?= $musica->id ?>'" id="manga-cover-container"><div id="manga-cover" style="background-image: url('<?= $musica->capa?>')"></div></div>

                <div id="manga-information-section">
                    <div id="manga-information">
                        <h1 onclick="window.location.href = 'manga_details_musica.php?id=<?= $musica->id ?>'"><?= $musica->titulo?></h1>
                        <div id="additional-info"><p id="nota"><?= $musica->nota?></p><p id="genero"><?= $musica->categoria?></p></div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>
    
<?php include('footer.php')?></body>

</html>