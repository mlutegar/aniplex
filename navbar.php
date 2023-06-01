<link rel="stylesheet" href="css/style.css">
<link href="https://fonts.googleapis.com/css?family=Montserrat:500&display=swap" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
  integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
  integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

<style>
  body {
    background-color: #696969;
  }
</style>

<header>

  <nav class="navbar navbar-expand-lg" style="background-color: #d1ebf7;">
    <div class="container-fluid">
      <a class="navbar-brand" href="index.php"><img width="100" height="104" class="d-inline-block align-text-top"
          src="img/aniplex logo.png" alt="logo"> </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="index.php">Página inicial</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="mangas.php">Mangás</a></li>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Categorias
            </a>
            <div class="dropdown-content">
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="categorias.php">Mangas</a></li>
                <li><a class="dropdown-item" href="#">Animes</a></li>
                <li><a class="dropdown-item" href="#">Músicas</a></li>
                <li><a class="dropdown-item" href="#">Filmes</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="message_us.php">Fale conosco</a></li>
          </li>

          <?php if(empty(isset($_SESSION['login']))) : ?>
          <li class="nav-item">
            <a class="nav-link" href="login.php">Login</a></li>
          </li>
          <?php else: ?>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              <img class="iconlogin" src="img/login.png" alt="" width="30" height="30">
            </a>
            <div class="dropdown-content">
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                <?php if($_SESSION['login']->id == 1 && isset($_SESSION['login'])) echo  "<li><a class='dropdown-item' href='create_manga.php'>Cadastrar manga</a></li>" ?>
                <li><a class="dropdown-item" href="user.php">Página usuario</a></li>
                <?php if($_SESSION['login']->id == 1 && isset($_SESSION['login'])) echo  "<li><a class='dropdown-item' href='admin_list.php'>Administrador</a></li>" ?>
              </ul>
            </div>
          </li>
          <?php endif ?>
        </ul>
        <form id="formSearchTitulo" class="d-flex" role="search" method="post" action="mangaLocalize.php">
          <input class="form-control me-2" type="search" id="searchTitulo" name="titulo" placeholder="Faça sua pesquisa"
            aria-label="Search">
          <button class="btn btn btn-primary" type="submit">Search</button>
        </form>
      </div>
    </div>
  </nav>
</header>
