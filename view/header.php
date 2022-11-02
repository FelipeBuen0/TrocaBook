<nav class="navbar navbar-expand-sm navbar-dark bg-dark sticky-top">
        <div class="container-fluid">
            <a class="text-white navbar-brand">TROCABOOK</a>
            
            <form class="d-flex" role="search">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
            <div id="dropdown">
            <div id="dropbtn"><img src="res/app-img/icons/bookmark.png " class="img-fit icon-fit"></div>
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