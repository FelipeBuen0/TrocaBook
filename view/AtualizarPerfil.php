<?PHP
include_once '../api/protect.php';
require_once '../api/database/Connection.php';

    $Id = $_SESSION['id'];
    // SQL Get para pegar as informações do perfil
    $sql = "SELECT * 
              FROM LoginCredentials
             WHERE Id = $Id";

    $record = $mysqli -> query($sql);
    $row = $record->fetch_assoc();

    function ProfilePhotoExists($row, $id) {
        if (!$row['Image'] == null) {
            return $image = $id .'/'. $row['Image'];
        }
        return $image = "no_photo.png"; ;
    }
    
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <script src="../script/script.js"></script> -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../master.css">
    <title><?php echo $_SESSION['username'] ?></title>
</head>

<body>
<nav class="navbar navbar-expand-sm navbar-dark bg-dark sticky-top">
        <div class="container-fluid">

            <a href="../Index.php" class="text-left btn btn-danger bi bi-box-arrow-left"></a>

            <h3 style="color: white;"> Atualizar o Perfil</h3>
        </div>
    </nav>
    <br>
    <br>
    <form action="../api/AtualizarPerfil.php" method="POST" enctype = "multipart/form-data" class="d-flex justify-content-center container bd-solid-black">
        <div class="mb">
            <br>
            <div class="profile-photo-contaier">
                <img class="profile-photo" src="../image/ProfilePhoto/<?php echo ProfilePhotoExists($row, $Id)?>">
            </div>
            <input class="form-control btn btn-outline-secondary -form-control-sm" name="image" type="file">
            <br>
            <br>
        </div>
        <br>
        <div class="m-lft-p10">
            <br>
            <label for="update_email" class="wd-med form-label">Email</label>
            <input type="email" class="form-control" name="email_update" id="update_email" value="<?php echo $row['Email']?>">
            <br>
            <label for="update_username" class="wd-med form-label">Nome do usuário</label>
            <input type="text" class="form-control" name="user_update" id="update_username" value="<?php echo $row['Username']?>">
            <br>
            <label for="update_Passwordword" class="wd-med form-label">Senha</label>
            <input type="Password" class="form-control" name="Passwordword_update" id="update_Passwordword" value="<?php echo $row['Password']?>">
            <br>
            <br>
            <br>
            <input type="submit" value="Atualizar"  name="update" id='update_submit' class="btn btn-success opacity-80 m-lft">
        </div>
    </form>
</body>

</html>