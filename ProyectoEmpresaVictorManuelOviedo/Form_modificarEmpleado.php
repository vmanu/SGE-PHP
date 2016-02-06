<!DOCTYPE html>
<html>
    <head>
        <title>Modifica Usuario</title>
        <script src="js/libs/jquery/jquery.js" type="text/javascript"></script>
        <script>
            $(document).ready(function () {
                modificarCampos();
            });

            function modificarCampos() {
                var valor;
                $.ajax({
                    type: "POST",
                    dataType: "json",
                    url: "Procesa_MostrarEmpleado.php",
                    data: {emp_no: $("#emp_no").val()}
                }).done(function (data) {
                    $("#apellido").val(data.apellido);
                    $("#oficio").val(data.oficio);
                    $("#dir").val(data.dir);
                    $("#fecha").val(data.fecha_alt);
                    $("#salario").val(data.salario);
                    $("#comision").val(data.comision);
                    $("#depto").val(""+data.dept_no);
                });
                
            }

            function comprobar() {
                $.ajax({
                    type: "POST",
                    url: "Procesa_modificaEmpleado.php",
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
                <select id="emp_no" name="emp_no"  onchange="modificarCampos()">
                    <?php
                    include './ConectorBaseDatos.php';
                    $conn = new ConectorBaseDatos();
                    $sql = "SELECT emp_no, apellido FROM empleados";
                    $result = $conn->ejecutar($sql, "", "");
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<option value='" . $row["emp_no"] . "'>" . $row["emp_no"] . "-" . $row["apellido"] . "</option>";
                        }
                    } else {
                        echo "0 results";
                    }
                    ?>
                </select>
                <table>
                    <tr>
                        <td>Apellido: </td>
                        <td><input type="text" name="Apellido" id="apellido" />
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
                                $conn2 = new ConectorBaseDatos();
                                $sql2 = "SELECT * FROM departamentos";
                                $result2 = $conn2->ejecutar($sql2, "", "");
                                if ($result2->num_rows > 0) {
                                    while ($row = $result2->fetch_assoc()) {
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
                <input type="submit" id="submit" value="Modificar"/>
            </form>
        </div>
    </body>
</html> 