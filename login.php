<?php 
    include('config.php');
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width ,initial-scale=1">
    <script src="https://kit.fontawesome.com/7c9e86ad48.js" crossorigin="anonymous"></script>  
    <title>Login</title>
    <link rel="stylesheet" href="css/login.css">
</head>

<body> 
    <?php include("navbar.php")?>

    <div class="banner"></div>

    <main>
        <div id="form-rect">
            <div id="login">
                <form id="form" action="systemLogin.php" method="post" class="loginform">
                    <h1>Login</h1>

                    <label for="email">Email </label><br>
                    <input type="email" name="email" id="email" placeholder="Informe o seu e-mail">
                    <br>
                    <label for="password">Senha </label><br>
                    <input type="password" name="password" id="password" placeholder="Informe a sua senha">
                    <br>
                    <input class="submit-btn" type="submit" value="Acessar">
                </form>
                <hr>
                <input onclick="window.location='create_account.php'" type="button" class="submit-btn" value="Criar conta">
                <input onclick="window.location='recover_password.php'" type="button" class="submit-btn" value="Esqueceu a senha?">
            </div>
    </main>

<?php include('footer.php') ?></body>
</html>