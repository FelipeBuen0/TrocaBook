<?PHP
include_once '../api/protect.php';
require_once '../api/database/Connection.php';

$Id = 1;
// SQL Get para pegar as informações do perfil
$sql = "SELECT * 
              FROM LoginCredentials
             WHERE Id = $Id";

$record = $mysqli->query($sql);
$row = $record->fetch_assoc();

function ProfilePhotoExists($row, $id)
{
    if (!$row['Image'] == null) {
        return $image = $id . '/' . $row['Image'];
    }
    return $image = "no_photo.png";;
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

            <h3 style="color: white;">Meu perfil</h3>
        </div>
    </nav>
    <br>
    <form action="../api/AtualizarPerfil.php" method="POST" enctype="multipart/form-data">
        <div class="container">
            <!-- Email -->
            <div class="Email">
                <label for="update_email" class="form-label">Email:</label>
                <input type="email" class="form-control form-width" name="email_update" id="update_email" value="<?php echo $row['Email'] ?>">
            </div>
            <!-- Imagem -->
            <div class="Image">
                <div class="file-upload">
                    <img src="../res/icons/Edit.svg" alt="">
                    <!-- Seletor de imagem -->
                    <input class="form-control" name="image" type="file"> 
                </div>
                <div class="profile-photo-contaier">
                    <img class="profile-photo img-thumbnail" src="../image/ProfilePhoto/<?php echo ProfilePhotoExists($row, $Id) ?>">
                </div>
            </div>
            <!-- Lugar do campo do usuário -->
            <div class="usuario">
                <label for="update_username" class="form-label">Usuário:</label>
                <input type="text" class="form-control form-width" name="user_update" id="update_username" value="<?php echo $row['Username'] ?>">
            </div>
            <div class="twitter">
                <label for="update_username" class="form-label">Twitter:</label>
                <input type="text" class="form-control form-width" name="user_update" id="update_username" placeholder="Ex: https://twitter.com/Tr0caBook">
            </div>
            <div class="fb">
                <label for="update_Password" class="form-label">Facebook: </label>
                <input type="text" class="form-control form-width" name="Password_update" id="update_Password" placeholder="Ex: https://www.facebook.com/TrocaBookOficial">
            </div>
            <div class="ig">
                <label for="update_Password" class="form-label">Instagram: </label>
                <input type="password" class="form-control form-width" name="Password_update" id="update_Password" placeholder="Ex: https://www.instagram.com/TrocaBook/">
            </div>
            <div class="password">
                <label for="update_Password" class="form-label">Senha: </label>
                <input type="Password" class="form-control form-width" name="Password_update" id="update_Password" placeholder="***********">
            </div>
            <div class="Textarea">
                <textarea class="form-control" name="" id="" cols="25" rows="8"></textarea>
            </div>
        </div>
        <input name= "submit" value="Confirmar" type="submit" class="btn-update-profile btn btn-outline-success opacity-75">
    </form>
</body>

</html>