<?php

require('api/database/Connection.php');
if (isset($_POST['submit'])) {
    $email = mysqli_real_escape_string($mysqli, $_POST['email']);

    $sql = "SELECT email FROM `logincredentials` WHERE email = '$email'";
    $obj = $mysqli->query($sql);
    $records = $obj->fetch_assoc();
    if ($obj->num_rows > 0) {
        if (!isset($_SESSION)) {
            session_start();
        }
        $_SESSION['email'] = $email;
        return header('location: ForgotPassword.php');
    } else {
        echo "<div class='AlertEmail'>E-mail não encontrado!... Tente novamente</div>";
    }
}

?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="master.css">
    <link rel="shortcut icon" href="../res/favicon/favicon.ico" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>
<script src="https://code.jquery.com/jquery-3.5.0.js"></script>

<body>
    <div id="content">
        <div class="container">
            <br>
            <form action="" method="POST" class="form container" style="width: 40rem;">
                <h1>Olá, leitor!</h1>
                <p>Vimos que você está com dificuldades para se logar, isto não será um problema... Preencha o e-mail e redefina sua senha! <br><br> - Atenciosamente, Equipe Trocabook!</p>
                <br>
                <input name="email" type="email" class="email" required placeholder="Digite seu e-mail">
                <br>
                <input name="submit" type="submit" class="btn btn-outline-primary" value="Confirmar">
            </form>
        </div>
    </div>
</body>
</html> 