<?php
    include('configAdmin.php');
    require_once('repository/AnimeRepository.php');
    $id = $_SESSION['id'];
    $anime = fnLocalizaAnimePorId($id);
?>

<!doctype html>
<html lang="pt_BR">

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Formulário Edição de Anime</title>
    <<link rel="stylesheet" href="css/login.css">
  </head>

  <body><?php include("navbar.php");?>
  
    <div>
        <div id="form-rect">
            <form id="editaAnime" action="editaAnime.php" method="post" enctype="multipart/form-data">
            <h1>Editar Anime</h1>
              <div style="width: 100%;">
                <a href="#" onclick="return confirm ('Deseja realmente trocar a capa?') ? trocarImagem() : '';"><img src="<?= $anime->capa ?>" id="manga-cover"></a>
                <p style="text-align:center"><?= $anime->titulo ?></p>
              </div>
                <input type="hidden" name="idAnime" id="animeId" value="<?= $anime->id ?>">

                <label>Anime</label>
                <input type="text" name="anime" id="animeId" value="<?= $anime->anime ?>" required>

                <label>Episodios</label>
                <input type="number" name="episodios" id="episodiosId" value="<?= $anime->episodios ?>" required>
                
                <label>Temporadas</label>
                <input type="number" name="temporadas" id="temporadasId" value="<?= $anime->temporadas ?>" required>

                <label>Categoria</label>
                <input type="text" name="categoria" id="categoriaId" value="<?= $anime->categoria?>">

                <label>Nota</label>
                <input type="number" name="nota" id="notaId" value="<?= $anime->nota?>">

                <label>Sumário <input style="height: 300px;" name="sumario" rows="8" id="sumarioId" value="<?= $anime->sumario ?>"></label>

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