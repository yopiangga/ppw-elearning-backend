

<?php

session_start();

include("./../../config/connection.php");
include("./../../config/cors.php");

$data = json_decode(file_get_contents("php://input"));
$name = $data->nameClass;
$code = mt_rand(10000, 99999);
$idUser = $data->id;

if ($name != null && $idUser != null) {

    $sql = "INSERT INTO class (name, code, id_lecturer) VALUE ('$name', '$code', '$idUser');";

    $query = mysqli_query($conn, $sql);
}

if ($query) {
    $msg = "Create Class Success!";
} else {
    $msg = "Create Class Failed!";
}

// $item[] = array(
//     'email' => $email,
// );

$response = array(
    'status' => "OK",
    'msg' => $msg
);

echo json_encode($response);


?>
