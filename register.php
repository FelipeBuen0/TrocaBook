<?php
  include ('api/database/Connection.php');
    if (isset($_POST['user']))
    {
        $user = mysqli_real_escape_string($mysqli, $_POST['user']);
        $email = mysqli_real_escape_string($mysqli, $_POST['email']);
        $Password = mysqli_real_escape_string($mysqli, $_POST['Password']);

        $sql = "SELECT *
                  FROM LoginCredentials WHERE Email = '$email' OR Username = '$user'";

        $result = $mysqli -> query($sql) or die ('Falha no sistema, tente novamente mais tarde!');
        if (!$result->num_rows > 0) {
            // $Password = password_hash($Plain_Password, PASSWORD_DEFAULT); TODO: Criptografia de senhas
            strtolower($email);
            $insert = "INSERT INTO LoginCredentials 
                                   (
                                    Email
                                   ,Username
                                   ,Password
                                   ,CreatedAt
                                   )
                            VALUES (
                                    '$email'
                                   ,'$user'
                                   ,'$Password'
                                   , NOW()
                                   );";


            $a = $mysqli -> query($insert) or die('Falha no sistema, tente novamente mais tarde!');
        
            if ($a) {

                $query = "SELECT Id, Username FROM LoginCredentials ORDER BY Id DESC LIMIT 1";

                $result = $mysqli -> query($query) or die('Falha no sistema, tente novamente mais tarde!');

                $rows = $result->num_rows;
                if ($rows == 1) {
                    $credentials = $result->fetch_assoc();
                    if (!isset($_SESSION)) {
                        session_start();
                    }
                    $_SESSION['id'] = $credentials['Id'];
                    $_SESSION['username'] = $credentials['Username'];
                    if ($_SESSION['id']) {
                        header('Location: index.php');
                    }
                }
            }       
        } else {
            echo "E-mail ou usuário já cadastrado, <a href='login.php'><b>entrar</b></a>";   
        }
    }
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
                    <input name="email" type="email" class= "email" required>
                    <br>
                    <input name="user" type="text" class= "username" required>
                    <br>
                    <input name="Password" type="Passwordword" class= "Passwordword" required>
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