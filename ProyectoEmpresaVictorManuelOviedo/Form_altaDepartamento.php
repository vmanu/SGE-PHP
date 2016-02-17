<?php
include './ControlSesion.php';
$sesion=new ControlSesion();
$sesion->gestiona();
?>
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
        <script src="js/libs/jquery/jquery.js" type="text/javascript"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script>
            function comprobar() {
                $.ajax({
                    type: "POST",
                    url: "Procesa_altaDepartamento.php",
                    data: {dept_no: $("#depto_no").val(),Loc: $("#loc").val(),Name: $("#nombre").val()}
                }).done(function (msg) {
                    $("#muestra").html(msg);
                    
                });
                return false;
            }
        </script>
    </head>
    <body>
        <div id="muestra">
            <form method="POST" action="" onsubmit="return comprobar()">
                <div class="col-xs-12"><br/></div>
                <div class="col-xs-12" style="margin: 5px">
                    <div class="col-xs-2"></div><div class="col-xs-3" style="text-align: right">Id Departamento:</div><div class="col-xs-5"><input type="text" name="depto_no" id="depto_no" required/></div><div class='col-xs-2'></div>
                </div>
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
        </div>
    </body>
</html>

