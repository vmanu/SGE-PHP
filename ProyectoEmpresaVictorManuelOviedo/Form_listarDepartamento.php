<?php
include './ControlSesion.php';
$sesion=new ControlSesion();
$sesion->gestiona();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Listar Departamento</title>
        <script src="js/libs/jquery/jquery.js" type="text/javascript"></script>
    </head>
    <body>
        <table style="border-collapse: collapse; text-align: center">
            <tr>
                <td style="border:1px black solid; padding:5px">Id</td><td style="border:1px black solid; padding:5px">Nombre</td><td style="border:1px black solid; padding:5px">Localizción</td>
            </tr>
            <?php
            include './ConectorBaseDatos.php';
            $sql = "SELECT dept_no, dnombre, loc FROM departamentos";
            $conn=new ConectorBaseDatos();
            $text = "";
            $succesfulText ="";
            $result=$conn->ejecutar($sql,$text,$succesfulText);
            $row = mysqli_fetch_array($result);
            while ($row) {
                echo "<tr><td style='border:1px black solid; padding:5px'>".$row['dept_no']."</td><td style='border:1px black solid; padding:5px'>".$row['dnombre']."</td><td style='border:1px black solid; padding:5px'>".$row['loc']."</td></tr>";
                $row = mysqli_fetch_array($result);
            }
            ?>
        </table>
    </body>
</html> 