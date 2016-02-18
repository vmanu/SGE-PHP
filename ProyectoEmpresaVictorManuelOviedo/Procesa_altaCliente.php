<?php

include './ConectorBaseDatos.php';
$codClien = $_POST["codClien"];
$nombreClien = $_POST["nombreClien"];
$nombreCont = $_POST["nombreCont"];
$apellidoCont = $_POST["apellidoCont"];
$tfno = $_POST["tfno"];
$fax = $_POST["fax"];
$direccion1 = $_POST["direccion1"];
$direccion2 = $_POST["direccion2"];
$ciudad = $_POST["ciudad"];
$region = $_POST["region"];
$pais = $_POST["pais"];
$codPos = $_POST["codPos"];
$credito = $_POST["credito"];
$empleado = $_POST["empleado"];
$conn = new ConectorBaseDatos();
$text = "<table>
                    <tr>
                        <td>Codigo Cliente: </td>
                        <td>$codClien</td>
                    </tr>
                    <tr>
                        <td>Nombre Cliente: </td>
                        <td>$nombreClien</td>
                    </tr>
                    <tr>
                        <td>Nombre Contacto: </td>
                        <td>$nombreCont
                        </td>
                    </tr>
                    <tr>
                        <td>Apellido Contacto: </td>
                        <td>$apellidoCont
                        </td>
                    </tr>
                    <tr>
                        <td>Telefono: </td>
                        <td>
                            $tfno
                        </td>
                    </tr>
                    <tr>
                        <td>Fax: </td>
                        <td>
                            $fax
                        </td>
                    </tr>
                    <tr>
                        <td>Direccion1: </td>
                        <td>$direccion1
                        </td>
                    </tr>
                    <tr>
                        <td>Direccion2: </td>
                        <td>$direccion2</td>
                    </tr>
                    <tr>
                        <td>Ciudad: </td>
                        <td>$ciudad</td>
                    </tr>
                    <tr>
                        <td>Region: </td>
                        <td>$region
                        </td>
                    </tr>
                    <tr>
                        <td>Pais: </td>
                        <td>$pais
                        </td>
                    </tr>
                    <tr>
                        <td>Codigo Postal: </td>
                        <td>
                            $codPos
                        </td>
                    </tr>
                    <tr>
                        <td>Limite Credito: </td>
                        <td>
                            $credito
                        </td>
                    </tr>
                    <tr>
                        <td>Empleado: </td>
                        <td>$empleado
                        </td>
                    </tr>
                </table>";
$sql = "INSERT INTO clientes (CodigoCliente,NombreCliente,NombreContacto,ApellidoContacto,Telefono,Fax,LineaDireccion1,LineaDireccion2,Ciudad,Region,Pais,CodigoPostal,CodigoEmpleadoRepVentas,LimiteCredito) VALUES "
        . "($codClien,'$nombreClien','$nombreCont','$apellidoCont','$tfno','$fax','$direccion1','$direccion2','$ciudad','$region','$pais','$codPos',$empleado,$credito)";
$succesfulText = "New Client added correctly";
$datos = $conn->ejecutar($sql, $text, $succesfulText);
