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
                <h1>Cadastro</h1>
                
                <form action="app/api/config.php" method="POST" class='form'>
                    <input name="email" type="email" class= "email">
                    <br>
                    <input name="user" type="text" class= "username">
                    <br>
                    <input name="pass" type="password" class= "password">
                    <br>
                    <label for="chkBox">Manter-se conectado?</label>
                    <input name="chkBox" type="checkbox" class= "chekbox">
                    <br>
                    <a href="login.html"><b>Ja possui uma conta</b></a>
                    <br>
                    <p id="log"></p>
                    <input class = 'btn_submit' type="submit" value="Confirmar">
                </form>
            </div>
        </div>
    </body>
</html>