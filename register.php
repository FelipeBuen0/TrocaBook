<?php
include('api/database/Connection.php');
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
if (isset($_POST['user'])) {
    $user = mysqli_real_escape_string($mysqli, $_POST['user']);
    $email = mysqli_real_escape_string($mysqli, $_POST['email']);
    $Password = mysqli_real_escape_string($mysqli, $_POST['Password']);
    $SecurityQuestion = $_POST['SecurityQuestion'];
    $SecurityAnswer = mysqli_real_escape_string($mysqli, $_POST['SecurityAnswer']);
    $sql = "SELECT *
              FROM LoginCredentials
             WHERE Email    = '$email'
                OR Username = '$user'";


    $result = $mysqli->query($sql) or die('Falha no sistema, tente novamente mais tarde!');
    if (!$result->num_rows > 0) {
        strtolower($email);
        $Password = base64_encode($Password);
        $Password = sha1($Password);
        $insert = "INSERT INTO LoginCredentials 
                                   (
                                    Email
                                   ,Username
                                   ,Password
                                   ,SecurityQuestion
                                   ,SecurityAnswer
                                   ,CreatedAt
                                   )
                            VALUES (
                                    '$email'
                                   ,'$user'
                                   ,'$Password'
                                   ,'$SecurityQuestion'
                                   ,'$SecurityAnswer'
                                   , NOW()
                                   );";


        $a = $mysqli->query($insert) or die('Falha no sistema, tente novamente mais tarde!');

        if ($a) {

            $query = "SELECT Id, Username FROM LoginCredentials ORDER BY Id DESC LIMIT 1";

            $result = $mysqli->query($query) or die('Falha no sistema, tente novamente mais tarde!');

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
    <link rel="stylesheet" href="master.css">
    <!-- JavaScript Bundle with Popper -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<script src="https://code.jquery.com/jquery-3.5.0.js"></script>

<body>

    <div class="ms-3 d-flex align-items-start justify-content-between">
        <form method="POST" class="form  mt-5" action="register.php" style="width: 32rem;">
            <h1>TROCABOOK</h1>
            <br>
            <h4 class="mt-5 header-color">Formulário de cadastro</h4>
            <br>
            <input name="email" type="email" class="form-control" placeholder='Digite seu email. Ex: trocabook@email.com.br' required>
            <br>
            <input name="user" type="text" class="form-control" required placeholder="Digite seu nome de usuário. Ex: Trocabook">
            <br>
            <input name="Password" type="Password" class="form-control" required placeholder='Digite sua senha. Ex: Troc@b00k@'>
            <!-- <br> -->
            <!-- <input name="Telefone" type="phone" class="form-control" required placeholder='Digite seu número Ex: 19 99999-9999'> -->
            <br>
            <div>
                <select name="SecurityQuestion" class="form-select" required>
                    <option value=""><b>Selecione sua pergunta de segurança (Serve caso você esqueça sua senha)</b></option>
                    <option value="Qual foi seu animal de estimação favorito?">Qual foi seu animal de estimação favorito?</option>
                    <option value="Com quantos anos você realizou sua primeira viagem?">Com quantos anos você realizou sua primeira viagem?</option>
                    <option value="Com quantos anos você começou a andar?">Com quantos anos você começou a andar?</option>
                    <option value="Qual foi sua primeira palavra?">Qual foi sua primeira palavra?</option>
                    <option value="Com quantos anos você aprender a ler e escrever?">Com quantos anos você aprender a ler e escrever?</option>
                </select>
            </div>
            <br>
            <input name="SecurityAnswer" type="text" class="form-control" required placeholder="Insira a resposta da sua pergunta de segurança">
            <br>
            <a href="Login.php"><b>Ja possui uma conta</b></a>
            <br>
            <p id="log"></p>
            <input class='btn btn-outline-primary' type="submit" value="Confirmar">
        </form>
        <div>
            <img class="bg-half" src="image/bg/BrititshLibrary.jpg" alt="">
        </div>
    </div>
</body>

</html>