

<?php

session_start();

include("./../../config/connection.php");
include("./../../config/cors.php");

$data = json_decode(file_get_contents("php://input"));
$idUser = $data->idUser;
$idClass = $data->idClass;

if ($idUser != null && $idClass != null) {

    $sql = "SELECT m.fullName, m.id 
    FROM mahasiswa m, enrollclass e
    WHERE e.idClass = $idClass
    AND m.id = e.idStudent
    ";
    $query = mysqli_query($conn, $sql);
    $allData = [];

    if ($query) {
        $msg = "Read Success!";

        $length = mysqli_num_rows($query);

        for ($i = 0; $i < $length; $i++) {
            $item = mysqli_fetch_array($query);

            $data = array(
                'id' => $item['id'],
                'name' => $item['fullName'],
            );

            $allData[$i] = $data;
        }
    } else {
        $msg = "Read Failed!";
    }
}

$response = array(
    'status' => "OK",
    'msg' => $msg,
    'data' => $allData
);

echo json_encode($response);


?>
