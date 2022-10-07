<?php
  if (!isset($_SESSION)) {
      session_start();
  }
  if (!isset($_SESSION['id'])) {
    die ('Você não possui permissão para acessar esta página<p><a href="Login.php">Entrar</a></p>'); 
  }
  
?>