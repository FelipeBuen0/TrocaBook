<?php

    define('SERVER', 'localhost');
    define('USERNAME', 'root');
    define('PASSWORD', '');
    define('DATABASE', 'books');
    //debug//
    // define('PORT', '3306'); //Porta do banco de dados de casa
    define('PORT', '3307'); //Porta do banco de dados de casa
    //debug//
    $protocol = ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
    $url = $protocol . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
    echo $url; // Outputs: Full URL
    $mysqli = new mysqli(SERVER, USERNAME, PASSWORD, DATABASE, PORT) or die ('Not able to connect!');
?>