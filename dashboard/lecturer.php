

<?php

session_start();

include("./../config/connection.php");
include("./../config/cors.php");

$data = json_decode(file_get_contents("php://input"));
$idUser = $data->idUser;

if ($idUser != null) {

    // Jumlah class
    $sqlJumlahClass = "SELECT c.id 
    FROM class c 
    WHERE c.id_lecturer = $idUser
    ";
    $queryJumlahClass = mysqli_query($conn, $sqlJumlahClass);
    $jumlahClass = mysqli_num_rows($queryJumlahClass);

    // Jumlah Tugas
    // $sqlJumlahTugas = "SELECT a.classId, c.id, c.id_lecturer 
    // FROM assignment a, class c
    // WHERE c.id_lecturer = $idUser
    // AND a.classId = c.id";
    // $queryJumlahTugas = mysqli_query($conn, $sqlJumlahTugas);
    // $jumlahTugas = mysqli_num_rows($queryJumlahTugas);

    // Jumlah Tugas Selesai
    $sqlSelesai = "SELECT a.classId, c.id, c.id_lecturer, a.dueDate 
    FROM assignment a, class c
    WHERE c.id_lecturer = $idUser
    AND a.classId = c.id";
    $querySelesai = mysqli_query($conn, $sqlSelesai);
    $doneAss = [];
    $i = 0;
    $j = 0;
    $now = time();
    while($doneItem = mysqli_fetch_array($querySelesai)){
        $doneAss[$i] = $doneItem['dueDate'];
        $doneAss[$i] = strtotime($doneAss[$i]);
        if($doneAss[$i] < $now)
            $j++;
        $i++;
    }

    $jumlahTugas = $i;
    $tugasSelesai = $j;

    $NFinish = $jumlahTugas - $tugasSelesai;

    // Join Class anda
    $sqlJoinClass = "SELECT e.idClass, c.id, c.id_lecturer 
    FROM enrollclass e, class c
    WHERE c.id_lecturer = $idUser
    AND e.idClass = c.id";
    $queryJoinClass = mysqli_query($conn, $sqlJoinClass);
    $jumlahJoinClass = mysqli_num_rows($queryJoinClass);
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
    'nFinish' => $NFinish,
    'joinClass' => $jumlahJoinClass
);

$response = array(
    'status' => "OK",
    'msg' => $msg,
    'data' => $item
);  

echo json_encode($response);


?>
