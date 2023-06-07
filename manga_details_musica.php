<?php 
    include('config.php');
    require_once('repository/MusicaRepository.php');
    $notificacao = filter_input(INPUT_GET, 'notify', FILTER_SANITIZE_SPECIAL_CHARS);
    $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
    $musica = fnLocalizaMusicaPorId($id);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="css/manga_details.css">
    <title><?= $musica -> titulo?></title>
</head>
<body><?php include('navbar.php'); ?>

    <div class="banner"></div>

    <div style="margin-top: 100px;">
    <div id="manga-cover-container"><div id="manga-cover" style="background-image: url('<?= $musica->capa?>')"></div></div>
    </div>

    <div id="form-rect">
        <div class="vitrine_linha">
            <div class="div2 detail_info" style="text-align: left;">
                <p><strong>Nome da Musica:</strong><?= $musica->titulo ?></p><br><hr><br>
                <p><strong>Anime:</strong> <?= $musica->anime ?></p><br><hr><br>
                <p><strong>Duração:</strong> <?= $musica->duracao ?> Minutos</p><br><hr><br>
                <p><strong>Categoria:</strong> <?= $musica->categoria ?></p><br><hr><br>
                <p><strong>Nota:</strong>  <?= $musica->nota ?></p>
                    <form action="atualiza_nota.php">
                        <input type="number">
                        <input class="submit-btn" type="submit" value="Atualizar">
                    </form>
                
                <hr><br>

                <div class="btt">
        
            <a href="<?= $musica->conteudo ?>" class="submit-btn" download>BAIXE AQUi</a>
        </a>
        </div>
            </div>
            
        </div>


    </div>
    
</body><?php include("footer.php"); ?>
</html>