

<?php

session_start();

include("./../../config/connection.php");
include("./../../config/cors.php");


$sqlJumlahAssignment = "SELECT count(id) AS 'total' from assignment";
$queryJumlahAssignment = mysqli_query($conn, $sqlJumlahAssignment);
$dataJumlahAssignment = mysqli_fetch_assoc($queryJumlahAssignment);
$jumlahAssignment = $dataJumlahAssignment['total']; 

$sqlJumlahLecturer = "SELECT count(id) AS 'total' from lecturer";
$queryJumlahLecturer = mysqli_query($conn, $sqlJumlahLecturer);
$dataJumlahLecturer = mysqli_fetch_assoc($queryJumlahLecturer);
$jumlahLecturer = $dataJumlahLecturer['total']; 

$sqlJumlahStudent = "SELECT count(id) AS 'total' from mahasiswa";
$queryJumlahStudent = mysqli_query($conn, $sqlJumlahStudent);
$dataJumlahStudent = mysqli_fetch_assoc($queryJumlahStudent);
$jumlahStudent = $dataJumlahStudent['total']; 

if ($queryJumlahAssignment && $queryJumlahLecturer && $queryJumlahStudent) {
    $msg = "Success";
} else {
    $msg = "Failed";
}

$item = array(
    'lecturer' => $jumlahLecturer,
    'assignment' => $jumlahAssignment,
    'student' => $jumlahStudent,
);

$response = array(
    'status' => "OK",
    'msg' => "hallo",
    'data' => $item
);  

echo json_encode($response);


?>
