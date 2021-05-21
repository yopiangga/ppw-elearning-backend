

<?php

session_start();

include("./../config/connection.php");
include("./../config/cors.php");

$data = json_decode(file_get_contents("php://input"));
$idUser = $data->idUser;

if ($idUser != null) {

        $sql = "SELECT a.id, a.title, a.description, a.minRate, a.maxRate, a.dueTime, a.dueDate, c.name
        FROM assignment a, class c, enrollClass e
        WHERE e.idStudent = $idUser
        AND c.id = e.idClass 
        AND a.classId = c.id";

        $query = mysqli_query($conn, $sql);
}

$length = mysqli_num_rows($query);

for($i=0; $i<$length; $i++){
    $ass = mysqli_fetch_array($query);
    $item[$i] = array(
        'id' => $ass['id'],
        'title' => $ass['title'],
        'className' => $ass['name'],
        'description' => $ass['description'],
        'minRate' => $ass['minRate'],
        'maxRate' => $ass['maxRate'],
        'dueTime' => $ass['dueTime'],
        'dueDate' => $ass['dueDate']
    );
}

if($length > 0){
    $msg = "Read Assignment Success!";
    
} else {
    $msg = "Read Assignment Failed!";
    $item = "";
}

$response = array(
    'status' => "OK",
    'msg' => $msg,
    'data' => $item
);

echo json_encode($response);


?>
