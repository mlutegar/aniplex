<?php 
    include('config.php');
    require_once('repository/AnimeRepository.php');

    $animesList = [];
    $CategoriaList = [];

    foreach(fnListAnimes() as $animes):             
        array_push($animesList, $animes->anime);
        array_push($CategoriaList, $animes->categoria);
    endforeach;

    $animesList = array_unique($animesList);
    $CategoriaList = array_unique($CategoriaList);
?>

<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/categoria.css">
    <title>Página principal</title>
</head>
<body>
    <?php include("navbar.php")?>

    <div class="categoria-acesso">
    
        <div class="title-categoria">
            <div class="title">
                <p>Categorias</p>
            </div>
        </div>

        <div class="nome-manga">
            <div class="nome-vitrine">
                <?php foreach($CategoriaList as $animes): ?>
                    <div class="caixa-categoria">
                    <p><a href="categoria_detail_animes.php?categoria=<?=$animes?>"><?=$animes?></a></p>
                    </div>    
                <?php endforeach;?>
            </div>
        </div>
    </div>

<?php include('footer.php')?></body>
</html>

