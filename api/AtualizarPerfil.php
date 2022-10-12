<?php
include_once 'database/Connection.php';
include_once 'protect.php';
$LoginId = $_SESSION['id'];

if (isset($_POST['update']))
    {
        //Variáveis dos campos obtidos da view "Perfil.php"
        $user = mysqli_real_escape_string($mysqli, $_POST['user_update']);
        $email = mysqli_real_escape_string($mysqli, $_POST['email_update']);
        $pass = mysqli_real_escape_string($mysqli, $_POST['password_update']);

        //validação dos campos
        if (empty($user) || empty($email) || empty($pass)){
            echo "<h3>Um ou mais campos estão vazios</h3> <a href='../view/perfil.php'>Voltar</a>";
        } else {
            $sql = "UPDATE logincredentials 
                       SET Email = '$email'
                          ,Username = '$user'
                          ,Pass = '$pass'
                     WHERE LoginId      = $LoginId";

            $result = $mysqli -> query($sql) or die ('Erro');
            if ($result) header("location: ../view/perfil.php");
        }
        if (!empty($_FILES['image']['name'])) {
            //Obtendo o valor da imagem
            $filename = $_FILES['image']['name'];
            $fileType = pathinfo($filename, PATHINFO_EXTENSION);
            $allowTypes = array('jpg', 'png', 'jpeg');
            
            if (in_array($fileType, $allowTypes)) {
                $filename = $_FILES['image']['name'];
                $tempname = $_FILES['image']['tmp_name'];
                $folder = "../image/" . $filename;
                $sql = "UPDATE logincredentials 
                           SET ProfilePhoto = '$filename'
                         WHERE LoginId      = $LoginId";

                $result = $mysqli -> query($sql) or die ('Erro');
                if (move_uploaded_file($tempname, $folder)) {
                    header("location: ../view/perfil.php");
                } else {
                    echo "<h3>  Falha na transferência para o servidor!</h3> 
                          <a href='../view/perfil.php'>Tente Novamente!";
                }
            }
            else 
            {
                echo '<h3> O tipo de arquivo não é suportado, Por favor utilize arquivos ".jpg" ".jpeg" ".png"</h3>
                      <a href="../view/perfil.php">Voltar</a>';
            }
        }
    }