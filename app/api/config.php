<?php
          include ('connection.php');
          
          $protocol = ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
          $url = $protocol . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
          echo $url; // Outputs: Full URL
          if (strpos($url, 'cadastro')) 
          {
            echo "$url";
            die();
            if (isset($_POST['user']))
            {
                $user = mysqli_real_escape_string($conn, $_POST['user']);
                $email = mysqli_real_escape_string($conn, $_POST['email']);
                $pass = mysqli_real_escape_string($conn, $_POST['pass']);
                $query = "INSERT INTO logincredentials (Email, Username, Pass) VALUES ('$email', '$user', '$pass')";
                echo $query;
                header('Location: index.html');
                $result = mysqli_query($conn, $query);
            }
          }
            //   if (isset($_POST['user']))
            //   {
        //     $user = mysqli_real_escape_string($conn, $_POST['user']);
        //     $pass = mysqli_real_escape_string($conn, $_POST['pass']);
        //     $query = "SELECT UserId, Username FROM users WHERE Username = $user";
        //     $result = mysqli_query($conn, $query);
        //     echo $result;
        //   }
        // if(empty($_POST['user']) || empty($_POST['pass'])) {
        //     header('Location: login.php');
        //     exit();
        // }
        // include ('app/api/connection.php');
        
?>