<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "empresa";
$Login = $_POST["login"];
if ($Login != "") {
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . mysqli_connect_error());
    }
    $sql = "Select login from usuarios where login='" . $Login . "'";
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

