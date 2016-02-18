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
$text = "<table>
                    <tr>
                        <td>Codigo Pedido: </td>
                        <td>$codPed</td>
                    </tr>
                    <tr>
                        <td>Fecha Pedido: </td>
                        <td>$fechaPed</td>
                    </tr>
                    <tr>
                        <td>Fecha Esperada: </td>
                        <td>$fechaEsp
                        </td>
                    </tr>
                    <tr>
                        <td>Fecha Entrega: </td>
                        <td>$fechaEnt
                        </td>
                    </tr>
                    <tr>
                        <td>Estado: </td>
                        <td>
                            $estado
                        </td>
                    </tr>
                    <tr>
                        <td>Comentarios: </td>
                        <td>
                            $comentario
                        </td>
                    </tr>
                    <tr>
                        <td>Cliente: </td>
                        <td>$cliente
                        </td>
                    </tr>
                </table>";
$sql = "INSERT INTO pedidos (CodigoPedido,FechaPedido, FechaEsperada,FechaEntrega,Estado,Comentarios,CodigoCliente) VALUES ($codPed,'$fechaPed','$fechaEsp','$fechaEnt','$estado','$comentario',$cliente)";
$succesfulText = "New Order added correctly";
$datos = $conn->ejecutar($sql, $text, $succesfulText);
