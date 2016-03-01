<?php
include './ConectorBaseDatos.php';
$emp_no = $_POST["emp_no"];
$fecha = $_POST["fecha"];
$salario = $_POST["salario"];
if($salario==">"){
    $sal=2500;
}else{
    $sal=1500;
}

$conn = new ConectorBaseDatos();
$sql = "UPDATE Empleados SET fecha_alt='$fecha', salario=$sal WHERE emp_no='$emp_no'";
$conn->ejecutar($sql, "", "Updated Employee successfully");

$conn2 = new ConectorBaseDatos();
$sql2 = "SELECT * FROM empleados WHERE emp_no='$emp_no'";
$result2=$conn2->ejecutar($sql2, "", "");
$res=$result2->fetch_assoc();
$total=$sal+$res["comision"];
    echo "<table>
                    <tr>
                        <td>Id Empleado: </td>
                        <td>$emp_no</td>
                    </tr>
                    <tr>
                        <td>Apellido: </td>
                        <td>".$res['apellido']."</td>
                    </tr>
                    <tr>
                        <td>Oficio: </td>
                        <td>".$res["oficio"].
                        "</td>
                    </tr>
                    <tr>
                        <td>Dirigido (id del superior): </td>
                        <td>".$res["dir"].
                        "</td>
                    </tr>
                    <tr>
                        <td>Fecha: </td>
                        <td>".
                            $res["fecha_alt"].
                        "</td>
                    </tr>
                    <tr>
                        <td>Salario: </td>
                        <td>".
                            $sal.
                        "</td>
                    </tr>
                    <tr>
                        <td>Comision: </td>
                        <td>".$res["comision"].
                        "</td>
                    </tr>
                    <tr>
                        <td>Departamento: </td>
                        <td>".$dept_no.
                        "</td>
                    </tr>
                    <tr>
                        <td>TOTAL: </td>
                        <td>".$total.
                        "</td>
                    </tr>
                </table>";

