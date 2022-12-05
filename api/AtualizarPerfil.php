<?php
include_once 'database/Connection.php';
include_once 'protect.php';
$Id = $_SESSION['id'];

if (isset($_POST['submit'])) {
    if (!empty($_FILES['image']['name'])) {
        //Obtendo o valor da imagem
        $filename = $_FILES['image']['name'];
        $fileType = pathinfo($filename, PATHINFO_EXTENSION);
        $allowTypes = array('jpg', 'png', 'jpeg');

        if (in_array($fileType, $allowTypes)) {
            $filename = $_FILES['image']['name'];
            $tempname = $_FILES['image']['tmp_name'];
            $folder = "../image/ProfilePhoto/$Id/";
            $sql = "UPDATE Users 
                           SET Image = '$filename'
                         WHERE Id      = $Id";

            $result = $mysqli->query($sql) or die('Erro');
            if ($result) {
                if (!file_exists($folder)) {
                    mkdir($folder, 0777, true);
                }
                $folder .= $filename;
                move_uploaded_file($tempname, $folder);
                header('location:../view/AtualizarPerfil.php');
            }
        } else {
            echo '<h3> O tipo de arquivo não é suportado, Por favor utilize arquivos ".jpg" ".jpeg" ".png"</h3>
                <a href="../view/AtualizarPerfil.php">Voltar</a>';
        }
    }
    if (isset($_POST['update_textarea'])) {
        $Content = mysqli_real_escape_string($mysqli, $_POST['update_textarea']);
        if (strlen($Content)) {
            $sql = "UPDATE Users SET Content = '$Content' WHERE Id = $Id";
            $result = $mysqli->query($sql) or die('Erro');
        }
    }
    //Variáveis dos campos obtidos da view "AtualizarPerfil.php"
    $user = mysqli_real_escape_string($mysqli, $_POST['update_username']);
    $Instagram = mysqli_real_escape_string($mysqli, $_POST['update_Instagram']);
    $Twitter = mysqli_real_escape_string($mysqli, $_POST['update_twitter']);
    $PhoneNumber = mysqli_real_escape_string($mysqli, $_POST['update_phoneNumber']);

    $username = $_SESSION['username'];

    $querystring1 = "SELECT username,  FROM Users";
    $catchArr = $mysqli->query($querystring1);
    if ($row = $catchArr -> fetch_assoc()) {
        $row['username'] == $user ? $user = $username : $condition = true;
    }

    if ($condition == true) {
        $sql = "UPDATE Users 
                   SET 
                      ,Username         = '$user'
                      ,TwitterAccount   = '$Twitter'
                      ,InstagramAccount = '$Instagram'
                      ,PhoneNumber      = '$PhoneNumber'
                      ,UpdatedAt        =  NOW()
                 WHERE Id               =  $Id";
    }

    $mysqli->query($sql) or die('Erro');

    $SQL_ = "UPDATE posts SET OwnerName = '$user', UpdatedAt=NOW() WHERE OwnerId = $Id";
    $_SESSION['username'] = $user;
    $mysqli->query($SQL_) or die('Erro');
    header('location: ../view/AtualizarPerfil.php');
}
