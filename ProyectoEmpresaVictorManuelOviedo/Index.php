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
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
        <script src="js/libs/jquery/jquery.js" type="text/javascript"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
        <script>
            function comprobar() {
                var devuelve = false;
                $.ajax({
                    type: "POST",
                    url: "Procesa_Index.php",
                    data: {login: $("#Login").val(), pass: $("#pass").val(), cbox: document.form.cbox.checked, eva: "submitNormal"}
                }).done(function (msg) {
                    if (msg == "true Administrador") {//SI TUVIERAS PROBLEMAS, PRUEBA A PONER msg.trim() para quitarle espacios que a veces salen
                        window.location = "Menu.php?tipo=Admin";
                        devuelve = true;
                    } else {
                        if (msg == "true Normal") {
                            window.location = "Menu.php?tipo=Normal";
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
    <body class="container-fluid">
        <div class="col-xs-12" style="text-align: center; font: bold 24px cursive">MADERID S.A.</div>
        <div class="col-xs-12"><br/></div>
        <form class="form-group" method="POST" name="form" action="Menu.php" onsubmit="return comprobar()">
            <div class="col-xs-12">
                <div class="col-xs-2"></div>
                <div class="col-xs-3" style="text-align: right">Login:</div>
                <div class="col-xs-5"><input type="text" name="Login" id="Login" required style="width: 100%" value="<?php
                    if (isset($_COOKIE["login"])) {
                        echo $_COOKIE["login"];
                    } else {
                        echo "";
                    }
                    ?>"/></div>
                <div class="col-xs-2"></div>
            </div>
            <div class="col-xs-12">
                <div class="col-xs-2"></div>
                <div class="col-xs-3" style="text-align: right">Contraseña:</div>
                <div class="col-xs-5"><input type="password" name="Pass" id="pass" required style="width: 100%"/></div>
                <div class="col-xs-2"></div>
            </div>
            <div class="col-xs-12"><br/></div>
            <div class="col-xs-5"></div><div class="col-xs-7"><input type="submit" id="submit" value="Entrar"/></div>
            <div class="col-xs-5"></div><div class="col-xs-7"><input type="checkbox" name="cbox"/> Recordar Usuario</div>
            <div class="col-xs-5"></div><div class="col-xs-7"><button type="button" onclick="gimmePass()" onblur="quitaTexto()">Se me ha olvidado la contraseña</button></div>
            <div class="col-xs-5"></div><div class="col-xs-7"><span/></div>
        </form>
    </body>
</html>

