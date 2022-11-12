<?php
include('api/protect.php');

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="master.css">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <!-- ? -->
    <script src="https://code.jquery.com/jquery-3.5.0.js"></script>
    <!-- ? -->
    <title>TrocaBook</title>
</head>

<body>
    <?php include_once('view/header.php');?>
    <?php include_once('view/CreatePost.php'); ?>
    <?php include_once('view/post.php'); ?>
    <button class="btn btn-outline-warning opacity-75 button-div d-flex justify-content-center " onclick="AddNewPost()"> <p class="p-button"> Post </p> <img class = "icon-fit plus-center" src="res/icons/plus-sign.png" alt="">
    </button>
    <script type="text/javascript" src="script/script.js"></script>
</body>
</html> 