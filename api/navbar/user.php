

<?php

session_start();

include("./../../config/connection.php");
include("./../../config/cors.php");

$data = json_decode(file_get_contents("php://input"));
$idUser = $data->idUser;

if ($idUser != null) {

        $sql = "SELECT a.id, a.title, a.description, a.minRate, a.maxRate, a.dueTime, a.dueDate, c.name
        FROM assignment a, class c, enrollClass e
        WHERE e.idStudent = $idUser
        AND c.id = e.idClass 
        AND a.classId = c.id
        ORDER BY id DESC
        ";

        $query = mysqli_query($conn, $sql);

        $i = 0;
        $assignment = [];
        while($item = mysqli_fetch_array($query)){
            $assignment[$i] = array(
                'title' => $item['title'],
                'class' => $item['name'],
            );
        }
}

if($query){
    $msg = "Success!";
    
} else {
    $msg = "Failed!";
    $item = "";
}

$response = array(
    'status' => "OK",
    'msg' => $msg,
    'data' => $assignment
);

echo json_encode($response);


?>
