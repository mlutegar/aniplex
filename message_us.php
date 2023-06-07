<?php include('config.php');?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width ,initial-scale=1">
    <script src="https://kit.fontawesome.com/7c9e86ad48.js" crossorigin="anonymous"></script>
    <title>Fale conosco</title>
    <link rel="stylesheet" href="css/message_us.css">
</head>

<body>
    <?php include("navbar.php")?>

    <div class="banner"></div>

    <div class="cointainer m-5 p-5" style="background-color: #d4ebf7;">
        <form method="post" action="sendMessageUsEmail.php">
            <div>
            <div class="row mb-3">
                <h2>Fale Conosco</h2>
            </div>
            <div class="row mb-3">
                <label class="form-label">Nome</label>
                <input class="form-control" type="text" placeholder="Informe o seu nome" name="name" required>
            </div>
            <div class="row mb-3">
                <label class="form-label">Email</label>
                <input class="form-control" type="email" placeholder="Informe o seu e-mail" name="email" required>
            </div>
            <div class="row mb-3">
                <label class="form-label">Assunto</label>
                <input class="form-control" type="text" placeholder="Informe o assunto" name="subject" required>
            </div>
            <div class="row mb-3">
                <label class="form-label">Mensagem</label>
                <textarea class="form-control" name="message" id="my-text"></textarea>
            </div>
            <div class="row mb-3">
                <button class="btn btn-primary" type="submit">Enviar</button>
            </div>
            </div>
        </form>

    </div>

    <?php include('footer.php') ?>
</body>

</html>