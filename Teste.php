$user = mysqli_real_escape_string($mysqli, $_POST['update_username']);
    $email = mysqli_real_escape_string($mysqli, $_POST['update_email']);
    $Password = mysqli_real_escape_string($mysqli, $_POST['update_Password']);
    $OldPassword = mysqli_real_escape_string($mysqli, $_POST['update_OldPassword']);
    $Instagram = mysqli_real_escape_string($mysqli, $_POST['update_Instagram']);
    $FaceBook = mysqli_real_escape_string($mysqli, $_POST['update_Facebook']);
    $Twitter = mysqli_real_escape_string($mysqli, $_POST['update_twitter']);
    $PhoneNumber = mysqli_real_escape_string($mysqli, $_POST['update_phoneNumber']);
    $Content = mysqli_real_escape_string($mysqli, $_POST['update_textarea']);

    $post = array($user, $email, $Password, $Instagram, $FaceBook, $Twitter, $PhoneNumber, $Content);if (strlen($Password)) {
        $Password = base64_encode($Password);
        $Password = sha1($Password);
        $OldPassword = base64_encode($OldPassword);
        $OldPassword = sha1($OldPassword);
        if ($Password == $OldPassword) {
            echo "<h3>As senhas são compátiveis...</h3> <a href='../view/AtualizarPerfil.php'>Voltar</a>";
            return;
        }
        $sql = "UPDATE LoginCredentials SET Password = '$Password' WHERE Id = $Id";
    }