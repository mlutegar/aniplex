<?php 
    include('config.php');
    require_once('repository/FilmeRepository.php');

    $filmesList = [];
    $CategoriaList = [];

    foreach(fnListFilmes() as $filme):             
        array_push($filmesList, $filme->anime);
        array_push($CategoriaList, $filme->categoria);
    endforeach;

    $animesList = array_unique($filmesList);
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
    <title>Filmes</title>
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
                <?php foreach($CategoriaList as $filme): ?>
                    <div class="caixa-categoria">
                    <p><a href="categoria_detail_filmes.php?categoria=<?=$filme?>"><?=$filme?></a></p>
                    </div>    
                <?php endforeach;?>
            </div>
        </div>
    </div>

<?php include('footer.php')?></body>
</html>

