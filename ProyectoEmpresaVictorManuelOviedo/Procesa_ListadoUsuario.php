<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "empresa";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . mysqli_connect_error());
}
$sql = "SELECT * FROM usuarios";
$result = mysqli_query($conn, $sql);
if ($result != null) {
    echo false;
} else {
    echo json_encode($result);
}

