<?php
include_once 'api/database/Connection.php';
$SQL = 'Select *, posts.Id as PostId, posts.CreatedAt as PostCreatedAt, posts.Image as PostImage, logincredentials.Image as UserImage from posts inner Join logincredentials on logincredentials.Id = posts.OwnerId and Troca = 0 order by posts.Id desc';
$record = $mysqli->query($SQL) or die('Falha ao se conectar ao servidor!');
if ($record->num_rows == 0) {
    echo '<img class="bg-fill" src="image/bg/trocabook-blank.jpg" alt="">';
    return;
}
while ($row = $record->fetch_assoc()) {
    if (!$row['Image'] == null) {
        $image = $row['OwnerId'] . '/' . $row['UserImage'];
    } else {
        $image = "no_photo.png";
    }
    echo '
        <br>
        <div class="card posting container" id="' . $row['PostId'] . '" onclick="AddNewProfileView(`' . $row['OwnerName'] . '`)">
        <div class="img-div">
            <img src="image/Posts/' . $row['OwnerId'] . '/' . $row['PostImage'] . '" class="ms-1 img-fit img-thumbnail" alt="...">
        </div>
        <div class="card-body img-thumbnail">
            <h5 class="card-title">' . $row['Title'] . '</h5>
            <p class="card-text">' . $row['content'] . '.</p>
        </div>
            <div class="card-footer text-muted d-flex justify-content-between">
                <p class="data-hora me-auto"><em>' . $row['PostCreatedAt'] . '</em></p>
                <p class="data-hora pe-2"><em> Publicado por ' . $row['OwnerName'] . '</em></p>
                <div class="molde-icone-usuario">
                    <img src="image/ProfilePhoto/' . $image . '" class="mx-auto" id="foto-usuario"> 
                </div>
            </div>
        </div>
        <script type="text/javascript">
        function AddNewProfileView (OwnerName) {
            location.replace(`view/Perfil.php?q=${OwnerName}`);
      }
        </script>
        ';
}
