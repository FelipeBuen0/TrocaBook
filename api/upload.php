<?php
    include_once 'database/Connection.php';


    //Para inserir ele irá realizar esse código
    //FONTE: Internet
    $status = '';
    if (isset($_POST['submit'])) {
        if (!empty($_FILES['image']['name'])) {
            $filename = basename($_FILES['image']['name']);
            $fileType = pathinfo($filename, PATHINFO_EXTENSION);

            $allowTypes = array('jpg', 'png', 'jpeg');
            if (in_array($fileType, $allowTypes)) {
                $image = $_FILES['image']['name'];
                $imgContent = addslashes(file_get_contents($image));

                $sql = "INSERT into images (image, created) VALUES ('".$imgContent."', NOW())";
                $insert = $mysqli -> query($sql);
                if ($insert) {
                    $status = "File Upload Successfully";
                }else{
                    $status = "File Upload failed, try again";
                }
            } else {
                $status = "sorry not the type asked";
            }
        }
    }
    
?>