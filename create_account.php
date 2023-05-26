<?php 

include('config.php');
require_once('repository/loginrepository.php');

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width ,initial-scale=1">
    <script src="https://kit.fontawesome.com/7c9e86ad48.js" crossorigin="anonymous"></script>  
    <title>Cadastro</title>
    <link rel="stylesheet" href="css/login.css">
</head>

<body> 
    <?php include("navbar.php")?>

    <div class="banner"></div>

    <main>
        <div id="form-rect">
            <h1>Criar conta</h1>

            <div id="create_acc">
            <form action="createAccount.php" method="post" id="form">
                <div>
                    <label for="emailId" class="form-label">E-mail</label>
                    <input type="email" name="email" id="emailId" class="form-control" placeholder="Informe o e-mail" required>
                </div>
                <div>
                    <label for="senhaId" class="form-label">Usuário</label>
                    <input type="text" name="user" id="userId" class="form-control" placeholder="Informe o seu nome de usúario" required>
                </div>
                <div>
                    <label for="ageId" class="form-label">Idade</label>
                    <input type="text" name="age" id="ageId" class="form-control" placeholder="Informe a sua idade" required>
                </div>
                <div>
                    <label for="senhaId" class="form-label">Senha</label>
                    <input type="password" name="senha" id="senhaId" class="form-control" placeholder="Informe a senha" required>
                </div>
 
                <div>
                    <input type="submit" class="submit-btn" value="Criar conta">
                    <hr>
                  <input onclick="window.location='login.php'" type="button" class="submit-btn" value="Já tem conta?">
                </div>
                <div id="notify" class="form-text text-capitalize fs-4"><?= isset($_COOKIE['notify']) ? $_COOKIE['notify'] : '' ?></div>
            </form>

        </div>
    </main>

<?php include('footer.php') ?></body>
</html>