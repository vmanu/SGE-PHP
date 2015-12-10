<!DOCTYPE html>
<html>
    <head>
        <title>Alta-bbdd</title>
        <script src="js/libs/jquery/jquery.js" type="text/javascript"></script>
        <script>
            var date = new Date();
            var dia = date.getDate();
            var mes = date.getMonth();
            var anyo = date.getFullYear();

            $(document).ready(function () {
                $("#question").val(<?php echo $_POST["Question"]; ?>);
            });

            function compruebaFecha() {
                var diaguardado = $("#fecha").val();
                var anno = diaguardado.substring(0, diaguardado.indexOf("-")) * 1;
                var month = diaguardado.substring(diaguardado.indexOf("-") + 1, diaguardado.lastIndexOf("-")) * 1;
                var day = diaguardado.substring(diaguardado.lastIndexOf("-") + 1) * 1;
                if (anno < anyo || (anno === anyo && month === (mes + 1) && day === dia)) {
                    alert("Fecha no es posterior a la actual");
                } else {
                    if (anno === anyo && month < (mes + 1)) {
                        alert("Fecha no es posterior a la actual");
                    } else {
                        if (anno === anyo && month === (mes + 1) && day < dia) {
                            alert("Fecha no es posterior a la actual");
                        }
                    }
                }
            }
        </script>
    </head>

    <body>
        <?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "empresa";

// Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . mysqli_connect_error());
        }

        $nombre = $_POST["Name"];
        $ape = $_POST["Surname"];
        $log = $_POST["Login"];
        $pass = $_POST["Pass"];
        $tipo = $_POST["Type"];
        $pregunta = $_POST["Question"];
        $respuesta = $_POST["Answer"];

        $sql = "INSERT INTO Usuarios (nombre, apellidos, login, pwd, tipo, pregunta, respuesta)
            VALUES ('$nombre', '$ape', '$log','$pass','$tipo', '$pregunta', '$respuesta' )";

        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        mysqli_close($conn);
        ?> 
        <form method="POST" action="Modifica-bbdd.php">
            <table>
                <tr>
                    <td>Nombre: </td>
                    <td><input type="text" name="Name" id="name" required value=
                        <?= $nombre; ?>
                               />
                    </td>
                </tr>
                <tr>
                    <td>Apellidos: </td>
                    <td><input type="text" name="Surname" id="surname" required value=
                        <?= $ape ?>
                               />
                    </td>
                </tr>
                <tr>
                    <td>Nickname: </td>
                    <td><input type="text" name="Login" id="Login" required readonly value=
                        <?= $log ?>
                               />
                    </td>
                </tr>
                <tr>
                    <td>Password: </td>
                    <td><input type="password" name="Pass" id="pass" required value=
                        <?= $pass ?>
                               />
                    </td>
                </tr>
                <tr>
                    <td>Tipo: </td>
                    <td>
                        <select style="width: 15%" name="Type" id="tipo">
                            <option value="Administrador" <? if($tipo=="Administrador"){echo "selected";} ?>>Administrador</option>
                            <option value="Normal" <? if($tipo=="Normal"){echo "selected";} ?>>Normal</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Pregunta: </td>
                    <td>
                        <div><input type="radio" name="Question" value="¿Nombre del padre?" <? if($pregunta=="¿Nombre del padre?"){echo "checked";} ?>/>¿Nombre del padre? <imput type="radio" name="Question" value="¿Nombre de la madre?" <? if($pregunta=="¿Nombre de la madre?"){echo "checked";} ?>/>¿Nombre de la madre?<input type="radio" name="Question" value="¿Cual fue tu primer colegio?" <? if($pregunta=="¿Cual fue tu primer colegio?"){echo "checked";} ?>/>¿Cual fue tu primer colegio?<input type="radio" name="Question" value="¿Como se llamaba tu primera mascota?" <? if($pregunta=="¿Como se llamaba tu primera mascota?"){echo "checked";} ?>/>¿Como se llamaba tu primera mascota?</div>
                    </td>
                </tr>
                <tr>
                    <td>Respuesta: </td>
                    <td><input type="text" name="Answer" id="answer" required value=
                        <?=$respuesta?>
                               />
                    </td>
                </tr>
                <tr>
                    <td>Fecha: </td>
                    <td><input type="date" name="fecha" id="fecha" required onchange="compruebaFecha()" value=
                        <?=$_POST["fecha"];?>
                               />
                    </td>
                </tr>
            </table>
            <input type="submit" id="submit" value="Modificar"/>
        </form>

        <br/>

    </body>
</html> 