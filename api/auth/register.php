
<?php

session_start();

include("./../../config/connection.php");
include("./../../config/cors.php");

$data = json_decode(file_get_contents("php://input"));
$email = $data->email;
$password = $data->password;
$telp = $data->telp;
$status = $data->status;

if ($email != null && $password != null && $telp != null && $status != null) {

    if($status == '2')
        $sql = "INSERT INTO lecturer (email, password, telp) VALUE ('$email', '$password', '$telp');";
    else if($status == '3')
        $sql = "INSERT INTO mahasiswa (email, password, telp) VALUE ('$email', '$password', '$telp');";

    $query = mysqli_query($conn, $sql);
}

if ($query) {
    $msg = "Sign Up Success!";
} else {
    $msg = "Sign Up Failed!";
}

$item[] = array(
    'email' => $email,
);

$response = array(
    'status' => "OK",
    'msg' => $msg,
    'data' => $item
);

echo json_encode($response);


?>