<?php
include './ConectorBaseDatos.php';
$emp_no = $_POST["emp_no"];
$ape = $_POST["apellido"];
$dept_no = $_POST["dept_no"];
$oficio = $_POST["oficio"];
$dir = $_POST["dir"];
$fecha = $_POST["fecha"];
$salario = $_POST["salario"];
$comision = $_POST["comision"];
$text = "<table>
                    <tr>
                        <td>Id Empleado: </td>
                        <td>$emp_no</td>
                    </tr>
                    <tr>
                        <td>Apellido: </td>
                        <td>$ape</td>
                    </tr>
                    <tr>
                        <td>Oficio: </td>
                        <td>$oficio
                        </td>
                    </tr>
                    <tr>
                        <td>Dirigido (id del superior): </td>
                        <td>$dir
                        </td>
                    </tr>
                    <tr>
                        <td>Fecha: </td>
                        <td>
                            $fecha
                        </td>
                    </tr>
                    <tr>
                        <td>Salario: </td>
                        <td>
                            $salario
                        </td>
                    </tr>
                    <tr>
                        <td>Comision: </td>
                        <td>$comision
                        </td>
                    </tr>
                    <tr>
                        <td>Departamento: </td>
                        <td>$dept_no
                        </td>
                    </tr>
                </table>";

$conn = new ConectorBaseDatos();
$sql = "UPDATE Empleados SET apellido='$ape', oficio='$oficio', dir=$dir, fecha_alt='$fecha', salario=$salario,comision=$comision,dept_no=$dept_no WHERE emp_no='$emp_no'";
$result=$conn->ejecutar($sql, $text, "Updated Employee successfully");

    

