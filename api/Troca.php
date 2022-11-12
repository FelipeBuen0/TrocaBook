<?php 
include_once 'database/Connection.php';

$data = $_REQUEST['data'];
$SQL = "UPDATE posts SET Troca='1' WHERE id='$data'";
$query = $mysqli->query($SQL) or die('Não foi possível estabelecer conexão com o banco de dados em Troca.php');
echo "Trocado!";
?>