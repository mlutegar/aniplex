<?php 
    include('config.php');
    require_once('repository/MangaRepository.php');

    $animesList = [];
    $CategoriaList = [];

    foreach(fnListMangas() as $manga):             
        array_push($animesList, $manga->anime);
        array_push($CategoriaList, $manga->categoria);
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
                <?php foreach($CategoriaList as $manga): ?>
                    <div class="caixa-categoria">
                    <p><a href="categoria_detail.php?categoria=<?=$manga?>"><?=$manga?></a></p>
                    </div>    
                <?php endforeach;?>
            </div>
        </div>
    </div>

<?php include('footer.php')?></body>
</html>

