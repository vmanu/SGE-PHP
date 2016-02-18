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
        <title>Alta Cliente</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="js/libs/jquery/jquery.js" type="text/javascript"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script>
            function comprobar() {
                $.ajax({
                    type: "POST",
                    url: "Procesa_altaCliente.php",
                    data: {codClien: $("#codClien").val(), nombreClien: $("#nombreClien").val(), nombreCont: $("#nombreCont").val(), apellidoCont: $("#apellidoCont").val(), tfno: $("#tfno").val(), fax: $("#fax").val(), direccion1: $("#direccion1").val(),direccion2: $("#direccion2").val(), ciudad: $("#ciudad").val(), region: $("#region").val(), pais: $("#pais").val(), codPos: $("#codPos").val(), credito: $("#credito").val(), empleado: $("#empleado").val()}
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
                    <div class="col-xs-2"></div><div class="col-xs-3" style="text-align: right">Codigo Cliente:</div><div class="col-xs-5"><input type="text" name="codClien" id="codClien" required/></div><div class='col-xs-2'></div>
                </div>
                <div class="col-xs-12" style="margin: 5px">
                    <div class="col-xs-2"></div><div class="col-xs-3" style="text-align: right">Nombre Cliente:</div><div class="col-xs-5"><input type="text" name="nombreClien" id="nombreClien" required/></div><div class='col-xs-2'></div>
                </div>
                <div class="col-xs-12" style="margin: 5px">
                    <div class="col-xs-2"></div><div class="col-xs-3" style="text-align: right">Nombre Contacto:</div><div class="col-xs-5"><input type="text" name="nombreCont" id="nombreCont" /></div><div class='col-xs-2'></div>
                </div>
                <div class="col-xs-12" style="margin: 5px">
                    <div class="col-xs-2"></div><div class="col-xs-3" style="text-align: right">Apellido Contacto:</div><div class="col-xs-5"><input type="text" name="apellidoCont" id="apellidoCont" required/></div><div class='col-xs-2'></div>
                </div>
                <div class="col-xs-12" style="margin: 5px">
                    <div class="col-xs-2"></div><div class="col-xs-3" style="text-align: right">Telefono:</div><div class="col-xs-5"><input type="text" name="tfno" id="tfno" required/></div><div class='col-xs-2'></div>
                </div>
                <div class="col-xs-12" style="margin: 5px">
                    <div class="col-xs-2"></div><div class="col-xs-3" style="text-align: right">Fax:</div><div class="col-xs-5"><input type="text" name="fax" id="fax" /></div><div class='col-xs-2'></div>
                </div>
                <div class="col-xs-12" style="margin: 5px">
                    <div class="col-xs-2"></div><div class="col-xs-3" style="text-align: right">Direccion1:</div><div class="col-xs-5"><input type="text" name="direccion1" id="direccion1" /></div><div class='col-xs-2'></div>
                </div>
                <div class="col-xs-12" style="margin: 5px">
                    <div class="col-xs-2"></div><div class="col-xs-3" style="text-align: right">Direccion2:</div><div class="col-xs-5"><input type="text" name="direccion2" id="direccion2" required/></div><div class='col-xs-2'></div>
                </div>
                <div class="col-xs-12" style="margin: 5px">
                    <div class="col-xs-2"></div><div class="col-xs-3" style="text-align: right">Ciudad:</div><div class="col-xs-5"><input type="text" name="ciudad" id="ciudad" required/></div><div class='col-xs-2'></div>
                </div>
                <div class="col-xs-12" style="margin: 5px">
                    <div class="col-xs-2"></div><div class="col-xs-3" style="text-align: right">Region:</div><div class="col-xs-5"><input type="text" name="region" id="region" /></div><div class='col-xs-2'></div>
                </div>
                <div class="col-xs-12" style="margin: 5px">
                    <div class="col-xs-2"></div><div class="col-xs-3" style="text-align: right">Pais:</div><div class="col-xs-5"><input type="text" name="pais" id="pais" required/></div><div class='col-xs-2'></div>
                </div>
                <div class="col-xs-12" style="margin: 5px">
                    <div class="col-xs-2"></div><div class="col-xs-3" style="text-align: right">Codigo Postal:</div><div class="col-xs-5"><input type="text" name="codPos" id="codPos" required/></div><div class='col-xs-2'></div>
                </div>
                <div class="col-xs-12" style="margin: 5px">
                    <div class="col-xs-2"></div><div class="col-xs-3" style="text-align: right">Limite Credito:</div><div class="col-xs-5"><input type="text" name="credito" id="credito" /></div><div class='col-xs-2'></div>
                </div>
                <div class="col-xs-12" style="margin: 5px">
                    <div class="col-xs-2"></div><div class="col-xs-3" style="text-align: right">Codigo Empleado:</div><div class="col-xs-5"><select id="empleado" name="empleado">
                            <?php
                            include './ConectorBaseDatos.php';
                            $conn = new ConectorBaseDatos();
                            $sql = "SELECT * FROM empleados";
                            $result = $conn->ejecutar($sql, "", "");
                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    echo "<option value='" . $row["emp_no"] . "'>" . $row["emp_no"] . " - " . $row["apellido"] . "</option>";
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

