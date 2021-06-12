<?php

session_start();

include("./../../config/connection.php");
include("./../../config/cors.php");

$data = json_decode(file_get_contents("php://input"));

$idClass = $data->idClass;

if($idClass != null){
    $sql = "DELETE FROM class
    WHERE id=$idClass";
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