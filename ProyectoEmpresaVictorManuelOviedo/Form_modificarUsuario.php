<!DOCTYPE html>
<html>
    <head>
        <title>Modifica Usuario</title>
        <script src="js/libs/jquery/jquery.js" type="text/javascript"></script>
        <script>
            $(document).ready(function(){
               $("#form").load();
            });
        </script>
    </head>

    <body>
        <select name="Login">
            <?php
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "empresa";
            $conn = new mysqli($servername, $username, $password, $dbname);
            if ($conn->connect_error) {
                die("Connection failed: " . mysqli_connect_error());
            }
            $sql = "SELECT login FROM usuarios";
            $result = $conn->query($sql);
            $primero=true;
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<option value='" . $row["login"] . "'>" . $row["login"] . "</option>";
                    if($primero){
                        $primero=false;
                        $nombre=$row["nombre"];
                        $ape=$row["apellidos"];
                        $pregunta=$row["pregunta"];
                        $respuesta=$row["respuesta"];
                        $tipo=$row["tipo"];
                    }
                }
            } else {
                echo "0 results";
            }
            mysqli_close($conn);
            ?>
        </select>

        <form id="form" method="POST" action="Procesa_modificaUsuario.php">
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
                        <?=$ape ?>
                               />
                    </td>
                </tr>
                <tr>
                    <td>Tipo: </td>
                    <td>
                        <select style="width: 15%" name="Type" id="tipo">
                            <option value="Administrador" <?php
                            if ($tipo == "Administrador") {
                                echo "selected";
                            }
                            ?>>Administrador</option>
                            <option value="Normal" <?php
                            if ($tipo == "Normal") {
                                echo "selected";
                            }
                            ?>>Normal</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Pregunta: </td>
                    <td>
                        <div><input type="radio" name="Question" value="¿Nombre del padre?" <?php
                                    if ($pregunta == "¿Nombre del padre?") {
                                        echo "checked";
                                    }
                                    ?> />¿Nombre del padre? <input type="radio" name="Question" value="¿Nombre de la madre?" <?php
                                    if ($pregunta == "¿Nombre de la madre?") {
                                        echo "checked";
                                    }
                                    ?>/>¿Nombre de la madre? <input type="radio" name="Question" value="¿Cual fue tu primer colegio?" <?php
                                    if ($pregunta == "¿Cual fue tu primer colegio?") {
                                        echo "checked";
                                    }
                                    ?>/>¿Cual fue tu primer colegio? <input type="radio" name="Question" value="¿Como se llamaba tu primera mascota?" <?php
                                    if ($pregunta == "¿Como se llamaba tu primera mascota?") {
                                        echo "checked";
                                    }
                                    ?>/> ¿Como se llamaba tu primera mascota?</div>
                    </td>
                </tr>
                <tr>
                    <td>Respuesta: </td>
                    <td><input type="text" name="Answer" id="answer" required value=
<?= $respuesta ?>
                               />
                    </td>
                </tr>
            </table>
            <input type="submit" id="submit" value="Modificar"/>
        </form>
    </body>
</html> 