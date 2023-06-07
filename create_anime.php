<?php include('configAdmin.php');?>

<!doctype html>
<html lang="pt_BR">

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Formulário Cadastro de Anime</title>
  </head>

  <style>
    .card-registration .select-input.form-control[readonly]:not([disabled]) {
      font-size: 1rem;
      line-height: 2.15;
      padding-left: .75em;
      padding-right: .75em;
    }

    .card-registration .select-arrow {
      top: 13px;
    }

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

    .text-body {
      color: #edf0f1;
    }

  </style>

  <body style="background-color:#222529"><?php include("navbar.php");?>



    <section class="h-100">
      <form id="create-anime" action="createAnime.php" method="post" enctype="multipart/form-data">
        <div class="container py-5 h-100">
          <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col">
              <div class="card card-registration my-4">
                <div class="row g-0" style="background-color: #24252a;">
                  <div class="col-xl-6 d-none d-xl-block">
                    <svg width="100%" height="100%" xmlns="http://www.w3.org/2000/svg" role="img"
                      aria-label="Placeholder: Capa" preserveAspectRatio="xMidYMid slice" focusable="false">
                      <title>Placeholder</title>
                      <rect width="100%" height="100%" fill="#868e96"></rect><text x="50%" y="50%" fill="#dee2e6"
                        dy=".3em">Capa</text>
                    </svg>
                  </div>
                  <div class="col-xl-6">
                    <div class="card-body p-md-5" style="color: #edf0f1;">
                      <h3 class="mb-5 text-uppercase">Cadastro do Anime</h3>
                      <div class="row">
                        <div class="col-md-6 mb-4">
                          <div class="form-outline">
                            <input type="file" name="capa" id="capaId" required class="form-control form-control-lg" />
                            <label class="form-label" for="form3Example1m">Capa</label>
                          </div>
                        </div>
                        <div class="col-md-6 mb-4">
                          <div class="form-outline">
                            <input type="file" name="conteudo" id="conteudoId" required
                              class="form-control form-control-lg" />
                            <label class="form-label" for="form3Example1n">Arquivo</label>
                          </div>
                        </div>
                      </div>

                      <div class="form-outline mb-4">
                        <input type="text" name="anime" id="animeId" required class="form-control form-control-lg" />
                        <label class="form-label" for="form3Example8">Nome</label>
                      </div>

                      <div class="row">
                        <div class="col-md-6 mb-4">
                          <div class="form-outline">
                            <input type="number" name="episodios" id="episodiosId" required
                              class="form-control form-control-lg" />
                            <label class="form-label" for="form3Example1m1">Episodios</label>
                          </div>
                        </div>
                        <div class="col-md-6 mb-4">
                          <div class="form-outline">
                            <input type="number" name="temporadas" id="temporadasId" required
                              class="form-control form-control-lg" />
                            <label class="form-label" for="form3Example1m1">Temporadas</label>
                          </div>
                        </div>
                        <div class="form-outline mb-4">
                          <div class="form-outline">
                            <input type="text" name="categoria" id="categoriaId" class="form-control form-control-lg" />
                            <label class="form-label" for="form3Example1n1">Categoria</label>
                          </div>
                        </div>
                      </div>

                      <div class="form-outline mb-4">
                        <input type="number" name="nota" id="notaId" class="form-control form-control-lg" />
                        <label class="form-label" for="form3Example9">Nota</label>
                      </div>

                      <div class="form-outline mb-4">
                        <textarea style="height: 300px;" name="sumario" rows="8" id="sumarioId"
                          class="form-control form-control-lg"></textarea>
                        <label class="form-label" for="form3Example90">Sumario</label>
                      </div>

                      <div class="d-flex justify-content-end pt-3">
                        <button type="button" class="btn btn-light btn-lg">Resetar</button>
                        <button type="submit" class="btn btn-primary btn-lg ms-2">Cadastrar</button>
                      </div>

                      <div id="notify"><?= isset($_COOKIE['notify']) ? $_COOKIE['notify'] : '' ?></div>

                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </form>
    </section>


  <?php include("footer.php");?>
  <script src="js/base64.js"></script></body>
</html>