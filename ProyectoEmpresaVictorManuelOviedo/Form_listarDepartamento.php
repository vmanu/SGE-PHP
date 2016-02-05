<!DOCTYPE html>
<html>
    <head>
        <title>Modifica Usuario</title>
        <script src="js/libs/jquery/jquery.js" type="text/javascript"></script>
        <script>
            $(document).ready(function () {
                $.ajax({
                    type: "POST",
                    dataType: "json",
                    url: "Procesa_ListadoUsuario.php",
                    data: {}
                }).done(function (data) {
                    alert(data);
                    console.log(data);
                    alert("comprueba: " + data[0]['tipo']);
                    alert(data[0]['tipo'] === "Administrador");
                    for (var i = 0; data[i] != null; i++) {
                        if (data[i]['tipo'] === "Administrador") {

                        } else {

                        }
                    }
                    $("#name").val(data.nombre);
                    $("#surname").val(data.apellidos);
                    $("#tipo").val(data.tipo);
                    $("#answer").val(data.respuesta);
                    switch (data.pregunta) {
                        case "¿Nombre del padre?":
                            $("#pa").prop("checked", "true");
                            break;
                        case "¿Nombre de la madre?":
                            $("#ma").prop("checked", "true");
                            break;
                        case "¿Cual fue tu primer colegio?":
                            $("#cole").prop("checked", "true");
                            break;
                        case "¿Como se llamaba tu primera mascota?":
                            $("#mascota").prop("checked", "true");
                            break;
                    }
                });
            });


        </script>
    </head>
    <body>
        <table style="border-collapse: collapse; text-align: center">
            <tr>
                <td style="border:1px black solid; padding:5px">Administrador</td><td style="border:1px black solid; padding:5px">Normal</td>
            </tr>
            <?php
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "empresa";
            $conn = new mysqli($servername, $username, $password, $dbname);
            if ($conn->connect_error) {
                die("Connection failed: " . mysqli_connect_error());
            }
            $sql = "SELECT login, nombre, tipo FROM usuarios WHERE tipo='Administrador'";
            $sql2 = "SELECT login, nombre, tipo FROM usuarios WHERE tipo='Normal'";
            $result = mysqli_query($conn, $sql);
            $result2 = mysqli_query($conn, $sql2);
            $row = mysqli_fetch_array($result);
            $row2 = mysqli_fetch_array($result2);
            while ($row||$row2) {
                $muestra1=$row['nombre']." (".$row['login'].")";
                $muestra2=$row2['nombre']." (".$row2['login'].")";
                echo "<tr>";
                if($muestra1==" ()"){
                    echo "<td style='border:1px black solid; padding:5px'>-</td>";
                }else{
                    echo "<td style='border:1px black solid; padding:5px'>".$muestra1."</td>";
                }
                if($muestra2==" ()"){
                    echo "<td style='border:1px black solid; padding:5px'>-</td>";
                }else{
                    echo "<td style='border:1px black solid; padding:5px'>".$muestra2."</td>";
                }
                echo "</tr>";
                $row = mysqli_fetch_array($result);
                $row2 = mysqli_fetch_array($result2);
            }
            mysqli_close($conn);
            ?>
        </table>
    </body>
</html> 