<!DOCTYPE html>
<html lang="en">
<head>
    <script src="app/script/session.js"></script>
    <meta charset="UTF-8">
</head>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/4.1.1/crypto-js.min.js"></script>
<script src="https://code.jquery.com/jquery-3.5.0.js"></script>
    <body onload="onLoadHandler()">
        <div id="content">
            <div class="container">
                <h1>Login</h1>
        
                <form action="app/api/config.php" method = "POST" class="form">
                    <input name="user" type="text" class= "username">
                    <br>
                    <input name="pass" type="password" class= "password">
                    <br>
                    <a href="cadastro.html"><b>Não possui cadastro</b></a>
                    <br>
                    <p id="log"></p>
                    <input class = 'btn_submit'  type="submit" value="Confirmar">
                </form>
            </div>
        </div>
        <?php
        include ('app/api/connection.php');
            if ($_REQUEST) {
                $user = $_REQUEST['user'];
                $pass = $_REQUEST['pass'];
    
                $query = `SELECT user_id, username FROM users WHERE users = "{$user}" and pass = "{$pass}" `;
                $result = mysqli_query($conn, $query);
            }
        ?>
    </body>
</html>