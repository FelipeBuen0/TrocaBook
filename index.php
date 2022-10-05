<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="master.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- ? -->
    <script src="https://code.jquery.com/jquery-3.5.0.js"></script>
    <script type="text/javascript" src="app/script/session.js"></script>
    <script type="text/javascript" src="app/script/home.js"></script>
    <!-- ? -->
    <title>TrocaBook</title>


</head>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<body onload="onLoadHandler()">
    <div id="preloader"></div>
    <div id="app-view">
        <ol>
            <li>Sobre</li>
            <li>Equipe</li>
            <li id="signout" onclick="onSignOutClick()"> Sair </li>
        </ol>
        <div class="container">
        </div>
    </div>
</body>

</html>