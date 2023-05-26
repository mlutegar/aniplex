<?php 
    include('config.php');
    require_once('repository/MangaRepository.php');
    $anime = filter_input(INPUT_GET, 'anime', FILTER_SANITIZE_SPECIAL_CHARS);
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

    <?php foreach(fnLocalizaMangaPorAnime($anime) as $manga): ?>
        <div id="mangas">            
            <div id="card-manga">
                <div id="manga-cover">
                    <a href="manga_details.php?id=<?= $manga->id?>"><img class="cropped-vitrine" src="<?= $manga->capa?>" alt=""></a>
                </div>
                <div id="manga-information-section">
                    <div id="manga-information">
                        <h1><?= $manga->anime?></h1>
                        <div id="additional-info"><p id="nota"><?= $manga->nota?></p><p id="genero"><?= $manga->anime?></p></div>
                    </div>
                    <p id="sinopse">
                        <?= $manga->sumario?>
                    </p>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
    
<?php include('footer.php')?></body>

</html>