<html>
    <head>
        <title>Modifica Usuario</title>
        <script src="js/libs/jquery/jquery.js" type="text/javascript"></script>
        <script src="js/bootstrap.min.js" type="text/javascript"></script>
        <script>
           $(document).ready(function () {
                modificarCampos();
            });

            function modificarCampos() {
                $.ajax({
                    type: "POST",
                    dataType: "json",
                    url: "Procesa_MostrarInfo.php",
                    data: {emp_no: $("#emp_no").val()}
                }).done(function (data) {
                   $("#fecha").val(data.fecha_alt);
                    if(data.salario>=2000){
                        $("#salarioma").prop("checked",true);
                    }else{
                        $("#salariome").prop("checked",true);
                    }
                });
            }
        </script>
    </head>
    <body>
        <div id="muestra">
            <form id="form" method="POST" action="Procesa_modificaEmpl.php" >
                <select id="emp_no" name="emp_no"  onchange="modificarCampos()">
                    <?php
                    include './ConectorBaseDatos.php';
                    $conn = new ConectorBaseDatos();
                    $depto=$_POST["depto"];
                    $sql = "SELECT * FROM empleados WHERE dept_no='$depto'";
                    $result = $conn->ejecutar($sql, "", "");
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<option value='" . $row["emp_no"] . "'>". $row["emp_no"] . "-" . $row["apellido"] ."-" . $row["oficio"] . "</option>";
                        }
                    } else {
                        echo "0 results";
                    }
                    ?>
                </select>
                <table>
                    <tr>
                        <td>Fecha: </td>
                        <td>
                            <input type="date" id="fecha" name="fecha"/>
                        </td>
                    </tr>
                    <tr>
                        <td>Salario: </td>
                        <td>
                            <input type="radio" name="salario" id="salarioma" value=">"/>>=2000<br/>
                            <input type="radio" name="salario" id="salariome" value="<"/><2000<br/>
                        </td>
                    </tr>
                </table>
                <input type="submit" id="submit" value="Modificar"/>
            </form>
            
        </div>
    </body>
</html> 