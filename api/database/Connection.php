<?php

    define('SERVER', 'localhost');
    define('USERNAME', 'root');
    define('PASSWORD', '');
    define('DATABASE', 'books');
    //debug//
    define('PORT', '3307'); //Porta do banco de dados de casa
    $mysqli = new mysqli(SERVER, USERNAME, PASSWORD, DATABASE, PORT) or die ('Not able to connect!');
?>

<!-- while ($row = $result->fetch_assoc()){
        echo "
        <tr>
            <td>" . $row['name'] . "</td>
            <td>" . $row['tipo'] . "</td>
            <td>" . $row['historia'] . "...</td>
            <td class='img-fit'><img class='img-contain' src='imagens/" . $row['imagem'] . "'></td>
	    </tr>
        ";
    } -->