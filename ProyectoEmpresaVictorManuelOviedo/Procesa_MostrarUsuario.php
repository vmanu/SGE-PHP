<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "empresa";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . mysqli_connect_error());
}
$log = $_POST["login"];
$sql = "SELECT * FROM usuarios WHERE login='$log'";
$result = mysqli_query($conn, $sql);
if ($result != null) {
    $resultado = $result->fetch_assoc(); //Esta linea se puede obviar, en el ajax de recogida, se pondria en vez de data.apellidos, se pondria data[0]['apellido'];
    if (is_null($resultado)) {
        echo false;
    } else {
        echo json_encode($resultado);
    }
}
