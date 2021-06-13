

<?php
$servername = "https://petikdua.store";
$username = "u653333183_elearning";
$password = "@Elearning2.com";
$database = "u653333183_elearning";

// $servername = "localhost";
// $username = "root";
// $password = "";
// $database = "ppw_uas";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
// echo "Connected successfully";
?>
