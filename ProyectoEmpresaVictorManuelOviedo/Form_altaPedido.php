<?php
include './ControlSesion.php';
$sesion = new ControlSesion();
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
        <title>Alta Pedido</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="js/libs/jquery/jquery.js" type="text/javascript"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script>
            function comprobar() {
                $.ajax({
                    type: "POST",
                    url: "Procesa_altaPedido.php",
                    data: {codped: $("#CodPed").val(), fechaped: $("#FechaPed").val(), fechaesp: $("#FechaEsp").val(), fechaent: $("#FechaEnt").val(), estado: $("#Estado").val(), comentario: $("#Comentario").val(), cliente: $("#Cliente").val()}
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
                    <div class="col-xs-2"></div><div class="col-xs-3" style="text-align: right">Codigo Pedido:</div><div class="col-xs-5"><input type="text" name="CodPed" id="CodPed" required/></div><div class='col-xs-2'></div>
                </div>
                <div class="col-xs-12" style="margin: 5px">
                    <div class="col-xs-2"></div><div class="col-xs-3" style="text-align: right">Fecha Pedido:</div><div class="col-xs-5"><input type="date" name="FechaPed" id="FechaPed" required/></div><div class='col-xs-2'></div>
                </div>
                <div class="col-xs-12" style="margin: 5px">
                    <div class="col-xs-2"></div><div class="col-xs-3" style="text-align: right">Fecha Esperada:</div><div class="col-xs-5"><input type="date" name="FechaEsp" id="FechaEsp" /></div><div class='col-xs-2'></div>
                </div>
                <div class="col-xs-12" style="margin: 5px">
                    <div class="col-xs-2"></div><div class="col-xs-3" style="text-align: right">Fecha Entrega:</div><div class="col-xs-5"><input type="date" name="FechaEnt" id="FechaEnt" required/></div><div class='col-xs-2'></div>
                </div>
                <div class="col-xs-12" style="margin: 5px">
                    <div class="col-xs-2"></div><div class="col-xs-3" style="text-align: right">Estado:</div><div class="col-xs-5"><input type="text" name="Estado" id="Estado" required/></div><div class='col-xs-2'></div>
                </div>
                <div class="col-xs-12" style="margin: 5px">
                    <div class="col-xs-2"></div><div class="col-xs-3" style="text-align: right">Comentarios:</div><div class="col-xs-5"><input type="text" name="Comentario" id="Comentario" /></div><div class='col-xs-2'></div>
                </div>
                <div class="col-xs-12" style="margin: 5px">
                    <div class="col-xs-2"></div><div class="col-xs-3" style="text-align: right">Codigo Cliente:</div><div class="col-xs-5"><select id="Cliente" name="Cliente">
                            <?php
                            include './ConectorBaseDatos.php';
                            $conn = new ConectorBaseDatos();
                            $sql = "SELECT * FROM clientes";
                            $result = $conn->ejecutar($sql, "", "");
                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    echo "<option value='" . $row["CodigoCliente"] . "'>" . $row["NombreContacto"] . " " . $row["ApellidoContacto"] . "</option>";
                                }
                            } else {
                                echo "0 results";
                            }
                            ?>
                        </select></div><div class='col-xs-2'></div>
                </div>
                <div class="col-xs-12" style="margin: 5px; text-align: center">
                    <input type="submit" value="enviar"/>
                </div>
            </form>
        </div>
    </body>
</html>

