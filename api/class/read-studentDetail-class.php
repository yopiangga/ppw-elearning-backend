

<?php

session_start();

include("./../../config/connection.php");
include("./../../config/cors.php");

$data = json_decode(file_get_contents("php://input"));
$idUser = $data->idUser;

if ($idUser != null) {

    $sql = "SELECT id, email, telp, fullName, nickName, university, fields, placeBirth, dateBirth, gender, zipCode, address
    FROM mahasiswa
    WHERE id = $idUser";
    $query = mysqli_query($conn, $sql);

    if ($query) {
        $msg = "Read Success!";

        $length = mysqli_num_rows($query);

        for ($i = 0; $i < $length; $i++) {
            $item = mysqli_fetch_array($query);

            $data = array(
                'id' => $item['id'],
                'email' => $item['email'],
                'telp' => $item['telp'],
                'fullName' => $item['fullName'],
                'nickName' => $item['nickName'],
                'university' => $item['university'],
                'fields' => $item['fields'],
                'placeBirth' => $item['placeBirth'],
                'dateBirth' => $item['dateBirth'],
                'gender' => $item['gender'],
                'zipCode' => $item['zipCode'],
                'address' => $item['address'],
            );
        }
    } else {
        $msg = "Read Failed!";
    }
}

$response = array(
    'status' => "OK",
    'msg' => $msg,
    'data' => $data
);

echo json_encode($response);


?>
