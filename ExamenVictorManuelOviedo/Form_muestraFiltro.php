<html>
    <head>
        <title>Modifica Usuario</title>
        <script src="js/libs/jquery/jquery.js" type="text/javascript"></script>
        <script src="js/bootstrap.min.js" type="text/javascript"></script>
        <script>
           

            function modificarCampos() {
                $.ajax({
                    type: "POST",
                    dataType: "json",
                    url: "Procesa_MostrarEmpleado.php",
                    data: {depto: $("#depto").val()}
                }).done(function (data) {
//                    $("#apellido").val(data.apellido);
//                    $("#oficio").val(data.oficio);
//                    $("#dir").val(data.dir);
//                    $("#fecha").val(data.fecha_alt);
//                    $("#salario").val(data.salario);
//                    $("#comision").val(data.comision);
//                    $("#depto").val(""+data.dept_no);
                    $("#empleado").html(data);
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
            <form id="form" method="POST" action="Procesa_MostrarEmpleado.php"  name="form">
                <select id="depto" name="depto"  onchange="modificarCampos()">
                    <?php
                    include './ConectorBaseDatos.php';
                    $conn = new ConectorBaseDatos();
                    $sql = "SELECT * FROM departamentos";
                    $result = $conn->ejecutar($sql, "", "");
                    $filtronom=$_POST["Nombre"];
                    $filtroloc=$_POST["Localizacion"];
                    echo $filtroloc;
                    echo $filtronom;
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            if($filtroloc=="on"&&$filtronom=="on"){
                                echo "<option value='" . $row["dept_no"] . "'>". $row["dept_no"] . "-" . $row["dnombre"] ."-" . $row["loc"] . "</option>";
                            }else{
                                if($filtroloc=="on"){
                                    echo "<option value='" . $row["dept_no"] . "'>". $row["dept_no"] . "-" . $row["loc"] . "</option>";
                                }else{
                                    if($filtronom=="on"){
                                        echo "<option value='" . $row["dept_no"] . "'>". $row["dept_no"] . "-" . $row["dnombre"] . "</option>";
                                    }else{
                                        echo "<option value='" . $row["dept_no"] . "'>". $row["dept_no"] . "</option>";
                                    }
                                }
                            }
                        }
                    } else {
                        echo "0 results";
                    }
                    ?>
                </select>
                <input type="submit" id="submit" value="Modificar"/>
            </form>
        </div>
    </body>
</html> 