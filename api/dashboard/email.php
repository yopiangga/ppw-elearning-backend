

<?php

session_start();

include("./../../config/connection.php");
include("./../../config/cors.php");

if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $text = $_POST['message'];

    $sql = "INSERT INTO message (name, email, text) VALUES ('$name', '$email', '$text')";
    $query = mysqli_query($conn, $sql);

    if($query){
        $msg = "Success";
    } else {
        $msg = "Failed";
    }
    header('Location: https://petikdua.store');
}

$response = array(
    'status' => "OK",
    'msg' => $msg,
);  

echo json_encode($response);


?>
