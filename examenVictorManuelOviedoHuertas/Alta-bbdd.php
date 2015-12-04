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
                $("#question").val(<?php echo $_POST["Question"];?>);
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
        <form method="POST" action="Modifica-bbdd.php">
            <table>
                <tr>
                    <td>Nombre: </td>
                    <td><input type="text" name="Name" id="name" required value=
                        <?php
                        echo $_POST["Name"];
                        ?>
                        />
                    </td>
                </tr>
                <tr>
                    <td>Apellidos: </td>
                    <td><input type="text" name="Surname" id="surname" required value=
                        <?php
                        echo $_POST["Surname"];
                        ?>
                        />
                    </td>
                </tr>
                <tr>
                    <td>Nickname: </td>
                    <td><input type="text" name="Login" id="Login" required value=
                        <?php
                        echo $_POST["Login"];
                        ?>
                        />
                    </td>
                </tr>
                <tr>
                    <td>Password: </td>
                    <td><input type="password" name="Pass" id="pass" required value=
                        <?php
                        echo $_POST["Pass"];
                        ?>
                        />
                    </td>
                </tr>
                <tr>
                    <td>Tipo: </td>
                    <td>
                        Administrador: <input type="radio" checked="" name="Type" value="Administrador" id="tipo"/> Normal: <input type="radio" name="Type" value="Normal" id="tipo"/>
                    </td>
                </tr>
                <tr>
                    <td>Pregunta: </td>
                    <td><select  name="Question" id="question">
                        <option value="¿Nombre del padre?">¿Nombre del padre?</option>
                        <option value="¿Nombre de la madre?">¿Nombre de la madre?</option>
                        <option value="¿Cual fue tu primer colegio?">¿Cual fue tu primer colegio?</option>
                        <option value="¿Como se llamaba tu primera mascota?">¿Como se llamaba tu primera mascota?</option>
                    </select>
                    </td>
                </tr>
                <tr>
                    <td>Respuesta: </td>
                    <td><input type="text" name="Answer" id="answer" required value=
                        <?php
                        echo $_POST["Answer"];
                        ?>
                        />
                    </td>
                </tr>
                <tr>
                    <td>Fecha: </td>
                    <td><input type="date" name="fecha" id="fecha" required onchange="compruebaFecha()" value=
                               <?php
                               echo $_POST["fecha"];
                               ?>
                               />
                    </td>
                </tr>
            </table>
            <input type="submit" id="submit" value="Modificar"/>
        </form>
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
        <br/>
        
    </body>
</html> 