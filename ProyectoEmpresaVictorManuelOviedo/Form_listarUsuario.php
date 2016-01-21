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
        <table>
            <tr>
                <td>Administrador</td><td>Normal</td>
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
            $sql = "SELECT login, nombre, tipo FROM usuarios";
            $result = $conn->query($sql);
            $dataAdmin[];
            $dataNorm[];
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $muestra=$row["login"]+" ["+$row["nombre"]+"]";
                    if($row["tipo"]==="Administrador"){
                        $dataAdmin[]=$muestra;
                    }else{
                        $dataNorm[]=$muestra;
                    }
                }
                //$dataAdmin[]//
            } else {
                echo "0 results";
            }
            mysqli_close($conn);
            ?>
        </table>
    </body>
</html> 