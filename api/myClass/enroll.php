

<?php

session_start();

include("./../../config/connection.php");
include("./../../config/cors.php");

$data = json_decode(file_get_contents("php://input"));
$code = $data->codeClass;
$idUser = $data->idUser;

if ($code != null && $idUser != null) {

    $sql = "SELECT * FROM class WHERE code=$code;";

    $query = mysqli_query($conn, $sql);

    $cek = mysqli_num_rows($query);

    if ($cek > 0) {
        $class = mysqli_fetch_assoc($query);
        $idClass = $class['id'];
        $enroll = "INSERT INTO enrollClass (idClass, idStudent) VALUE ('$idClass', '$idUser');";
        $queryEnroll = mysqli_query($conn, $enroll);
    } else {
        $msg = "Class Not Avalilable!";
    }
}

if ($queryEnroll) {
    $msg = "Class Available!";
} else {
    $msg = "Class Not Avalilable!";
}

$response = array(
    'status' => "OK",
    'msg' => $msg
);

echo json_encode($response);


?>
