<?php
  include ('api/database/Connection.php');
    if (isset($_POST['user']))
    {
        $user = mysqli_real_escape_string($mysqli, $_POST['user']);
        $Password = mysqli_real_escape_string($mysqli, $_POST['Password']);
        // $Password = password_hash($Plain_Password, PASSWORD_DEFAULT); 
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
</head>
<script src="https://code.jquery.com/jquery-3.5.0.js"></script>
    <body>
        <div id="content">
            <div class="container">
                <h1>Login</h1>
        
                <form method = "POST" class="form">
                    <input name="user" type="text" class= "username" required>
                    <br>
                    <input name="Password" type="Passwordword" class= "Passwordword" required>
                    <br>
                    <a href="register.php"><b>Não possui cadastro</b></a>
                    <br>
                    <p id="log"></p>
                    <input class = 'btn_submit' name="submit"  type="submit" value="Confirmar">
                </form>
            </div>
        </div>
    </body>
</html>