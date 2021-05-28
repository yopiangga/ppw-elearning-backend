<?php

session_start();

include("./../config/connection.php");
include("./../config/cors.php");

$data = json_decode(file_get_contents("php://input"));

$idCollect = $data->id;

if($idCollect != null){
    $sql = "DELETE FROM collectassignment 
    WHERE id=$idCollect";
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