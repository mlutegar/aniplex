<?php 

include('config.php');
require_once('repository/LoginRepository.php');

$id = $_SESSION['login']->id;
$user = fnLocalizaUserPorId($id);

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width ,initial-scale=1">
    <script src="https://kit.fontawesome.com/7c9e86ad48.js" crossorigin="anonymous"></script>    
    <title>Usuário</title>
    <link rel="stylesheet" href="css/user.css">
</head>

<body> <?php include("navbar.php")?>
    <main>
        <div id="rect">
            <div id="information-rect">     
                <h1>Perfil de usuário</h1>
                <div style="margin: 30px 0"></div>
                <p class="info">Nome: <?=$_SESSION['login']->user?></p> 
                <div style="margin: 30px 0"></div>
                <p class="info">Idade: <?=$_SESSION['login']->age?></p> 
                <div style="margin: 30px 0"></div>
                <p class="info">Cadastrado desde: <?=$_SESSION['login']->created_at?></p> 
                <div style="margin: 70px 0"></div>
                <input class="submit-btn" type="button" onclick="window.location='edit_user.php'" value="Editar informações">
            </div>
        </div>
    </main>

    <div id="notify" class="form-text text-capitalize fs-4"><?= isset($_COOKIE['notify']) ? $_COOKIE['notify'] : '' ?></div>

<?php include('footer.php') ?></body>
</html>