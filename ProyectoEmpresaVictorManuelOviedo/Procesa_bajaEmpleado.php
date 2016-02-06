<?php
$emp_no=$_POST["emp_no"];
include './ConectorBaseDatos.php';
$sql = "DELETE FROM empleados WHERE emp_no=$emp_no";
$conn = new ConectorBaseDatos();
$succesfulText ="Department removed correctly<br/>";
$text="The employee removed had as id=emp_no";
$datos=$conn->ejecutar($sql,$text,$succesfulText);
