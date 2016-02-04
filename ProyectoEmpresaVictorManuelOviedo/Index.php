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
                var devuelve = false;
                $.ajax({
                    type: "POST",
                    url: "Procesa_Index.php",
                    data: {login: $("#Login").val(), pass: $("#pass").val(), cbox: document.form.cbox.checked, eva: "submitNormal"}
                }).done(function (msg) {
                    if (msg == "true Administrador") {//SI TUVIERAS PROBLEMAS, PRUEBA A PONER msg.trim() para quitarle espacios que a veces salen
                        window.location = "MenuAdministrador.php";
                        devuelve = true;
                    } else {
                        if (msg == "true Normal") {
                            window.location = "MenuNormal.php";
                            devuelve = true;
                        } else {
                            devuelve = false;
                            alert("Login Incorrecto");
                        }
                    }
                });
                return devuelve;
            }

            function gimmePass() {
                var log = $("#Login").val();
                if (log == "") {
                    $("#submit").click();
                } else {
                    $.ajax({
                        type: "POST",
                        url: "Procesa_Index.php",
                        data: {login: $("#Login").val(), eva: "submitRecuperaPass"}
                    }).done(function (msg) {
                        if (msg == "true") {//SI TUVIERAS PROBLEMAS, PRUEBA A PONER msg.trim() para quitarle espacios que a veces salen
                            window.location = "Form_confirmaPregunta.php?login="+$( "#Login" ).val();
                        } else {
                            $("span").text("Introduzca usuario existente").css("color", "red").show();
                        }
                    });
                }
            }

            function quitaTexto() {
                $("span").hide();
            }
        </script>
    </head>
    <body>
        <form method="POST" name="form" action="Menu.php" onsubmit="return comprobar()">
            <div>Login: <input type="text" name="Login" id="Login" required value="<?php
                if (isset($_COOKIE["login"])) {
                    echo $_COOKIE["login"];
                } else {
                    echo "";
                }
                ?>"/> <br/>Contraseña: <input type="password" name="Pass" id="pass" required/></div>
            <div><input type="submit" id="submit" value="Entrar"/></div>
            <input type="checkbox" name="cbox"/> Recordar Usuario<br/>
            <button type="button" onclick="gimmePass()" onblur="quitaTexto()">Se me ha olvidado la contraseña</button><br/>
            <span/>
        </form>
    </body>
</html>

