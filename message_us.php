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

    <main>
        <div id="form-rect">

            <form method="post" action="sendMessageUsEmail.php">
                <p style="font-size: 50px; margin-bottom: 20px;">Fale Conosco</p>

                <label>Nome <br><input type="text" placeholder="Informe o seu nome" name="name" required></label>
                <br>
                <label>Email <br><input type="email" placeholder="Informe o seu e-mail" name="email" required></label>
                <br>
                <label>Assunto <br><input type="text" placeholder="Informe o assunto" name="subject" required></label>
                <br>
                <label>Mensagem <br><textarea name="message" style="height: 300px;" rows="4" cols="50" style="font-size: 12pt" id="my-text">Escreva sua mensagem</textarea></label>
                <br>
                <input class="submit-btn" type="submit" value="Enviar">
            </form>
        </div>
    </main>

<?php include('footer.php') ?></body>
</html>