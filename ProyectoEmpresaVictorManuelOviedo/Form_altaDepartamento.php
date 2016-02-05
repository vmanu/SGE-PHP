<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>Alta Usuario</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
        <script src="js/libs/jquery/jquery.js" type="text/javascript"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
        <script>
            var sigue = false;
            function validaLogin() {
                $.ajax({
                    type: "POST",
                    url: "Procesa_verificacion_login.php",
                    data: {login: $("#Login").val()}
                }).done(function (msg) {
                    if (msg == "true") {//SI TUVIERAS PROBLEMAS, PRUEBA A PONER msg.trim() para quitarle espacios que a veces salen
                        $("#texto").text("Login Valido").css("color", "lime");
                        sigue = true;
                    } else {
                        if ($("#Login").val() != "") {
                            $("#texto").text("Login Invalido").css("color", "red");
                        } else {
                            $("#texto").text("")
                        }
                        sigue = false;
                    }
                });
            }

            function comprobar() {
                if (!sigue) {
                    alert("comprueba los campos");
                }
                return sigue;
            }
        </script>
    </head>
    <body>
        <form method="POST" action="Procesa_altaDepartamento.php" onsubmit="return comprobar()">
            <div class="col-xs-12"><br/></div>
            <div class="col-xs-12" style="margin: 5px">
                <div class="col-xs-2"></div><div class="col-xs-3" style="text-align: right">Nombre Departamento:</div><div class="col-xs-5"><input type="text" name="nombre" id="nombre" required/></div><div class='col-xs-2'></div>
            </div>
            <div class="col-xs-12" style="margin: 5px">
                <div class="col-xs-2"></div><div class="col-xs-3" style="text-align: right">Localizacion:</div><div class="col-xs-5"><input name="loc" id="loc" /></div><div class='col-xs-2'></div>
            </div>
            <div class="col-xs-12" style="margin: 5px; text-align: center">
                <input type="submit" value="enviar"/>
            </div>
        </form>
    </body>
</html>

