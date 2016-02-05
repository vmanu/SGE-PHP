<?php
$nombre = $_POST["Name"];
$ape = $_POST["Surname"];
$log = $_POST["Login"];
$pwd = $_POST["Pass"];
$pass = md5($pwd);
$tipo = $_POST["Type"];
$pregunta = $_POST["Question"];
$respuesta = $_POST["Answer"];
echo "
        <table>
            <tr>
                <td>Nombre: </td>
                <td>
                    $nombre
                </td>
            </tr>
            <tr>
                <td>Apellidos: </td>
                <td>
                    $ape
                </td>
            </tr>
            <tr>
                <td>Nickname: </td>
                <td>
                    $log
                </td>
            </tr>
            <tr>
                <td>Password: </td>
                <td>
                    $pass
                </td>
            </tr>
            <tr>
                <td>Tipo: </td>
                <td>
                    $tipo
                </td>
            </tr>
            <tr>
                <td>Pregunta: </td>
                <td>
                    $pregunta
                </td>
            </tr>
            <tr>
                <td>Respuesta: </td>
                <td>
                    $respuesta
                </td>
            </tr>
        </table>";

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "empresa";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . mysqli_connect_error());
}

if ($pwd == "") {
    $sql = "UPDATE Usuarios SET nombre='$nombre', apellidos='$ape', tipo='$tipo', pregunta='$pregunta', respuesta='$respuesta' WHERE login='$log'";
} else {
    $sql = "UPDATE Usuarios SET nombre='$nombre', apellidos='$ape', pwd='$pass', tipo='$tipo', pregunta='$pregunta', respuesta='$respuesta' WHERE login='$log'";
}


if ($conn->query($sql) === TRUE) {
    echo "Updating created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
mysqli_close($conn);
