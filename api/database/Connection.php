<?php

    define('SERVER', 'localhost');
    define('USERNAME', 'root');
    define('PASSWORD', '');
    define('DATABASE', 'books');
    //debug//
    // define('PORT', '3306'); //Porta do banco de dados de casa
    define('PORT', '3307'); //Porta do banco de dados de casa
    $mysqli = new mysqli(SERVER, USERNAME, PASSWORD, DATABASE, PORT) or die ('Not able to connect!');
?>