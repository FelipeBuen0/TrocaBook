<?PHP
include_once '../api/protect.php';
require_once '../api/database/Connection.php';

$Id = $_SESSION['id'];
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

            <a href="../Index.php" class="text-left btn btn-warning bi bi-box-arrow-left"></a>

            <h3 style="color: white; font-weight: 100">Meu perfil</h3>
        </div>
    </nav>
    <br>
    <form action="../api/AtualizarPerfil.php" method="POST" enctype="multipart/form-data">
        <!-- O container que deixa alinhado e organizado todos os campos do formulário. -->
        <div class="div-container container">
            <!-- Email -->
            <div class="Email">
                <label for="update_email" class="form-label">Email:</label>
                <input type="email" class="form-control " name="update_email" id="update_email" value="<?php echo $row['Email'] ?>">
            </div>
            <!-- Imagem -->
            <div class="Image">
                <div class="file-upload">
                    <img src="../res/icons/Edit.svg">
                    <!-- Seletor de imagem -->
                    <input name="image" id="UploadImage" onchange="PreviewImage()" type="file">
                </div>
                <div class="profile-photo-contaier">
                    <img class="profile-photo img-thumbnail" id="UploadPreview" src="../image/ProfilePhoto/<?php echo ProfilePhotoExists($row, $Id) ?>">
                </div>
            </div>
            <!-- Lugar do campo do usuário -->
            <div class="usuario">
                <label for="update_username" class="form-label">Usuário:</label>
                <input type="text" class="form-control " name="update_username" id="update_username" value="<?php echo $row['Username'] ?>">
            </div>
            <!-- Lugar do campo Instagram -->
            <div class="ig">
                <label for="update_Instagram" class="form-label">Instagram: </label>
                <input type="url" class="form-control " name="update_Instagram" id="update_Instagram" placeholder="Ex: https://www.instagram.com/TrocaBook/" value="<?php echo $row['InstagramAccount'] ?>">
            </div>
            <!-- Lugar do campo Twitter-->
            <div class="twitter">
                <label for="update_twitter" class="form-label">Twitter:</label>
                <input type="url" class="form-control " name="update_twitter" id="update_twitter" placeholder="Ex: https://twitter.com/Tr0caBook" value="<?php echo $row['TwitterAccount'] ?>">
            </div>
            <!-- Lugar do campo Telefone -->
            <div class="PhoneNumber">
                <label for="update_phoneNumber" class="form-label">Celular: </label>
                <input type="Tel" class="form-control" name="update_phoneNumber" placeholder="(19) 99999-9999" value="<?php echo $row['PhoneNumber'] ?>">
            </div>
            <!-- Lugar do campo Textarea - descrição do perfil -->
            <div class="Textarea">
                <textarea class="form-control" name="update_textarea" id="update_textarea" cols="25" rows="8" aria-valuemax="180" value="<?php echo $row['Content'] ?>"></textarea>
                <input name="submit" value="Confirmar" type="submit" class="update_submit">
            </div>
        </div>
    </form>
    <script type="text/javascript" src="../script/script.js"></script>
</body>

</html>