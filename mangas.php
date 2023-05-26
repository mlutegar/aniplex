<?php 
    include('config.php');
    require_once('repository/MangaRepository.php');
    $titulo = filter_input(INPUT_GET, 'titulo', FILTER_SANITIZE_SPECIAL_CHARS);
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

    <div id="search-bar">
        <form id="formSearchTitulo" role="search" method="post" action="mangaLocalize.php">
            <input id="search-text" type="search" name="titulo" placeholder="Procure pelo nome do mangá">
            <button id="search-btn"><img src="img/lupa.png" width="20px" height="20px" alt=""></button>
        </form>
    </div>

    <div id="mangas">   
        <?php foreach(fnLocalizaMangaPorTitulo($titulo) as $manga): ?>  
            <div id="manga-cover-above-container" style="display: none;"><div id="manga-above-cover" style="background-image: url('<?= $manga->capa?>')"></div></div>  
            <div id="card-manga">
            <div onclick="window.location.href = 'manga_details.php?id=<?= $manga->id ?>'" id="manga-cover-container"><div id="manga-cover" style="background-image: url('<?= $manga->capa?>')"></div></div>

                <div id="manga-information-section">
                    <div id="manga-information">
                        <h1 onclick="window.location.href = 'manga_details.php?id=<?= $manga->id ?>'"><?= $manga->titulo?></h1>
                        <div id="additional-info"><p id="nota"><?= $manga->nota?></p><p id="genero"><?= $manga->categoria?></p></div>
                    </div>
                    <p id="sinopse">
                        <?= $manga->sumario?>
                    </p>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
    
<?php include('footer.php')?></body>

</html>