
<?php
$login=$_POST['Login'];
echo "<table>
            <tr>
                <td>Nickname: </td>
                <td>
                    $login
                </td>
            </tr>
        </table>";

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "empresa";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . mysqli_connect_error());
}



$sql = "DELETE FROM Usuarios WHERE login='$login'";

if ($conn->query($sql) === TRUE) {
    echo "User deleted Sucesfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
mysqli_close($conn);
