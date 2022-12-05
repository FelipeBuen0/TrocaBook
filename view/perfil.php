<?php
include_once '../api/database/Connection.php';
if (isset($_SESSION)) {
    session_start();
}
//a variável $target está armazenando o dado da queryString - URL. No caso será o nome do seu usuário.
$target = $_GET['q'];
if ($target == null) {
    if ($_SESSION['id'] != null) {
        return header('location: ../index.php');
    }
    return header('location: ../Login.php');
}
if ($target) {
    $sql = "SELECT * FROM Users WHERE Username = '$target';";
    $UserQuery = $mysqli->query($sql);
    $UserRow = $UserQuery->fetch_assoc();
    //Mapeando todos os dados do usuario para posteriormente printar na tela.
    $targetId = $UserRow['Id'];
    $Email = $UserRow['Email'];
    $PhoneContact = $UserRow['PhoneNumber'];
    $TwitterAccount = validateSocialMedia($UserRow['TwitterAccount'], 'twitter');
    $InstagramAccount = validateSocialMedia($UserRow['InstagramAccount'], 'instagram');
    $Content = $UserRow['Content'];
    $Image = $UserRow['Image'];
}
if ($target) {
    $SQL = "SELECT * FROM posts WHERE  OwnerId = '$targetId' AND Troca = 0";
    $PostQuery = $mysqli->query($SQL);
}
function validateSocialMedia($socialMedia, $socialMedia_) {
    if (strLen($socialMedia == '')) {
        return ;
    }
    $response = "";
    switch ($socialMedia_) {
        case 'instagram':
            $response = '<p>Instagram - '. $socialMedia. '</p>';
            break;
        case 'twitter':
            $response = '<p>Twitter - '.$socialMedia.'</p>';
            break;
        default:
            $response = '';
            break;
    }
    return $response;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../master.css">
    <link rel="shortcut icon" href="../res/favicon/favicon.ico" type="image/x-icon">
    <title></title>
</head>

<body>
    <nav class="navbar navbar-expand-sm navbar-dark bg-dark sticky-top">
        <div class="container-fluid">
            <a href="../Index.php" class="text-left btn btn-warning bi bi-box-arrow-left"></a>
        </div>
    </nav>

    <div class="ProfileContainer">
        <!-- Imagem -->
        <div class="PostImage">
            <div class="profile-photo-contaier">
                <img class="profile-photo" src="../image/ProfilePhoto/<?php echo $Image != null ? $targetId . '/' . $Image : "no_photo.png" ?>">
                <h1><?php echo $target ?></h1>
            </div>
        </div>
        <!-- Lugar do campo Instagram -->
        <div class="PostInstagram">
            <h1>Contato</h1>
            <?php echo $InstagramAccount ?>
        </div>
        <!-- Lugar do campo Twitter-->
        <div class="PostTwitter">
            <?php echo$TwitterAccount ?>
            <!-- Lugar do campo Telefone -->
            <div class="PostPhoneNumber">
                <p name="PostPhoneNumber"> Celular - <?php echo $PhoneContact ?></p>
            </div>
        </div>

        <div class="PostContent">
            <p name="PostContent"><?php echo $Content ?></p>
        </div>
    </div>

    <br> 
    <!-- A partir da TAG abaixo, o código irá representar os posts contidos no perfil do usuário. -->
    <div class="d-flex flex-row flex-wrap ">
        <?php
        while ($PostRow = $PostQuery->fetch_assoc()) {
            if (!$Image == null) {
                $UserImg = $targetId . '/' . $Image;
            } else {
                $UserImg = "no_photo.png";
            }
            $PostStructure = '
            <br>
            <div class="card ms-3 mb-3 mt-3" id="' . $PostRow['Id'] . '" style="width: 32rem;">
            <div class="img-div">
                <img src="../image/Posts/' . $PostRow['OwnerId'] . '/' . $PostRow['Image'] . '" class="ms-3 img-fit img-thumbnail" alt="...">
            </div>
            <div class="card-body img-thumbnail">
                <h5 class="card-title">' . $PostRow['Title'] . '</h5>
                <p class="card-text">' . $PostRow['content'] . '</p>
            </div>
                <div class="card-footer text-muted d-flex justify-content-between">
                    <p class="data-hora me-auto"><em>' . $PostRow['CreatedAt'] . '</em></p>
                    <p class="data-hora pe-2"><em> Publicado por ' . $PostRow['OwnerName'] . '</em></p>
                    <div class="molde-icone-usuario">
                        <img src="../image/ProfilePhoto/' . $UserImg . '" class="mx-auto" id="foto-usuario"> 
                    </div>
                </div>
            </div>
            ';
            echo $PostStructure;
        }
        ?>
    </div>
</body>

</html>