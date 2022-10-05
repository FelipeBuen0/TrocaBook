<?php
    include ('connection.php');
    
    if(empty($_POST['email']) || empty($_POST['user']) || empty($_POST['user'])) {
        // header('Location: cadastro.php');
        exit();
    }

    $user = mysqli_real_escape_string($conn, $_POST['user']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $pass = mysqli_real_escape_string($conn, $_POST['pass']);
    if ($_REQUEST) {
        $query = `INSERT INTO logincredentials (Email, Username, Pass) VALUES ($email, $user, $pass)`;
        echo $query;
        $result = mysqli_query($conn, $query);
        echo $result;   
    }
?>