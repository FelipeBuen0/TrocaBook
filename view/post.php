<?php
    include_once 'api/database/Connection.php';
    $SQL = 'Select *, posts.Id as PostId, posts.CreatedAt as PostCreatedAt, posts.Image as PostImage, logincredentials.Image as UserImage from posts inner Join logincredentials on logincredentials.Id = posts.OwnerId order by posts.Id desc';
    $record = $mysqli->query($SQL) or die ('Falha ao se conectar ao servidor!');
    while ($row = $record->fetch_assoc()) {
        if (!$row['Image'] == null) {
            $image = $row['OwnerId'] . '/' . $row['UserImage'];
        } else {
            $image = "no_photo.png";
        }
        echo '
        <br>
        <div class="card container" id="'. $row['PostId'].'" style="width: 32rem; cursor: pointer;" onclick="AddNewProfileView(`'.$row['OwnerName'].'`)">
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
            // debugger
            // let dados = JSON.stringify(OwnerName);
            // $.ajax({
            //   url: "view/Perfil.php",
            //   type: "POST",
            //   data: {data: dados},
            //   success: function(result){
            //     location.replace("view/Perfil.php");
            //     console.log(result);
            //   },
            //   error: function(jqXHR, textStatus, errorThrown) {
            //     alert("Retorno caso algum erro ocorra");
            //     console.log( errorThrown, jqXHR, textStatus)
            //   }
            // });
      }
        </script>
        ';
    }
?>