

<?php

session_start();

include("./../config/connection.php");
include("./../config/cors.php");

$data = json_decode(file_get_contents("php://input"));
$idUser = $data->idUser;
$idAss = $data->idAss;

if ($idUser != null && $idAss != null) {

    $sql = "SELECT c.idStudent, m.fullName, c.rate
    FROM collectassignment c, mahasiswa m
    where idAssignment=$idAss
    AND m.id=c.idStudent";

    $query = mysqli_query($conn, $sql);
}

if ($query) {
    $msg = "Read Success!";
    
    $length = mysqli_num_rows($query);

    for($i=0; $i < $length; $i++){
        $item = mysqli_fetch_array($query);
        $collect[$i] = array(
            'idStudent' => $item['idStudent'],
            'name' => $item['fullName'],
            'rate' => $item['rate'],
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


?>
