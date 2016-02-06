<?php
$dept_no=$_POST["dept_no"];
include './ConectorBaseDatos.php';
$sql = "DELETE FROM departamentos WHERE dept_no=$dept_no";
$conn = new ConectorBaseDatos();
$succesfulText ="Department removed correctly<br/>";
$text="The department removed had as id=$dept_no";
$datos=$conn->ejecutar($sql,$text,$succesfulText);
