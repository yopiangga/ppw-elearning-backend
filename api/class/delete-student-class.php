<?php

session_start();

include("./../../config/connection.php");
include("./../../config/cors.php");

$data = json_decode(file_get_contents("php://input"));

$idClass = $data->idClass;
$idStudent = $data->idUser; 

if($idClass != null && $idStudent != null){
    $sql = "DELETE FROM enrollclass 
    WHERE idClass=$idClass
    AND idStudent=$idStudent
    ";
    $query = mysqli_query($conn, $sql);

    if ($query) {
        $msg = "Success!";
    } else {
        $msg = "Failed!";
    }
    
    
    $response = array(
        'status' => "OK",
        'msg' => $msg
    );
    
    echo json_encode($response);
}

?>