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
$conn = new ConectorBaseDatos();
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
$sql = "INSERT INTO empleados (emp_no,apellido, oficio,dir,fecha_alt,salario,comision,dept_no) VALUES ($emp_no,'$ape','$oficio',$dir,'$fecha',$salario,$comision,$dept_no)";
$succesfulText = "New Employee added correctly";
$datos = $conn->ejecutar($sql, $text, $succesfulText);
