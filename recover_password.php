<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width ,initial-scale=1">
    <script src="https://kit.fontawesome.com/7c9e86ad48.js" crossorigin="anonymous"></script>  
    <title>Recuperação de senha</title>
    <link rel="stylesheet" href="css/login.css">
</head>

<body> 
    <?php include("navbar.php")?>

    <div class="banner"></div>

    <main>
    <div id="form-rect">
        <div id="esqueceu-senha">
            <form action="recoverPassword.php" method="post" id="form">
                <div class="mb-3 form-group">
                    <label>E-mail <input type="email" name="email" id="emailId" placeholder="Informe o e-mail"></label>
                </div>
                <div class="d-grid gap-2 d-md-block">
                    <input type="submit" class="submit-btn" value="Recuperar senha">
                    <input onclick="window.location='login.php'" type="button" class="submit-btn" value="Voltar ao login">
                </div>
                <?php if(isset($_COOKIE['notify'])) : ?>
                <div id="notify" class="form-text> <?= $_COOKIE['status']?><?= $_COOKIE['notify'] ?></div>
                <?php endif; ?>
            </form>
        </div>
    </div>
    </main>

<?php include('footer.php') ?></body>
</html>