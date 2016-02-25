<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "empresa";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . mysqli_connect_error());
}
$emp_no=$_POST["emp_no"];
$sql = "SELECT * FROM empleados WHERE emp_no='$emp_no'";
$result = mysqli_query($conn, $sql);
if ($result != null) {
    echo false;
} else {
    echo json_encode($result);
}

