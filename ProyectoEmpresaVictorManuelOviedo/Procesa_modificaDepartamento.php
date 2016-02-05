<!DOCTYPE html>
<html>
    <head>
        <title>Modificando usuario...</title>
    </head>
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
                <td>Password: </td>
                <td>
                    <?php
                    echo md5($_POST["Pass"]);
                    ?>
                </td>
            </tr>
            <tr>
                <td>Tipo: </td>
                <td>
                    <?php
                    echo $_POST["Type"];
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
        </table>
        <?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "empresa";
        $conn = new mysqli($servername, $username, $password, $dbname);
        if ($conn->connect_error) {
            die("Connection failed: " . mysqli_connect_error());
        }
        $nombre = $_POST["Name"];
        $ape = $_POST["Surname"];
        $log = $_POST["Login"];
        $pwd = $_POST["Pass"];
        $tipo = $_POST["Type"];
        $pregunta = $_POST["Question"];
        $respuesta = $_POST["Answer"];
        if($pwd==""){
            $sql = "UPDATE Usuarios SET nombre='$nombre', apellidos='$ape', tipo='$tipo', pregunta='$pregunta', respuesta='$respuesta' WHERE login='$log'";
        }else{
            $pass=  md5($pwd);
            $sql = "UPDATE Usuarios SET nombre='$nombre', apellidos='$ape', pwd='$pass', tipo='$tipo', pregunta='$pregunta', respuesta='$respuesta' WHERE login='$log'";
        }
        

        if ($conn->query($sql) === TRUE) {
            echo "Updating created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        mysqli_close($conn);
        ?> 
        <br/>
       
    </body>
</html> 