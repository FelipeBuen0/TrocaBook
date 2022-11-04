<?php
  include ('api/database/Connection.php');
    if (isset($_POST['user']))
    {
        $user = mysqli_real_escape_string($mysqli, $_POST['user']);
        $Password = mysqli_real_escape_string($mysqli, $_POST['Password']);
        //$Password = password_hash($Plain_Password, PASSWORD_DEFAULT); 
        $sql = "SELECT Id, Username, Password
                  FROM LoginCredentials
                 WHERE Username = '$user' AND Password = '$Password'";
        $result = $mysqli -> query($sql) or die ('Falha no sistema, tente novamente mais tarde!');

        $rows = $result->num_rows;

        if ($rows == 1) {
            $row = $result -> fetch_assoc();
            if (!isset($_SESSION)) {
                session_start();
            }
            $_SESSION['id'] = $row['Id'];
            $_SESSION['username'] = $row['Username'];
            header('Location: index.php');
        }
        else {
            echo 'Usuário ou senha não identificados';  
        }
    }  
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>
<script src="https://code.jquery.com/jquery-3.5.0.js"></script>
    <body>
        <div id="content">
            <div class="container">
                <br>
                <form method = "POST" class="form container" style="width: 32rem;">
                    <h1 class="">Login</h1>
                    <br>
                    <label for="user" class="form-label">Nome de usuário</label>
                    <input name="user" type="text" class= "username form-control" required>
                    <br>
                    <label for="Password" class="form-label">Senha</label>
                    <input name="Password" type="Password" class= "Password form-control" required>
                    <br>
                    <div class="d-flex justify-content-evenly">
                        <a href="register.php"><b>Não possui cadastro?</b></a>
                        <a href="ForgotPassword.php"><b>Esqueceu a senha?</b></a>
                    </div>
                    <p id="log"></p>
                    <input name="submit"  type="submit" class="btn btn-outline-primary" value="Confirmar">
                </form>
            </div>
        </div>
    </body>
</html>