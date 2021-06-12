

<?php

session_start();

include("./../../config/connection.php");
include("./../../config/cors.php");

$data = json_decode(file_get_contents("php://input"));
$idUser = $data->idUser;
$idAss = $data->idAss;

if ($idUser != null && $idAss != null) {

    $sql = "SELECT c.id, c.idStudent, m.fullName, c.rate, c.createAt, f.idCollectAssignment, f.path, f.name
    FROM collectassignment c, mahasiswa m, fileassignment f
    where idAssignment=$idAss
    AND m.id=c.idStudent
    AND f.idCollectAssignment=c.id";

    // $sql = "SELECT c.id, c.idStudent, m.fullName, c.rate, c.createAt
    // FROM collectassignment c, mahasiswa m
    // WHERE c.idAssignment=$idAss
    // AND m.id=c.idStudent";

    $query = mysqli_query($conn, $sql); 

    if ($query) {
        $msg = "Read Success!";

        $length = mysqli_num_rows($query);

        for ($i = 0; $i < $length; $i++) {
            $item = mysqli_fetch_array($query);
            $collect[$i] = array(
                'idCollect' => $item['id'],
                'idStudent' => $item['idStudent'],
                'name' => $item['fullName'],
                'rate' => $item['rate'],
                'createAt' => date('d-m-Y', $item['createAt']),
                'file' => $item['name']
            );
        }
    } else {
        $msg = "Read Failed!";
    }

    $response = array(
        'status' => "OK",
        'msg' => $msg,
        'data' => $collect
    );

    echo json_encode($response);
}

?>
