<nav class="navbar navbar-expand-lg bg-danger bg-opacity-75">
        <div class="container-fluid">
            <a class="text-white navbar-brand">TROCABOOK</a>
            <div class="collapse navbar-collapse d-flex justify-content-center" id="navbarSupportedContent">
                <ul class="navbar-nav me-5">
                    <li class="nav-item me-5">
                        <a class="text-white nav-link active ms-5" aria-current="page" href="#">Perfil</a>
                    </li>
                    <li class="nav-item me-5">
                        <a class="text-white nav-link active ms-5" href="#">Equipe</a>
                    </li>
                    <li class="nav-item me-5">
                        <a class="text-white nav-link active ms-5" href="#">Sobre</a>
                    </li>
                </ul>
            </div>
            <a href="api/logout.php" class="btn btn-danger">Sair</a>
        </div>
    </nav>
    <div class="container-fluid">
        <a class="nav-link active">Olá, <?php echo $_SESSION['username']; ?>! O dia está lindo para ler hoje!</a>
    </div>