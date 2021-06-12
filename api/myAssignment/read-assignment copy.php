

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
        AND a.classId = c.id";

        $query = mysqli_query($conn, $sql);

        $sqlCollect = "SELECT * FROM collectassignment WHERE idStudent=$idUser;";
        $queryCollect = mysqli_query($conn, $sqlCollect);
}

$length = mysqli_num_rows($query);
$lengthCollect = mysqli_num_rows($queryCollect);

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

for($i=0; $i<$lengthCollect; $i++){
    $coll = mysqli_fetch_array($queryCollect);
    $collect[$i] = array(
        'id' => $coll['id'],
        'idAssignment' => $coll['idAssignment'],
        'createAt' => $coll['createAt'],
        'updateAt' => $coll['updateAt'],
        'idStudent' => $coll['idStudent'],
        'rate' => $coll['rate'],
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
    'data' => $item,
    'collect' => $collect
);

echo json_encode($response);


?>
