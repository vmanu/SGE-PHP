<?php
include './ConectorBaseDatos.php';
$codPed = $_POST["codped"];
$fechaPed = $_POST["fechaped"];
$fechaEsp = $_POST["fechaesp"];
$fechaEnt = $_POST["fechaent"];
$estado = $_POST["estado"];
$comentario = $_POST["comentario"];
$cliente = $_POST["cliente"];
$conn = new ConectorBaseDatos();
$sql = "SELECT * FROM clientes WHERE CodigoCliente=$cliente";
$result = $conn->ejecutar($sql, "", "");
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $textCliente= "CLIENTE\n  Codigo Cliente: " . $row["CodigoCliente"] . "\n  Nombre Cliente: ".$row["NombreCliente"]."\n  Nombre Contacto: ".$row["NombreContacto"]."\n  Apellido Contacto: ".$row["ApellidoContacto"]."\n";
} else {
    echo "0 results";
}
$carpeta="./documentos/";
if(!file_exists($carpeta)){
    mkdir($carpeta);
}

$myfile = fopen($carpeta."documento.txt", "w") or die("Unable to open file!");
$txt = "PEDIDO\n\nCodigo Pedido: $codPed\nFecha Pedido: $fechaPed\nFecha Esperada: $fechaEsp\nFecha Entrega: $fechaEnt\nEstado: $estado\nComentario: $comentario\n$textCliente";
fwrite($myfile, $txt);
fclose($myfile);
echo "archivo creado correctamente en ";
