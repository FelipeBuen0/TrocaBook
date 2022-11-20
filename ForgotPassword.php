<?php
    require_once 'api/database/Connection.php';
    if (!isset($_SESSION)) {
        session_start();
    }
    $message = '';
    $email = $_SESSION['email'];
    $sql = "SELECT SecurityAnswer, SecurityQuestion FROM Users WHERE email = '$email'";
    $result = $mysqli->query($sql);
    $records = $result->fetch_assoc();
    if (isset($_POST['submit'])) {
        $anwser = mysqli_real_escape_string($mysqli, $_POST['SecurityAnswer']); 
        $SecurityPassword = mysqli_real_escape_string($mysqli, $_POST['SecurityPassword']);
        $ConfirmSecurityPassword = mysqli_real_escape_string($mysqli, $_POST['ConfirmSecurityPassword']);
        if ($SecurityPassword != $ConfirmSecurityPassword) {
            echo "<div>As senhas não são iguais, tente novamente!</div>";
            return;
        }

        if ($anwser != $records['SecurityAnswer']) {
            echo "<div>Essa não é a sua resposta de segurança, tente novamente!</div>";
        } else {
            $SecurityPassword = base64_encode($SecurityPassword);
            $SecurityPassword = sha1($SecurityPassword);
            echo "<div>Sua resposta atualizada com sucesso! Sua senha agora é: ".$SecurityPassword."</div>";
            $sql = "UPDATE Users SET Password = '$SecurityPassword' WHERE email = '$email'";
            $result = $mysqli->query($sql);
            return $result ? header('Location: Login.php') : $message = "Houve um problema com o bando de dados, tente novamente mais tarde.";
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