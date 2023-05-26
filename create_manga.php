<?php include('configAdmin.php');?>

<!doctype html>
<html lang="pt_BR">

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Formulário Cadastro de Manga</title>
    <link rel="stylesheet" href="css/login.css">
  </head>

  <body><?php include("navbar.php");?>
    <div>
        <div id="form-rect">
            <form id="create-manga" action="createManga.php" method="post" enctype="multipart/form-data">
            <h1>Cadastrar manga</h1>
                  <svg width="100%" height="360" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Capa" preserveAspectRatio="xMidYMid slice" focusable="false">
                    <title>Placeholder</title>
                    <rect width="100%" height="100%" fill="#868e96"></rect><text x="50%" y="50%" fill="#dee2e6" dy=".3em">Capa</text>
                  </svg>

                  <label>Capa <input class="upload-btn" type="file" name="capa" id="capaId" required></label>
                  <label>Manga<input class="upload-btn" type="file" name="conteudo" id="conteudoId" required></label>  

                  <label>Anime</label>
                  <input type="text" name="anime" id="animeId" required>

                  <label>Volume</label>
                  <input type="number" name="volume" id="volumeId" required>  
  
                  <label>Categoria</label>
                  <input type="text" name="categoria" id="categoriaId">
                  
                  <label>Nota</label>
                  <input type="number" name="nota" id="notaId">

                  <label>Sumário <textarea style="height: 300px;" name="sumario" rows="8" id="sumarioId"></textarea></label>

                  <input class="submit-btn" type="submit" value="Enviar">
                  <div id="notify"><?= isset($_COOKIE['notify']) ? $_COOKIE['notify'] : '' ?></div>
          </form>
        </div>
    </div>
  
  <?php include("footer.php");?>
  <script src="js/base64.js"></script></body>
</html>