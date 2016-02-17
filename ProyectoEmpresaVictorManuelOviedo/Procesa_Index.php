<?php

session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "empresa";
$tipoEval = $_POST["eva"];
$Login = $_POST["login"];
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . mysqli_connect_error());
}
if ($tipoEval == "submitNormal") {
    $Pass = md5($_POST["pass"]);
    $cbox = $_POST["cbox"];
    if ($Login != "" && $Pass != "") {
        $sql = "Select login, tipo from usuarios where login='" . $Login . "' and pwd='" . $Pass . "'";
        $result = mysqli_query($conn, $sql);
        if ($result->num_rows != 0) {
            $_SESSION["user"] = $Login;
            $_SESSION["autentificado"] = "SI";
            $resultado = $result->fetch_assoc();
            if ($resultado["tipo"] == "Administrador") {
                echo "true Administrador";
            } else {
                echo "true Normal";
            }
        } else {
            echo "false";
        }
        mysqli_close($conn);
    } else {
        echo "false";
    }
    if ($cbox == "true") {
        setcookie("login", $Login);
    }
} else {
    if ($Login != "") {
        $sql = "Select login from usuarios where login='" . $Login . "'";
        $result = mysqli_query($conn, $sql);
        if ($result->num_rows != 0) {
            echo "true";
        } else {
            echo "false";
        }
        mysqli_close($conn);
    } else {
        echo "null";
    }
}



