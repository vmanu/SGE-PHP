<?php
include './ConectorBaseDatos.php';
$nombre = $_POST["Name"];
$loc = $_POST["Loc"];
$id_depto=$_POST["dept_no"];

$conn = new ConectorBaseDatos();
$text = "<table><tr><td>Nombre: </td><td>$nombre</td></tr><tr><td>Localizacion: </td><td>$loc</td></tr></table>";
$sql = "INSERT INTO departamentos (dept_no,dnombre, loc) VALUES ($id_depto,'$nombre','$loc')";
$succesfulText ="New Department added correctly";
$datos=$conn->ejecutar($sql,$text,$succesfulText);