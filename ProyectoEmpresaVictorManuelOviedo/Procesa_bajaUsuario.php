<!DOCTYPE html>
<html>
    <head>
        <title>Dando baja...</title>
    </head>
    <body>
        <table>
            <tr>
                <td>Nickname: </td>
                <td>
                    <?php
                    echo $_POST["Login"];
                    ?>
                </td>
            </tr>
            <tr>
                <td>Pass: </td>
                <td>
                    <?php
                    echo $_POST["Pass"];
                    ?>
                </td>
            </tr>
        </table>
        <?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "empresa";

// Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
        if($conn->connect_error){
            die("Connection failed: " . mysqli_connect_error());
        }

        $log=$_POST["Login"];
        
        $sql = "DELETE FROM Usuarios WHERE login='$log'";

        if ($conn->query($sql)===TRUE) {
            echo "executed the query successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        mysqli_close($conn);
        ?> 
        <br/>
        <a href="index.html"><button>volver Atras</button></a>
    </body>
</html> 