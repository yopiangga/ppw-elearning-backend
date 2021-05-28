<?php

session_start();

include("./../config/connection.php");
include("./../config/cors.php");

$data = json_decode(file_get_contents("php://input"));

$idCollect = $data->idCollect;
$rate = $data->rate;

if($idCollect != null && $rate != null){
    $sql = "UPDATE collectassignment SET rate='$rate' WHERE id=$idCollect";
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