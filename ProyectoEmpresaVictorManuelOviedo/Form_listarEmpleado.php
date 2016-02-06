<!DOCTYPE html>
<html>
    <head>
        <title>Listar Departamento</title>
        <script src="js/libs/jquery/jquery.js" type="text/javascript"></script>
    </head>
    <body>
        <table style="border-collapse: collapse; text-align: center">
            <tr>
                <td style="border:1px black solid; padding:5px">Id</td><td style="border:1px black solid; padding:5px">Apellido</td><td style="border:1px black solid; padding:5px">Oficio</td><td style="border:1px black solid; padding:5px">Dirigido</td><td style="border:1px black solid; padding:5px">Fecha Alt</td><td style="border:1px black solid; padding:5px">Salario</td><td style="border:1px black solid; padding:5px">Comision</td><td style="border:1px black solid; padding:5px">Departamento</td>
            </tr>
            <?php
            include './ConectorBaseDatos.php';
            $sql = "SELECT * FROM empleados";
            $conn=new ConectorBaseDatos();
            $text = "";
            $succesfulText ="";
            $result=$conn->ejecutar($sql,$text,$succesfulText);
            $row = mysqli_fetch_array($result);
            while ($row) {
                echo "<tr><td style='border:1px black solid; padding:5px'>".$row['emp_no']."</td><td style='border:1px black solid; padding:5px'>".$row['apellido']."</td><td style='border:1px black solid; padding:5px'>".$row['oficio']."</td><td style='border:1px black solid; padding:5px'>".$row['dir']."</td><td style='border:1px black solid; padding:5px'>".$row['fecha_alt']."</td><td style='border:1px black solid; padding:5px'>".$row['salario']."</td><td style='border:1px black solid; padding:5px'>".$row['comision']."</td><td style='border:1px black solid; padding:5px'>".$row['dept_no']."</td></tr>";
                $row = mysqli_fetch_array($result);
            }
            ?>
        </table>
    </body>
</html> 