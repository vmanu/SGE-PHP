<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "empresa";
    $log=$_POST["login"];
    $pass1=md5($_POST["pass1"]);

    echo $log." y ".$_POST["pass1"];
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $sql = "UPDATE usuarios SET pwd='".$pass1."' WHERE login='".$log."'";
    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('¡Contraseña actualizada!'); window.location='index.php'; </script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    
    
