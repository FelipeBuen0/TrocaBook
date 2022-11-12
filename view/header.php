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
                    <a href="view/AtualizarPerfil.php">Perfil<img class="icon-align" class="icon-align" src="res/icons/Person-fill.svg"></a>
                    <a href="view/MeusLivros.php">Livros <img class="icon-align" src="res/icons/Book-half.svg"> </a>
                    <a href="#">Equipe<img class="icon-align" src="res/icons/People-fill.svg"></a>
                    <a href="#">Sobre <img class="icon-align" src="res/icons/About.svg"></a>
                    <a href="api/logout.php" id = "exit-button" >Sair<img class="icon-align" src="res/icons/Exit.svg"> </a>
                </div>
            </div>
        </div>
    </nav>