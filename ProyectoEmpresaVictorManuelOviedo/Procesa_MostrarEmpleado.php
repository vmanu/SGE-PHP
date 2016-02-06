<?php
include './ConectorBaseDatos.php';
$conn = new ConectorBaseDatos();
$emp_no = $_POST["emp_no"];
$sql = "SELECT * FROM empleados WHERE emp_no='$emp_no'";
$result = $conn->ejecutar($sql, "", "");
if ($result != null) {
    $resultado = $result->fetch_assoc(); //Esta linea se puede obviar, en el ajax de recogida, se pondria en vez de data.apellidos, se pondria data[0]['apellido'];
    if (is_null($resultado)) {
        echo false;
    } else {
        echo json_encode($resultado);
    }
}
