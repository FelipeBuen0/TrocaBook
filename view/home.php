<?php

    include_once 'api/database/Connection.php';
    $SQL = 'Select * from posts';
    $record = $mysqli->query($SQL) or die ('Falha ao se conectar ao servidor!');
    while ($row = $record->fetch_assoc()) {
        echo '
    <br>
    <div class="card container" style="width: 32rem;">
    <div class="card-header d-flex justify-content-end">
    <p class="card-title user-title">' . $_SESSION['username'] . 'publicou...</p
        <div class="user-img-div">
            <img src="image/Jotaro Kujo.png" class="mx-auto  user-img-fit" alt="..."> 
        </div>
    </div>
    <div class="img-div">
        <img src="res/app-img/Blogs/'. $row['image'] .'" class="mx-auto img-fit img-thumbnail " alt="...">
    </div>
    <div class="card-body">
        <h5 class="card-title">'.$row['Title'].'</h5>
        <p class="card-text">'.$row['content'].'.</p>
    </div>
    <ul class="list-group list-group-flush">
        <li class="list-group-item">'. $row['Interesses'].'</li>
        <li class="list-group-item"><p class="data-hora"><em>'.$row['CreatedAt'].'</em></p></li>
    </div>
        ';
    }
?>

<!-- O trecho a seguir só consta como exemplo, a idéia é que esta funcionalidade seja mecanizada e automatizada. -->
<br>
<div class="card container" style="width: 32rem;">
    <div class="card-header d-flex justify-content-end">
    <p class="card-title user-title"> <em><?php echo $_SESSION['username'] ?></em> publicou...</p>
        <div class="user-img-div">
            <img src="image/Jotaro Kujo.png" class="mx-auto  user-img-fit" alt="...">
        </div>
    </div>
    <div class="img-div">
        <img src="image/gato.png" class="mx-auto img-fit img-thumbnail " alt="...">
    </div>
    <div class="card-body">
        <h5 class="card-title">Card title</h5>
        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
    </div>
    <ul class="list-group list-group-flush">
        <li class="list-group-item">An item</li>
        <li class="list-group-item"><p class="data-hora"><em>Publicado em 20/10/2022</em></p></li>
</div>
<!-- <div class="container bd-solid-black">
    <div class="title">a</div>
    <div class="subtitle">a</div>
    <div class="cat">
        <img class="img-fit" src="">
    </div>
    <div class="content"></div>
    <div class="d-flex justify-content-center container flex-column mb-3 bd-solid-black">Ideia para seção de like e comentarios11</div> 
    </div>
</div> -->