<!DOCTYPE html>
<html>
    <head>
        <title>Modifica Usuario</title>
        <script src="js/libs/jquery/jquery.js" type="text/javascript"></script>
    </head>

    <body>
        
        <!--OBTENER A PARTIR DEL LOGIN TODOS LOS VALORES, MOSTRAR LOS DATOS EN FORMULARIO Y HACER EL SUMBIT QUE MANDE AL PROCESA_MODIFICAUSUARIO -->
        <?php
        $nombre = $_POST["Name"];
        $ape = $_POST["Surname"];
        $log = $_POST["Login"];
        $pass = $_POST["Pass"];
        $tipo = $_POST["Type"];
        $pregunta = $_POST["Question"];
        $respuesta = $_POST["Answer"];
        
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

        $sql = "INSERT INTO Usuarios (nombre, apellidos, login, pwd, tipo, pregunta, respuesta)
            VALUES ('$nombre', '$ape', '$log','$pass','$tipo', '$pregunta', '$respuesta' )";

        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        mysqli_close($conn);
        ?> 
        <form method="POST" action="Procesa_modificaUsuario.php">
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
                            <option value="Administrador" <?php if($tipo=="Administrador"){echo "selected";} ?>>Administrador</option>
                            <option value="Normal" <?php if($tipo=="Normal"){echo "selected";} ?>>Normal</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Pregunta: </td>
                    <td>
                        <div><input type="radio" name="Question" value="¿Nombre del padre?" <?php if($pregunta=="¿Nombre del padre?"){echo "checked";} ?> />¿Nombre del padre? <input type="radio" name="Question" value="¿Nombre de la madre?" <?php if($pregunta=="¿Nombre de la madre?"){echo "checked";} ?>/>¿Nombre de la madre? <input type="radio" name="Question" value="¿Cual fue tu primer colegio?" <?php if($pregunta=="¿Cual fue tu primer colegio?"){echo "checked";} ?>/>¿Cual fue tu primer colegio? <input type="radio" name="Question" value="¿Como se llamaba tu primera mascota?" <?php if($pregunta=="¿Como se llamaba tu primera mascota?"){echo "checked";}?>/> ¿Como se llamaba tu primera mascota?</div>
                    </td>
                </tr>
                <tr>
                    <td>Respuesta: </td>
                    <td><input type="text" name="Answer" id="answer" required value=
                        <?= $respuesta ?>
                               />
                    </td>
                </tr>
                <tr>
                    <td>Fecha: </td>
                    <td><input type="date" name="fecha" id="fecha" required onchange="compruebaFecha()" value=
                        <?= $_POST["fecha"]; ?>
                               />
                    </td>
                </tr>
            </table>
            <input type="submit" id="submit" value="Modificar"/>
        </form>
    </body>
</html> 