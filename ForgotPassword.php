<?php
    require_once 'api/database/Connection.php';
    if (!isset($_SESSION)) {
        session_start();
        // header('Location: EmailVerification.php');
    }
    $message = '';
    $email = $_SESSION['email'];
    $sql = "SELECT SecurityAnswer, SecurityQuestion FROM logincredentials WHERE email = '$email'";
    $result = $mysqli->query($sql);
    $records = $result->fetch_assoc();
    if (isset($_POST['submit'])) {
        $anwser = mysqli_real_escape_string($mysqli, $_POST['SecurityAnswer']);
        $SecurityPassword = mysqli_real_escape_string($mysqli, $_POST['SecurityPassword']);
        $ConfirmSecurityPassword = mysqli_real_escape_string($mysqli, $_POST['ConfirmSecurityPassword']);

        if ($SecurityPassword != $ConfirmSecurityPassword) {
            return $message = "<h1>As senhas não são iguais, tente novamente!</h1>";
        }

        if ($anwser == $records['SecurityAnswer']) {
            $sql = "UPDATE logincredentials SET Password = '$SecurityPassword' WHERE email = '$email'";
            $result = $mysqli->query($sql);
            return $result == true ? header('Location: Login.php') : $message = "Houve um problema com o bando de dados, tente novamente mais tarde.";
        }    
    }
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="master.css">
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
                <p style="color: tomato;" class="my-3"><?php echo $message?></p>
                <h6><?php echo $records['SecurityQuestion']?></h6>
                <input name="SecurityAnswer" type="Text" class="form-control" required placeholder="Digite sua resposta">
                <br>
                <input name="SecurityPassword" type="password" class="form-control" required placeholder="Digite sua nova senha">
                <br>
                <input name="ConfirmSecurityPassword" type="password" class="form-control" required placeholder="Digite novamente sua senha">
                <br>
                <input name="submit" type="submit" class="btn btn-outline-primary" value="Confirmar">
            </form>
        </div>
    </div>
</body>
</html> 