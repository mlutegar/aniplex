<?php
    include('configAdmin.php');
    require_once('repository/FilmeRepository.php');
    $id = $_SESSION['id'];
    $filme = fnLocalizaFilmePorId($id);
?>

<!doctype html>
<html lang="pt_BR">

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Formulário Edição de Filme</title>
    <<link rel="stylesheet" href="css/login.css">
  </head>

  <body><?php include("navbar.php");?>
  
    <div>
        <div id="form-rect">
            <form id="editaFilme" action="editaFilme.php" method="post" enctype="multipart/form-data">
            <h1>Editar Filme</h1>
              <div style="width: 100%;">
                <a href="#" onclick="return confirm ('Deseja realmente trocar a capa?') ? trocarImagem() : '';"><img src="<?= $filme->capa ?>" id="filme-cover"></a>
                <p style="text-align:center"><?= $filme->titulo ?></p>
              </div>
                <input type="hidden" name="idFilme" id="filmeId" value="<?= $filme->id ?>">

                <label>Anime</label>
                <input type="text" name="anime" id="animeId" value="<?= $filme->anime ?>" required>

                <label>Diretor</label>
                <input type="text" name="diretor" id="diretorId" value="<?= $filme->diretor ?>" required>
                
                <label>Duração</label>
                <input type="number" name="duracao" id="duracaoId" value="<?= $filme->duracao ?>" required>

                <label>Categoria</label>
                <input type="text" name="categoria" id="categoriaId" value="<?= $filme->categoria?>">

                <label>Nota</label>
                <input type="number" name="nota" id="notaId" value="<?= $filme->nota?>">

                <label>Sumário <input style="height: 300px;" name="sumario" rows="8" id="sumarioId" value="<?= $filme->sumario ?>"></label>

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