<!DOCTYPE html>
<html>
    <body>
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
                <td>Tipo: </td>
                <td>
                    <?php
                    echo $_POST["Type"];;
                    ?>
                </td>
            </tr>
        </table>
        <?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "empresa";

// Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
        if($conn->connect_error){
            die("Connection failed: " . mysqli_connect_error());
        }

        $nombre=$_POST["Name"];
        $ape=$_POST["Surname"];
        $log=$_POST["Login"];
        $pass=$_POST["Pass"];
        $tipo=$_POST["Type"];
        $pregunta=$_POST["Question"];
        $respuesta=$_POST["Answer"];
        
        $sql = "INSERT INTO Usuarios (nombre, apellidos, login, pwd, tipo, pregunta, respuesta)
            VALUES ('$nombre', '$ape', '$log','$pass','$tipo', '$pregunta', '$respuesta' )";

        if ($conn->query($sql)===TRUE) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        mysqli_close($conn);
        ?> 
        <br/>
        <a href="index.html"><button>volver Atras</button></a>
    </body>
</html> 