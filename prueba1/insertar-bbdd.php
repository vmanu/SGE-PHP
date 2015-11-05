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
                <td>Año: </td>
                <td>
                    <?php
                    echo $_POST["Year"];
                    ?>
                </td>
            </tr>
            <tr>
                <td>Sexo: </td>
                <td>
                    <?php
                    $sex=($_POST["Sex"] == "V" ? "HOMBRE" : "MUJER");
                    echo ($sex);
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
        $log=$_POST["Id"];
        
        $sql = "INSERT INTO Usuarios (nombre, apellidos, login)
VALUES ('$nombre', '$ape', '$log')";

        if ($conn->query($sql)===TRUE) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        mysqli_close($conn);
        ?> 
    </body>
</html> 