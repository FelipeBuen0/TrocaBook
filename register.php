<?php
  include ('api/database/Connection.php');
    if (isset($_POST['user']))
    {
      echo "Testando funcionalidade";
        $user = mysqli_real_escape_string($mysqli, $_POST['user']);
        $email = mysqli_real_escape_string($mysqli, $_POST['email']);
        $pass = mysqli_real_escape_string($mysqli, $_POST['pass']);
        strtolower($email);
        $insert = "INSERT INTO logincredentials (Email, Username, Pass) VALUES ('$email', '$user', '$pass'); ";
        $a = $mysqli -> query($insert) or die('Falha no sistema, tente novamente mais tarde!');
        
        if ($a) {
        $query = "SELECT LoginId, Username FROM logincredentials WHERE Email = '$email' AND Pass = '$pass';";

        $result = $mysqli -> query($query) or die('Falha no sistema, tente novamente mais tarde!');

        $rows = $result->num_rows;
        if ($rows == 1) {
            $credentials = $result->fetch_assoc();
            if (!isset($_SESSION)) {
                session_start();
            }
            $_SESSION['id'] = $credentials['LoginId'];
            $_SESSION['username'] = $credentials['Username'];
            if ($_SESSION['id']) {
                header('Location: index.php');
            }
        } else {
            echo 'Usuário ou senha não identificados';  
        }
        }   
    }
  // }    
?>

<!-- SEÇÃO HTML -->

<!DOCTYPE html>
<html lang="en">
<head>
    <script src="script/session.js"></script>
    <meta charset="UTF-8">
</head>
<script src="https://code.jquery.com/jquery-3.5.0.js"></script>
    <body>
        <div id="content">
            <div class="container">
                <h1>Cadastro</h1>
                <form method="POST" action="register.php" class='form'>
                    <input name="email" type="email" class= "email">
                    <br>
                    <input name="user" type="text" class= "username">
                    <br>
                    <input name="pass" type="password" class= "password">
                    <br>
                    <label for="chkBox">Manter-se conectado?</label>
                    <input name="chkBox" type="checkbox" class= "chekbox">
                    <br>
                    <a href="Login.php"><b>Ja possui uma conta</b></a>
                    <br>
                    <p id="log"></p>
                    <input class = 'btn_submit' type="submit" value="Confirmar">
                </form>
            </div>
        </div>
    </body>
</html>