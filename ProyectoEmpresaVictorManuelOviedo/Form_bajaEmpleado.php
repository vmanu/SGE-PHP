<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>Baja Empleado</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="js/libs/jquery/jquery.js" type="text/javascript"></script>
        <script>
            function comprobar() {
                $.ajax({
                    type: "POST",
                    url: "Procesa_bajaEmpleado.php",
                    data: {emp_no: $("#emp_no").val()}
                }).done(function (msg) {
                    $("#muestra").html(msg);
                });
                return false;
            }
        </script>
    </head>
    <body><div id="muestra">
            <form method="POST" action="" onsubmit="return comprobar()">
                Selecciona empleado
                <select name="emp_no" id="emp_no">
                    <?php
                    include './ConectorBaseDatos.php';
                    $conn = new ConectorBaseDatos();
                    $sql = "SELECT * FROM empleados";
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
                <div><input type="submit" id="submit" value="Dar de baja"/></div>
            </form>
        </div>
    </body>
</html>


