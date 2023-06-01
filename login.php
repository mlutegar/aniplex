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
</head>

<?php include("navbar.php")?>
<div class="banner"></div>

<style>
        .divider:after,
        .divider:before {
            content: "";
            flex: 1;
            height: 1px;
            background: #eee;
        }
        .h-custom {
            height: calc(100% - 73px);
        }
        @media (max-width: 450px) {
            .h-custom {
                height: 100%;
            }
        }

        #form-rect{
        background-color: #24252a;
        width: 90%;
        margin: auto;
        margin-top: 40px;
        color: #edf0f1;
        }

        .text-body{
            color: #edf0f1;
        }
    </style>

<body>
    <main>

        <div id="form-rect">
            <div>
            <section class="vh-100">
                <div class="container-fluid h-custom">
                    <div class="row d-flex justify-content-center align-items-center h-100">
                        <div class="col-md-8 col-lg-6 ">
                            <form id="form" action="systemLogin.php" method="post" class="loginform">
                                <!-- Email input -->
                                <div class="form-outline mb-4">
                                    <label class="form-label" for="email" style="font-size: 30px;">Email</label>
                                    <input type="email" name="email" id="email" placeholder="Informe o seu e-mail" class="form-control form-control-lg"/>
                                </div>

                                <!-- Password input -->
                                <div class="form-outline mb-3">
                                    <label class="form-label" for="form3Example4" style="font-size: 30px;">Senha</label>
                                    <input  type="password" name="password" id="password" placeholder="Informe a sua senha" class="form-control form-control-lg"/>
                                </div>

                                <div class="d-flex justify-content-between align-items-center">
                                    <!-- Checkbox -->
                                    <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="form1Example3" checked />
                                    <label class="form-check-label" for="form1Example3"> Lembrar de mim </label>
                                    </div>
                                    <a href="recover_password.php">Esqueceu a senha?</a>
                                </div>

                                <div class="text-center text-lg-start mt-4 d-grid gap-2">
                                    <button type="submit" value="Acessar" class="btn btn-primary" style="padding-left: 2.5rem; padding-right: 2.5rem;">Login</button>
                                    <p class="small fw-bold mt-2 pt-1 mb-0">Não tem uma conta? <a href="create_account.php"
                                        class="link-danger">Registrar</a></p>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </section>
            </div>
    </main>

<?php include('footer.php') ?></body>
</html>