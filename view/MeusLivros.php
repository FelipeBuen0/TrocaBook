<?PHP
include_once '../api/protect.php';
require_once '../api/database/Connection.php';

$Id = $_SESSION['id'];
// SQL Get para pegar as informações do perfil

$sql = "    SELECT *
                  , p.Id as PostId
                  , p.Image as PostImage
                  , l.Image as UserImage
                  , p.CreatedAt as PostsCreatedAt

              FROM POSTS as p
        INNER JOIN logincredentials as l
             WHERE p.OwnerId = l.Id
               AND l.Id = $Id
          ORDER BY p.Id DESC";

$record = $mysqli->query($sql);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../master.css">
    <script src="https://code.jquery.com/jquery-3.5.0.js"></script>
    <title>Meus Livros</title>
</head>

<body>
    <nav class="navbar navbar-expand-sm navbar-dark bg-dark sticky-top">
        <div class="container-fluid">

            <a href="../Index.php" class="text-left btn btn-warning bi bi-box-arrow-left"></a>

            <h3 style="color: white; font-weight: 100"> Meus Livros</h3>
        </div>
    </nav>
    <br>
    <br>
    <div class="d-flex flex-row flex-wrap">
        <?php while ($row = $record->fetch_assoc()) {
            if (!$row['Image'] == null) {
                $image = $row['OwnerId'] . '/' . $row['UserImage'];
            } else {
                $image = "no_photo.png";
            }
            if ($row['Troca']) {
                $message = '<div class="Trocado">
                                <p><em>Trocado!</em></p>
                            </div>';
            } else {
                $message ='<div class="Troca">
                                <button id="btn-troca" onclick="onBtnTrocaClick('.$row["PostId"].')">Trocabook! </button>
                            </div>';
            }
            echo '
        <br>
            <div class="card ms-3 mb-3" id="'.$row['PostId'].'" style="width: 32rem;">
            <div class="img-div">
                <img src="../image/Posts/' . $row['OwnerId'] . '/' . $row['PostImage'] . '" class="ms-3 img-fit img-thumbnail" alt="...">
            </div>
            <div class="card-body img-thumbnail">
                <h5 class="card-title">' . $row['Title'] . '</h5>
                <p class="card-text">' . $row['content'] . '.</p>
            </div>
                <div class="card-footer text-muted d-flex justify-content-between">
                    <p class="data-hora me-auto"><em>' . $row['PostsCreatedAt'] . '</em></p>
                    '.$message.'
                </div>
            </div>
            <script type="text/javascript">
                function onBtnTrocaClick (a) {
                    $.ajax({
                          url: "../api/Troca.php",
                          type: "POST",
                          data: {data: a},
                          success: function(result){
                            location.reload(true);
                          },
                          error: function(jqXHR, textStatus, errorThrown) {
                            alert("Retorno caso algum erro ocorra");
                            console.log( errorThrown, jqXHR, textStatus)
                          }
                        });
                }
            </script>
        ';
        }
        ?>
    </div>
</body>

</html>