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
                var date=new Date($("#fecha").val());
                var muestra=date.getFullYear()+"/"+(date.getMonth()+1)+"/"+date.getDate();
                $.ajax({
                    type: "POST",
                    url: "Procesa_altaEmpleado.php",
                    data: {emp_no: $("#emp_no").val(),apellido: $("#apellido").val(),oficio: $("#oficio").val(),dir: $("#dir").val(),fecha: $("#fecha").val(),salario: $("#salario").val(),comision: $("#comision").val(),dept_no: $("#depto").val()}
                }).done(function (msg) {
                    $("#muestra").html(msg);
                    
                });
                return false;
            }
        </script>
    </head>
    <body>
        <div id="muestra">
            <form id="form" method="POST" action="" onsubmit="return comprobar()" name="form">
                <table>
                    <tr>
                        <td>Id Empleado: </td>
                        <td><input type="text" name="emp_no" id="emp_no" />
                        </td>
                    </tr>
                    <tr>
                        <td>Apellido: </td>
                        <td><input type="text" name="apellido" id="apellido" />
                        </td>
                    </tr>
                    <tr>
                        <td>Oficio: </td>
                        <td><input type="text" name="oficio" id="oficio" required/>
                        </td>
                    </tr>
                    <tr>
                        <td>Dirigido (id del superior): </td>
                        <td><input type="text" name="dir" id="dir" required/>
                        </td>
                    </tr>
                    <tr>
                        <td>Fecha: </td>
                        <td>
                            <input type="date" id="fecha" name="fecha"/>
                        </td>
                    </tr>
                    <tr>
                        <td>Salario: </td>
                        <td>
                            <input type="text" name="salario" id="salario"/>
                        </td>
                    </tr>
                    <tr>
                        <td>Comision: </td>
                        <td><input type="text" name="comision" id="comision" required/>
                        </td>
                    </tr>
                    <tr>
                        <td>Departamento: </td>
                        <td>
                            <select name="depto" id="depto">
                                <?php
                                include './ConectorBaseDatos.php';
                                $conn = new ConectorBaseDatos();
                                $sql = "SELECT * FROM departamentos";
                                $result = $conn->ejecutar($sql, "", "");
                                if ($result->num_rows > 0) {
                                    while ($row = $result->fetch_assoc()) {
                                        echo "<option value='" . $row["dept_no"] . "'>" . $row["dept_no"] . "-" . $row["dnombre"] . "</option>";
                                    }
                                } else {
                                    echo "0 results";
                                }
                                ?>
                            </select>
                        </td>
                    </tr>
                </table>
                <input type="submit" id="submit" value="Dar Alta"/>
            </form>
        </div>
    </body>
</html>

