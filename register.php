<?php
  include ('api/database/Connection.php');
  function GenerateSecurityQuestions()
    {

        $frases = [
            "Qual foi seu animal de estimação favorito?",
            "Com quantos anos você realizou sua primeira viagem?",
            "Com quantos anos você começou a andar?",
            "Qual foi sua primeira palavra?",
            "Com quantos anos você aprender a ler e escrever?",
            "Qual foi seu primeiro livro?"
        ];

        $count = count($frases) - 1;

        $n = rand(0, $count);

        return $frases[$n];
    }
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>
<script src="https://code.jquery.com/jquery-3.5.0.js"></script>
    <body>
        <div id="content">
            <div class="container">
                <form method="POST" action="register.php" class='form container' style="width: 32rem;">
                    <br>
                    <h1>Cadastro</h1>
                    <br>
                    <label for="email" class="form-label"> Email</label>
                    <input name="email" type="email" class= "form-control" required>
                    <br>
                    <label for="user" class="form-label"> Nome de usuário</label>
                    <input name="user" type="text" class= "form-control" required>
                    <br>
                    <label for="Password" class="form-label"> Password</label>
                    <input name="Password" type="Password" class="form-control" required>
                    <br>
                    <a href="Login.php"><b>Ja possui uma conta</b></a>
                    <br>
                    <p id="log"></p>
                    <input class = 'btn btn-outline-primary' type="submit" value="Confirmar">
                </form>
            </div>
        </div>
    </body>
</html>