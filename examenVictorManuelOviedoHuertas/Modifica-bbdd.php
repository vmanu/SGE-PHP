<!DOCTYPE html>
<html>
    <head>
        <title>Modifica-bbdd</title>
    </head>

    <body>
        <form method="POST" action="Modifica-bbdd.php">
            <table>
                <tr>
                    <td>Nombre: </td>
                    <td>
                        <?php
                        echo $_POST["Name"];
                        ?>
                    </td>
                </tr>
                <tr>
                    <td>Apellidos: </td>
                    <td>
                        <?php
                        echo $_POST["Surname"];
                        ?>
                    </td>
                </tr>
                <tr>
                    <td>Nickname: </td>
                    <td>
                        <?php
                        echo $_POST["Login"];
                        ?>
                    </td>
                </tr>
                <tr>
                    <td>Password: </td>
                    <td>
                        <?php
                        echo $_POST["Pass"];
                        ?>
                    </td>
                </tr>
                <tr>
                    <td>Tipo: </td>
                    <td>
                        <?php
                        echo $_POST["Type"];
                        ;
                        ?>
                    </td>
                </tr>
                <tr>
                    <td>Pregunta: </td>
                    <td>
                        <?php
                        echo $_POST["Question"];
                        ?>
                    </td>
                </tr>
                <tr>
                    <td>Respuesta: </td>
                    <td>
                        <?php
                        echo $_POST["Answer"];
                        ?>
                    </td>
                </tr>
                <tr>
                    <td>Fecha: </td>
                    <td>
                        <?php
                        echo $_POST["fecha"];
                        ?>
                    </td>
                </tr>
            </table>
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
//UPDATE table_name SET column1=value1,column2=value2,... WHERE some_column=some_value;
        $sql = "UPDATE Usuarios SET nombre='$nombre', apellidos='$ape', pwd='$pass', tipo='$tipo', pregunta='$pregunta', respuesta='$respuesta' WHERE login='$log'";

        if ($conn->query($sql) === TRUE) {
            echo "Updating created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        mysqli_close($conn);
        ?> 
        <br/>
        <a href="altausuario.php"><button>volver</button></a>
    </body>
</html> 