<?php
  include ('database/Connection.php');
  //A controller handles the requisition that arrives at the code
  if (isset($_POST['user']))
  {
      // $user = mysqli_real_escape_string($conn, $_POST['user']);
      $user = $_POST['user'];
      $pass = $_POST['pass'];
      $query = "SELECT * FROM logincredentials WHERE Username = '$user'";
      if ($result = $mysqli -> query($query)) 
      {
        while ($obj = $result -> fetch_object()) {
          printf("%s (%s)\n", $obj->Username, $obj->LoginId);
        }
        $result -> free_result();
      }
  }
  // if ($result == null) 
  // {
  //   // header('Location: http://{url}app/Login.html');
  //   header('Location: http://localhost/app/Login.html');
  // }
  // if(empty($_POST['user']) || empty($_POST['pass'])) 
  // {
  //   header('Location: http://localhost/app/Login.html');
  //     exit();
  // }  
?>