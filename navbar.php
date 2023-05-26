<link rel="stylesheet" href="css/navbar.css">
<link rel="stylesheet" href="css/style.css">
<link href="https://fonts.googleapis.com/css?family=Montserrat:500&display=swap" rel="stylesheet">

<header>

    <div class="navbar">
        <div class="margin"></div>

        <div class="logo-box">
            <a class="logo" href="index.php"><img src="img/aniplex logo.png" alt="logo"> </a>
        </div>

        <div class="links-nav">
            <ul class="links">
                <li><a href="mangas.php">Mangás</a></li>
                <li><a href="categorias.php">Categorias</a></li>
                <li><a href="message_us.php">Fale conosco</a></li>
            </ul>
        </div>

        <div class="search">
            <div class="box-search">
                <form id="formSearchTitulo" role="search" method="post" action="mangaLocalize.php">
                    <input id="searchTitulo" class="search-txt" type="search" name="titulo" placeholder="Faça sua pesquisa" aria-label="Search">
                </form>
            </div>
        </div>

        <div class="account">
            <?php if(empty(isset($_SESSION['login']))) : ?>
                <a class="cta" href="login.php">Login</a>
            <?php else: ?>
                <div class="dropdown">
                    <a href="#"><img class="iconlogin" src="img/login.png" alt="" width="30" height="30"></a>

                    <div class="dropdown-content">
                        <ul>
                            <li><a class="logout" href="logout.php">Logout</a></li>
                            <?php if($_SESSION['login']->id == 1 && isset($_SESSION['login'])) echo  "<li><a class='logout' href='create_manga.php'>Cadastrar manga</a></li>" ?>  
                            <li><a class="logout" href="user.php">Página usuario</a></li>
                            <?php if($_SESSION['login']->id == 1 && isset($_SESSION['login'])) echo  "<li><a class='logout' href='admin_list.php'>Administrador</a></li>" ?>                                              
                        </ul>
                    </div>
                </div>
                <?php endif ?>
        </div>

        <div class="margin"></div>
    
    </div>


</header>

