<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>MiEmpresa</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="js/libs/jquery/jquery.js" type="text/javascript"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script>
            var sigue = false;
            function validaLogin() {
                $.ajax({
                    type: "POST",
                    url: "Procesa_Index.php",
                    data: {login: $("#Login").val(),pass: $("#pass").val()}
                }).done(function (msg) {
                    if (msg == "true") {//SI TUVIERAS PROBLEMAS, PRUEBA A PONER msg.trim() para quitarle espacios que a veces salen
                        sigue = true;
                    } else {
                        sigue = false;
                    }
                });
            }
            
            function comprobar() {
                validaLogin();
                if (!sigue) {
                    alert("Login Incorrecto");
                }
                return sigue;
            }
        </script>
    </head>
    <body>
        <form method="POST" action="Procesa_altaUsuario.php" onsubmit="return comprobar()">
            <div>Login: <input type="text" name="Login" id="Login" required/> Contraseña: <input type="password" name="Pass" id="pass" required/></div>
            <div><input type="submit" id="submit"/></div>
        </form>
    </body>
</html>

