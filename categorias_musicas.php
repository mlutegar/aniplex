<?php 
    include('config.php');
    require_once('repository/MusicaRepository.php');

    $musicasList = [];
    $CategoriaList = [];

    foreach(fnListMusicas() as $musica):             
        array_push($musicasList, $musica->anime);
        array_push($CategoriaList, $musica->categoria);
    endforeach;

    $musicasList = array_unique($musicasList);
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
    <title>Musicas</title>
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
                <?php foreach($CategoriaList as $musica): ?>
                    <div class="caixa-categoria">
                    <p><a href="categoria_detail_musica.php?categoria=<?=$musica?>"><?=$musica?></a></p>
                    </div>    
                <?php endforeach;?>
            </div>
        </div>
    </div>

<?php include('footer.php')?></body>
</html>

