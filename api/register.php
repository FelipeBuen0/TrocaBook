<?php
  include ('database/Connection.php');
  
  // if (strpos($url, 'register.html')) 
  // {
    if (isset($_POST['user']))
    {
      echo "Testando funcionalidade";
        $user = mysqli_real_escape_string($conn, $_POST['user']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $pass = mysqli_real_escape_string($conn, $_POST['pass']);
        $query = "INSERT INTO logincredentials (Email, Username, Pass) VALUES ('$email', '$user', '$pass')"; //Método: Insere os dados do usuário no banco de dados
        echo $query;
        $result = $mysqli -> query($query);
        header('Location: http://localhost/app/Index.html');
        
    }
  // }    
?>