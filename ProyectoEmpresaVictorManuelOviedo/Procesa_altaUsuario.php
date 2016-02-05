<?php
$nombre = $_POST["Name"];
$ape = $_POST["Surname"];
$log = $_POST["Login"];
$pass = md5($_POST["Pass"]);
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

echo "<table>
            <tr>
                <td>Nombre: </td>
                <td>$nombre</td>
            </tr>
            <tr>
                <td>Apellidos: </td>
                <td>$ape</td>
            </tr>
            <tr>
                <td>Nickname: </td>
                <td>$log</td>
            </tr>
            <tr>
                <td>Password: </td>
                <td>$pass</td>
            </tr>
            <tr>
                <td>Tipo: </td>
                <td>$tipo</td>
            </tr>
            <tr>
                <td>Pregunta: </td>
                <td>$pregunta</td>
            </tr>
            <tr>
                <td>Respuesta: </td>
                <td>$respuesta</td>
            </tr>
        </table>"?>