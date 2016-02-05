<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>Baja Usuario</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="js/libs/jquery/jquery.js" type="text/javascript"></script>
        <script>
            function comprobar() {
                $.ajax({
                    type: "POST",
                    url: "Procesa_bajaUsuario.php",
                    data: {Login: $("#Login").val(), Pass: $("#pass").val(), Name: $("#name").val(), Surname: $("#surname").val(), Type: $("#tipo").val(), Question: $("#question").val(), Answer: $("#answer").val()}
                }).done(function (msg) {
                    $("#muestra").html(msg);
                });
                return false;
            }
        </script>
    </head>
    <body>
        <div id="muestra">
            <form method="POST" action="Procesa_bajaUsuario.php" onsubmit="return comprobar()">
                Selecciona login
                <select name="Login" id="Login">
                    <?php
                    $servername = "localhost";
                    $username = "root";
                    $password = "";
                    $dbname = "empresa";
                    $conn = new mysqli($servername, $username, $password, $dbname);
                    if ($conn->connect_error) {
                        die("Connection failed: " . mysqli_connect_error());
                    }
                    $sql = "SELECT login FROM usuarios";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<option value='" . $row["login"] . "'>" . $row["login"] . "</option>";
                        }
                    } else {
                        echo "0 results";
                    }
                    mysqli_close($conn);
                    ?>
                </select>
                <div><input type="submit" id="submit" value="Dar de baja"/></div>
            </form>
        </div>
    </body>
</html>


