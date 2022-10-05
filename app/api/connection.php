<?php
//debugg
    define('SERVER', 'localhost');
    define('USERNAME', 'root');
    define('PASSWORD', '');
    define('DATABASE', 'books');
    define('PORT', '3306');
    // define('PORT', '3307');
    $protocol = ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
    $url = $protocol . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
    echo $url; // Outputs: Full URL
    $conn = new mysqli(SERVER, USERNAME, PASSWORD, DATABASE, PORT) or die ('Not able to connect!');
//debugg
?>