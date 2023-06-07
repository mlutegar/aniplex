<?php 
    include('configAdmin.php');
    require_once('repository/AnimeRepository.php');

    $titulo = filter_input(INPUT_GET, 'titulo', FILTER_SANITIZE_SPECIAL_CHARS);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listagem</title>
</head>
<body> <?php include('navbar.php'); ?>

    <div style="padding: 75px; margin: auto; width: 80%;">
    <div style="width: 100%; margin-left: 1.5%; margin-bottom: 5%">
            <form id="formSearchTitulo" role="search" method="post" action="localiza-animeAdmin.php">
                <input style="width: 95%;" id="searchTitulo" class="form-control me-2" size="21" name="titulo" type="search" placeholder="Procurar" aria-label="Search">
            </form>
        </div>
        <table width=100%>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Titulo</th>
                    <th>Anime</th>
                    <th>Episodios</th>
                    <th>Temporadas</th>
                    <th>Capa</th>
                    <th>Conteudo</th>
                    <th>Data cadastro</th>
                    <th colspan="2">Gerenciar</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach(fnLocalizaAnimePorTitulo($titulo) as $anime): ?>
                    <tr>
                        <td><?= $anime->id ?></td>
                        <td><?= $anime->titulo ?></td>
                        <td><?= $anime->anime ?></td>
                        <td><?= $anime->episodios ?></td>
                        <td><?= $anime->temporadas ?> Temporadas</td>
                        <td><img style="  width: 100px; height: 100px; object-fit: cover; border: 4px solid black;" src="<?= $anime->capa ?>"></td>
                        <td><a href="<?= $anime->conteudo ?>" download="">Baixar conteudo</a></td>
                        <td><?= $anime->created_at ?></td>
                        <td><a href="#" onclick="gerirManga(<?= $anime->id ?>, 'edit');">Editar</a></td>
                        <td><a style="color: red;" onclick="return confirm ('Deseja realmente excluir?') ? gerirManga(<?= $anime->id?>, 'del') : '';" href="#">Excluir</a></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <?php if(isset($notificacao)) : ?>
        <tfoot>
            <tr>
            <td colspan="7"><?= $_COOKIE['notify'] ?></td>
            </tr>
        </tfoot>
    <?php endif; ?>
    
</body> <?php include("footer.php"); ?>
<script>
        window.post = (data) => {
            return fetch(
                'set-session.php',
                {
                    method: 'POST',
                    headers: {'Content-Type': 'application/json'},
                    body: JSON.stringify(data)
                }
            )
            .then(response => {
                console.log(`Requisição completa! Resposta:`, response);
            });
        }

        function gerirManga(id, action) {
            
            post({data : id});

            url = 'excluirAnime.php';
            if(action === 'edit')
                url = 'formulario-edita-anime.php';
                
            window.location.href = url;
        }
    </script>
</html>

