<nav class="navbar navbar-expand-sm navbar-dark bg-dark sticky-top">
        <div class="container-fluid">
            <a class="text-white navbar-brand">TROCABOOK</a>
            
            <form class="d-flex" method="GET" action="view/post.php" role="search">
                <input class="form-control me-2" type="search" placeholder="Procure um livro" aria-label="Search">
                <button class="btn btn-warning" type="submit"><img src="res/icons/search.svg" alt=""></button>
            </form>
            <div id="dropdown">
            <div id="dropbtn" class="btn btn-warning"><img src="res/icons/bookmark-fill.svg " class="img-fit icon-fit"></div>
                <div id="dropdown-content">
                    <a href="view/AtualizarPerfil.php">Atualizar Perfil</a>
                    <a href="view/MeusLivros.php">Meus Livros</a>
                    <a href="#">Equipe</a>
                    <a href="#">Sobre</a>
                    <a href="api/logout.php" id = "exit-button" >Sair </a>
                </div>
            </div>
        </div>
    </nav>
    <!-- <div class="container-fluid">
        <a class="nav-link active">Olá, <?php //echo $_SESSION['username']; ?>! O dia está lindo para ler hoje!</a>
    </div> -->