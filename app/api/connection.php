<?php
//debugg
    define('SERVER', 'localhost');
    define('USERNAME', 'root');
    define('PASSWORD', '');
    define('DATABASE', 'books');
    define('PORT', '3307');

    $conn = new mysqli(SERVER, USERNAME, PASSWORD, DATABASE, PORT) or die ('Not able to connect!');
//debugg
?>