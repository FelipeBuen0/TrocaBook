<?php
include_once 'database/Connection.php';
include_once 'protect.php';
$Id = $_SESSION['id'];
$username = $_SESSION['username'];

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
            $sql = "UPDATE LoginCredentials 
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
        $sql = "UPDATE LoginCredentials SET Content = '$Content' WHERE Id = $Id";
        $result = $mysqli->query($sql) or die('Erro');
    }
    //Variáveis dos campos obtidos da view "AtualizarPerfil.php"
    $user = mysqli_real_escape_string($mysqli, $_POST['update_username']);
    $email = mysqli_real_escape_string($mysqli, $_POST['update_email']);
    $Instagram = mysqli_real_escape_string($mysqli, $_POST['update_Instagram']);
    $FaceBook = mysqli_real_escape_string($mysqli, $_POST['update_Facebook']);
    $Twitter = mysqli_real_escape_string($mysqli, $_POST['update_twitter']);
    $PhoneNumber = mysqli_real_escape_string($mysqli, $_POST['update_phoneNumber']);
    

        $sql = "UPDATE LoginCredentials 
                   SET Email            = '$email'
                      ,Username         = '$user'
                      ,TwitterAccount   = '$Twitter'
                      ,InstagramAccount = '$Instagram'
                      ,FaceBookAccount  = '$FaceBook'
                      ,PhoneNumber      = '$PhoneNumber'
                      ,UpdatedAt        =  NOW()
                 WHERE Id               =  $Id";
    $result = $mysqli->query($sql) or die('Erro');
    if ($result) header("location: ../view/AtualizarPerfil.php");
}
