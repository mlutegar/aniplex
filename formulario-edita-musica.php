<?php
    include('configAdmin.php');
    require_once('repository/MusicaRepository.php');
    $id = $_SESSION['id'];
    $musica = fnLocalizaMusicaPorId($id);
?>

<!doctype html>
<html lang="pt_BR">

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Formulário Edição de Manga</title>
    <<link rel="stylesheet" href="css/login.css">
  </head>

  <body><?php include("navbar.php");?>
  
    <div>
        <div id="form-rect">
            <form id="editaMusica" action="editaMusica.php" method="post" enctype="multipart/form-data">
            <h1>Editar Musica</h1>
              <div style="width: 100%;">
                <a href="#" onclick="return confirm ('Deseja realmente trocar a capa?') ? trocarImagem() : '';"><img src="<?= $musica->capa ?>" id="manga-cover"></a>
                <p style="text-align:center"><?= $musica->titulo ?></p>
              </div>
                <input type="hidden" name="idMusica" id="musicaId" value="<?= $musica->id ?>">

                <label>Anime</label>
                <input type="text" name="nome_musica" id="nome_musicaId" value="<?= $musica->nome_musica ?>" required>

                <label>Anime</label>
                <input type="text" name="anime" id="animeId" value="<?= $musica->anime ?>" required>

                <label>Volume</label>
                <input type="number" name="duracao" id="duracaoId" value="<?= $musica->duracao ?>" required>

                <label>Categoria</label>
                <input type="text" name="categoria" id="categoriaId" value="<?= $musica->categoria?>">

                <label>Nota</label>
                <input type="number" name="nota" id="notaId" value="<?= $musica->nota?>">

                <input class="submit-btn" type="submit" value="Enviar">
                <div id="notify"><?= isset($_COOKIE['notify']) ? $_COOKIE['notify'] : '' ?></div>
          </form>
        </div>
    </div>

  <?php include("footer.php");?>
  <script src="js/base64.js"></script></body>
  <script>
    function trocarImagem(){
      window.location.href = "capa_change.php";
    }
  </script>
</html>