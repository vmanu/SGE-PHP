<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "empresa";
$Login = $_POST["login"];
$Pass=md5($_POST["pass"]);
if ($Login != ""&&$Pass!="") {
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . mysqli_connect_error());
    }
    $sql = "Select login from usuarios where login='" . $Login . "' and pwd='".$Pass."'";
    $result = mysqli_query($conn, $sql);
    if ($result->num_rows != 0) {
        echo "true";
    } else {
        echo "false";
    }
    mysqli_close($conn);
} else {
    echo "falsede";
}

