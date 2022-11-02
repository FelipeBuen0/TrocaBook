<?php 
    include_once 'protect.php';
    
    function Insert($filename) {
        include_once 'database/Connection.php';
        $id = $_SESSION['id'];
        $username = $_SESSION['username'];
        //o método mysqli_real_escape_string limpa a string de qualquer caractére que possa danificar a integridade do nosso banco de dados. 
        // Sendo assim, uso este método para obter a variável limpa e armazenar no $title. 
        $title = mysqli_real_escape_string($mysqli, $_POST['title']);
        $content = mysqli_real_escape_string($mysqli, $_POST['content']);
        $select = mysqli_real_escape_string($mysqli, $_POST['select']);
        $sql = "INSERT INTO posts (OwnerId, OwnerName, content, CreatedAt, Image, Title, Genre) VALUE ($id, '$username','$content', NOW(), '$filename', '$title', '$select') ";
        if ($mysqli->query($sql)) {
            return true;
        } else {
            return false;
        }
    }
    function append_string($str, $str_) {
        $str .= $str_;
        return $str;
    }

    function formatarImagem() {
        $id = $_SESSION['id'];
        $username = $_SESSION['username'];
        if (!empty($filename = $_FILES['image']['name'])) {
            //Obtendo o valor da imagem.
            $filename = $_FILES['image']['name'];
            $fileType = pathinfo($filename, PATHINFO_EXTENSION);
            $allowTypes = array('jpg', 'png', 'jpeg');
            
            if (in_array($fileType, $allowTypes)) {
                $filename = $_FILES['image']['name'];   
                $tempname = $_FILES['image']['tmp_name'];
                $folder = "../image/Posts/$id/";
                if (Insert($filename)) {
                    //esse método faz com que a imagem seja baixada dentro de um diretório da aplicação.
                    if (!file_exists($folder)){
                        mkdir($folder, 0777, true);
                    }
                    $folder .= $filename;
                    move_uploaded_file($tempname, $folder);
                    header('location:../Index.php');
                }
            }
        }
    }
    if (isset($_POST['Submit'])) {
        formatarImagem();
    }  
?>