<?php
    include('config.php');
    require_once('repository/FIlmeRepository.php');
    $notificacao = filter_input(INPUT_GET, 'notify', FILTER_SANITIZE_SPECIAL_CHARS);
    $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
    $filme = fnLocalizaFilmePorId($id);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="css/manga_details.css">
    <title><?= $filme -> titulo?></title>
</head>
<body><?php include('navbar.php'); ?>

    <div class="banner"></div>

    <div class="cointainer m-5 p-5">

<div class="card mb-3">
    <div class="row g-0">
        <div class="col-md-4">
            <img src="<?= $filme->capa?>" class=" img-fluid rounded-start" alt="...">
        </div>
        <div class="col-md-8">
            <div class="card-body " style="background-color: #24252a; color: white;">
                <h5 class="card-title"><?= $filme->titulo ?></h5>
                <p><strong>Nome do Filme: </strong><?= $filme->titulo ?></p><br><hr><br>
                <p><strong>Diretor:</strong> <?= $filme->diretor ?></p><br><hr><br>
                <p><strong>Duração:</strong> <?= $filme->duracao ?></p><br><hr><br>
                <p><strong>Categoria:</strong> <?= $filme->categoria ?></p><br><hr><br>
                <p style="overflow-wrap: break-word;"><strong>Sumario:</strong>  <?= $filme->sumario ?></p><br><hr><br>
                <p><strong>Nota:</strong>  <?= $filme->nota ?></p>
                <a href="<?= $filme->conteudo ?>" class="btn btn-primary" download>BAIXE AQUI</a>
            </div>
        </div>
    </div>
</div>
</div>






</body><?php include("footer.php"); ?>
</html>