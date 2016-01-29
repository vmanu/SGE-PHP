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
        <script>
            function comprobar() {
                var devuelve=false;
                $.ajax({
                    type: "POST",
                    url: "Procesa_Index.php",
                    data: {login: $("#Login").val(),pass: $("#pass").val(),cbox: document.form.cbox.checked}
                }).done(function (msg) {
                    if (msg == "true") {//SI TUVIERAS PROBLEMAS, PRUEBA A PONER msg.trim() para quitarle espacios que a veces salen
                        window.location="Menu.php";
                        devuelve = true;
                    } else {
                        devuelve = false;
                        alert("Login Incorrecto");
                    }
                });
                return devuelve;
            }
        </script>
    </head>
    <body>
        <form method="POST" name="form" action="Menu.php" onsubmit="return comprobar()">
            <div>Login: <input type="text" name="Login" id="Login" required value="<?php if(isset($_COOKIE["login"])){echo $_COOKIE["login"];}else{echo "";}?>"/> Contraseña: <input type="password" name="Pass" id="pass" required/></div>
            <div><input type="submit" id="submit" value="Entrar"/></div>
            <input type="checkbox" name="cbox"/> Recordar Usuario
        </form>
    </body>
</html>

