<?php
include_once 'database/Connection.php';
include_once 'protect.php';
$id = $_SESSION['id'];
$username = $_SESSION['username'];

if (isset($_POST['update']))
    {
        //Variáveis dos campos obtidos da view "Perfil.php"
        $user = mysqli_real_escape_string($mysqli, $_POST['user_update']);
        $email = mysqli_real_escape_string($mysqli, $_POST['email_update']);
        $Password = mysqli_real_escape_string($mysqli, $_POST['Passwordword_update']);

        //validação dos campos
        if (empty($user) || empty($email) || empty($Password)){
            echo "<h3>Um ou mais campos estão vazios</h3> <a href='../view/perfil.php'>Voltar</a>";
        } else {
            $sql = "UPDATE LoginCredentials 
                       SET Email = '$email'
                          ,Username = '$user'
                          ,Password = '$Password'
                     WHERE Id      = $id";

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
                $folder = "../image/ProfilePhoto/$username$id/";
                $sql = "UPDATE LoginCredentials 
                           SET Image = '$filename'
                         WHERE Id      = $id";

                $result = $mysqli -> query($sql) or die ('Erro');
                if ($result) {
                    if (!file_exists($folder)){
                        mkdir($folder, 0777, true);
                    }
                    $folder .= $filename;
                    move_uploaded_file($tempname, $folder);
                    header('location:../view/perfil.php');
                }
            }
            else 
            {
                echo '<h3> O tipo de arquivo não é suportado, Por favor utilize arquivos ".jpg" ".jpeg" ".png"</h3>
                      <a href="../view/perfil.php">Voltar</a>';
            }
        }
    }