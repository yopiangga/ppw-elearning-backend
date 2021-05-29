

<?php

session_start();

include("./../config/connection.php");
include("./../config/cors.php");

$data = json_decode(file_get_contents("php://input"));
$idUser = $data->idUser;

if ($idUser != null) {

    // Jumlah class
    $sqlJumlahClass = "SELECT e.id 
    FROM enrollclass e 
    WHERE e.idStudent = $idUser
    ";
    $queryJumlahClass = mysqli_query($conn, $sqlJumlahClass);
    $jumlahClass = mysqli_num_rows($queryJumlahClass);

    // Jumlah Tugas
    $sqlJumlahTugas = "SELECT a.id, a.title, a.description, a.minRate, a.maxRate, a.dueTime, a.dueDate, c.name
    FROM assignment a, class c, enrollClass e
    WHERE e.idStudent = $idUser
    AND c.id = e.idClass 
    AND a.classId = c.id";
    $queryJumlahTugas = mysqli_query($conn, $sqlJumlahTugas);
    $jumlahTugas = mysqli_num_rows($queryJumlahTugas);

    // Jumlah Tugas Selesai
    $sqlSelesai = "SELECT * from collectassignment WHERE idStudent=$idUser";
    $querySelesai = mysqli_query($conn, $sqlSelesai);
    $tugasSelesai = mysqli_num_rows($querySelesai);

    $NFinish = $jumlahTugas - $tugasSelesai;
}

if ($idUser) {
    $msg = "Success";
} else {
    $msg = "Failed";
}

$item = array(
    'class' => $jumlahClass,
    'assignment' => $jumlahTugas,
    'done' => $tugasSelesai,
    'nFinish' => $NFinish
);

$response = array(
    'status' => "OK",
    'msg' => $msg,
    'data' => $item
);  

echo json_encode($response);


?>
