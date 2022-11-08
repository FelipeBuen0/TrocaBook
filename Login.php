<?php
include('api/database/Connection.php');
if (isset($_POST['login'])) {
    $login = mysqli_real_escape_string($mysqli, $_POST['login']);
    $Password = mysqli_real_escape_string($mysqli, $_POST['Password']);
    $sql = "SELECT Id, email, Username, Password
                  FROM LoginCredentials
                 WHERE Username = '$login' or Email = '$login'";
    $result = $mysqli->query($sql) or die('Falha no sistema, tente novamente mais tarde!');

    $rows = $result->num_rows;
    if ($rows == 1) {
        $row = $result->fetch_assoc();
        if (base64_encode($Password) != $row['Password']) {
            echo '<p class="bg-warning">Usuário ou senha não identificados';
            return;
        }
        if (!isset($_SESSION)) {
            session_start();
        }
        $_SESSION['id'] = $row['Id'];
        $_SESSION['username'] = $row['Username'];

        header('Location: index.php');
        return;
    }
    echo '<p class="bg-warning">Usuário ou senha não identificados';
    return ;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <script src="script/session.js"></script>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="master.css">
    <!-- JavaScript Bundle with Popper -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<script src="https://code.jquery.com/jquery-3.5.0.js"></script>

<body>
    <div class="ms-3 d-flex align-items-start justify-content-between">
        <form method="POST" class="form  mt-5" action="" style="width: 32rem;">
            <h1>TROCABOOK</h1>
            <br>
            <h4 class="mt-5 header-color">Bem vindo, é sempre um prazer!</h4>
            <br>
            <input name="login" type="text" class="username form-control" placeholder="Digite seu nome de usuário ou Email" required>
            <br>
            <input name="Password" type="Password" class="Password form-control" placeholder="Digite sua senha" required>
            <br>
            <div class="d-flex justify-content-between">
                <a href="register.php"><b>Não possui cadastro?</b></a>
                <a href="ForgotPassword.php "><b>Esqueceu a senha?</b></a>
            </div>
            <p id="log"></p>
            <input name="submit" type="submit" class="btn btn-outline-primary" value="Confirmar">
        </form>
        <div>
            <img class="bg-half" src="image/bg/BritishBar.jpg" style=" -moz-transform: scaleX(-1); -o-transform: scaleX(-1); -webkit-transform: scaleX(-1); transform: scaleX(-1);" alt="">
        </div>
    </div>
</body>

</html>