
<?php

session_start();

include("./../config/connection.php");
include("./../config/cors.php");

$data = json_decode(file_get_contents("php://input"));
$email = $data->email;
$password = $data->password;
$status = $data->status;

if($status == '2') {
    $sql = "SELECT * From lecturer
            where email='$email' and password='$password'";
} else if($status == '3') {
    $sql = "SELECT * From mahasiswa
            where email='$email' and password='$password'";
}

$query = mysqli_query($conn, $sql);

$cek = mysqli_num_rows($query);

if($cek > 0){
    $msg = "Login Success!";
    $_SESSION['status'] = "login";
    $user = mysqli_fetch_assoc($query);
} else {
    $msg = "Login Failed!";
}

$item[] = array(
    'id' => $user['id'],
    'email' => $user['email'],
    'telp' => $user['telp'],
    'status' => $status
);

$response = array(
    'status' => "OK",
    'msg' => $msg,
    'data' => $item
);

echo json_encode($response);


?>