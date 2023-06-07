<?php 
    include('config.php');
    require_once('repository/AnimeRepository.php');
    $notificacao = filter_input(INPUT_GET, 'notify', FILTER_SANITIZE_SPECIAL_CHARS);
    $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
    $anime = fnLocalizaAnimePorId($id);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="css/manga_details.css">
    <title><?= $anime -> titulo?></title>
</head>
<body><?php include('navbar.php'); ?>

    <div class="banner"></div>

    <div style="margin-top: 100px;">
    <div id="manga-cover-container"><div id="manga-cover" style="background-image: url('<?= $anime->capa?>')"></div></div>
    </div>

    <div id="form-rect">
        <div class="vitrine_linha">
            <div class="div2 detail_info" style="text-align: left;">
                <p><strong>Nome do Anime: </strong><?= $anime->titulo ?></p><br><hr><br>
                <p><strong>Anime:</strong> <?= $anime->anime ?></p><br><hr><br>
                <p><strong>Episodios:</strong> <?= $anime->episodios ?></p><br><hr><br>
                <p><strong>Temporadas:</strong> <?= $anime->temporadas ?></p><br><hr><br>
                <p><strong>Categoria:</strong> <?= $anime->categoria ?></p><br><hr><br>
                <p style="overflow-wrap: break-word;"><strong>Sumario:</strong>  <?= $anime->sumario ?></p><br><hr><br>
                <p><strong>Nota:</strong>  <?= $anime->nota ?></p>
                    <form action="atualiza_nota.php">
                        <input type="number">
                        <input class="submit-btn" type="submit" value="Atualizar">
                    </form>
                
                <hr><br>

                <div class="btt">
        
            <a href="<?= $anime->conteudo ?>" class="submit-btn" download>BAIXE AQUi</a>
        </a>
        </div>
            </div>
            
        </div>


    </div>
    
</body><?php include("footer.php"); ?>
</html>