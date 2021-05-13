

<?php

session_start();

include("./../config/connection.php");
include("./../config/cors.php");

$data = json_decode(file_get_contents("php://input"));
$idUser = $data->idUser;

if ($idUser != null) {

    $sql = "SELECT * FROM class where id_lecturer=$idUser";
    $query = mysqli_query($conn, $sql);

    $sqlLecturer = "SELECT email FROM lecturer where id=$idUser";
    $queryLecturer = mysqli_query($conn, $sqlLecturer);
}

if ($query) {
    $msg = "Read Success!";
    
    $length = mysqli_num_rows($query);
    $lecturer = mysqli_fetch_assoc($queryLecturer);

    for($i=0; $i < $length; $i++){
        $item = mysqli_fetch_array($query);

        $data = array(
            'id' => $item['id'],
            'code' => $item['code'],
            'name' => $item['name'],
            'id_lecturer' => $item['id_lecturer'],
            'lecturer' => $lecturer['email']
        );

        $allData[$i] = $data;
    }

} else {
    $msg = "Read Failed!";
}

$response = array(
    'status' => "OK",
    'msg' => $msg,
    'data' => $allData  
);  

echo json_encode($response);


?>
